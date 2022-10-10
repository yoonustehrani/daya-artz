<?php

namespace Zeus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Zeus\Models\ModelRow;
use Zeus\Models\ModelType;

class ModelTypeController extends BaseController
{
    public $option_fields = [
        'ordering_column' => [
            'title' => 'Order By',
            'type' => 'select',
            'options' => []
        ],
        'ordering_direction' => [
            'title' => 'Order Direction',
            'type' => 'select',
            'options' => [
                'asc' => 'Ascending',
                'desc' => 'Descending',
            ]
        ],
        'search_key' => [
            'title' => 'Search by',
            'type' => 'select',
            'options' => []
        ],
        'icon' => [
            'title' => 'Icon Class',
            'type' => 'text'
        ],
        // 'routes' => [
        //     'title'
        // ], 
        // 'scope' => [
        //     'title'
        // ]
    ];
    protected $relations = [
        'belongsTo', // one to one, one to many
        'belongsToMany', // many to one & many to many
        'hasOne', // one to one
        'hasMany', // one to many
        'morphOne', // one to one
        'morphMany', // one to many
        'morphToMany', // many to many
        'morphedByMany', // owner -> many to many
    ];
    protected function fulfil_option_fields($table_columns)
    {
        $fulfilled_arr = $this->option_fields;
        $columns_array = [];
        foreach ($table_columns as $col) {
            $columns_array[$col] = ucwords(str_replace('_', ' ', $col));
        }
        $fulfilled_arr['ordering_column']['options'] = $columns_array;
        $fulfilled_arr['search_key']['options'] = $columns_array;
        return $fulfilled_arr;
    }
    public function index()
    {
        $this->authorize('viewAny', ModelType::class);
        $sm = \ZeusPanel::getSchema();
        $tables = array_filter($sm->listTableNames(), fn($x) => strpos($x, 'zeus_') !== 0);
        $model_types = ModelType::select('id', 'namespace')->get();
        return view('zview::pages.modeltypes.index', compact('tables', 'model_types'));
    }
    public function create(Request $request)
    {
        $this->authorize('create', ModelType::class);
        abort_if(
            ModelType::where('namespace', $request->query('namespace'))->exists(),
            403,
            'Model Type Already exists'
        );
        abort_if(
            ! \ZeusPanel::getSchema()->tablesExist($request->query('namespace')),
            403,
            'Table does not exist'
        );
        $table = \ZeusPanel::getTableDetails($request->query('namespace'));
        $columns = \ZeusPanel::getTableColumns($table->getName(), true, true);
        $option_fields = $this->fulfil_option_fields($columns->keys());
        $foreigns = $table->getForeignKeys();

        return view('zview::pages.modeltypes.create', compact('columns', 'foreigns', 'option_fields'))->with('table', $table->getName());
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'model_class' => 'required|string',
            'pagination' => 'required|numeric|min:0|max:20',
        ]);
        $this->authorize('create', ModelType::class);
        try {
            DB::beginTransaction();
            $model_type = new ModelType();
            $model_type->namespace = $request->namespace;
            $model_type->model_class = $request->model_class;
            $model_type->slug = $request->slug;
            $model_type->name_singular = $request->name_singular;
            $model_type->name_plural = $request->name_plural;
            $model_type->controller = $request->controller;
            $model_type->api_controller = $request->api_controller;
            $model_type->policy = $request->policy;
            $model_type->pagination = ((int) $request->pagination) ?: null;
            $model_type->soft_delete = request('soft_delete') ? 1 : 0;
            $options = array_keys($this->option_fields);
            $optional_details = [];
            foreach ($options as $opt) {
                $optional_details[$opt] = $request->input('details')[$opt];
            }
            $json_details = (array) json_decode($request->input('details.json'));
            $model_type->details = array_merge($optional_details, $json_details);
            // Instancing Model Rows
            $rows = [];
            $visibilities = \ZeusPanel::getVisibilities();
            $i = 0;
            foreach ($request->input('fields') as $field => $setting) {
                $row = new ModelRow();
                $row->field = $field;
                $row->title = $setting['title'];
                $row->type = $setting['type'];
                $row->details = $setting['details'];
                $row->default_value = $setting['default_value'];
                $row->placeholder = $setting['placeholder'];
                $row->required = $setting['required'] === 'off' ? null : $setting['required'];
                foreach ($visibilities as $v) {
                    $row->{$v} = in_array($v, array_keys($setting['visibility'] ?? []));
                }
                $row->order = $i;
                array_push($rows, $row);
                $i++;
            }
            // Creating ModelType
            if ($model_type->save()) {
                // Associating Model Rows
                $model_type->rows()->saveMany($rows);
            }
            DB::commit();
            return redirect(route('zeus.modeltypes.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function edit($id)
    {
        $modeltype = ModelType::findOrFail($id);
        $this->authorize('update', $modeltype);
        $modeltype->load(['rows', 'relations']);
        $table = \ZeusPanel::getTableDetails($modeltype->namespace);
        $columns = \ZeusPanel::getTableColumns($table->getName(), true, true);
        $option_fields = $this->fulfil_option_fields($columns->keys());
        // $modeltype->exclude_from_details(array_keys($this->option_fields));
        return view('zview::pages.modeltypes.edit', compact('modeltype', 'columns', 'option_fields'))->with('table', $table->getName());
    }

    public function update($id, Request $request)
    {
        $model_type = ModelType::findOrFail($id);
        $this->authorize('update', $model_type);
        $model_type->model_class = $request->model_class;
        $model_type->slug = $request->slug;
        $model_type->name_singular = $request->name_singular;
        $model_type->name_plural = $request->name_plural;
        $model_type->controller = $request->controller;
        $model_type->api_controller = $request->api_controller;
        $model_type->policy = $request->policy;
        $model_type->pagination = ((int) $request->pagination) ?: null;
        $model_type->soft_delete = request('soft_delete') ? 1 : 0;
        $options = array_keys($this->option_fields);
        $optional_details = [];
        foreach ($options as $opt) {
            $optional_details[$opt] = $request->input('details')[$opt];
        }
        $json_details = (array) json_decode($request->input('details.json'));
        $model_type->details = array_merge($optional_details, $json_details);
        $model_type->save();
        return redirect(route('zeus.modeltypes.edit', ['modeltype' => $model_type->getKey()]));
    }
    public function show($id)
    {
        $model_type = ModelType::findOrFail($id);
        $model_type->load('rows.relation');
        return $model_type;
    }

    public function destroy($id)
    {
        $model_type = ModelType::findOrFail($id);
        $this->authorize('delete', $model_type);
        return $model_type->delete() ? redirect(route('zeus.modeltypes.index')) : abort(403, 'Couldn\'nt delete');
    }
}