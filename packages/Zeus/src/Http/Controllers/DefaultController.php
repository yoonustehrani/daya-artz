<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Zeus\Http\Requests\QueryFilterRequest;
use Zeus\Models\ModelType;
// use Zeus\Traits\FiltersQuery;
use Zeus\Traits\HelperForDefault;

class DefaultController extends Controller
{
    use HelperForDefault;
    public function index(QueryFilterRequest $request)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $this->authorizeModelType($modeltype, 'viewAny');
        $model = \ZeusPanel::getModel($modeltype->model_class);
        $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('browse', true)]);
        // Loading Relations
        if ($modeltype->rows->whereNotNull('model_relation_id')->count() > 0) {
            $modeltype->rows->load('relation.target');
            // $modeltype->rows->load([
            //     'relation' => function($q1) {
            //         $q1->with([
            //             'target' => function($q2) {
            //                 $q2->with(['rows' => fn($q3) => $q3->where('browse', true)]);
            //             }
            //         ]);
            //     }
            // ]);
        }
        $model = $model->select(
            $this->rows_to_select($modeltype->rows, $model->getKeyName())
        );
        if (method_exists($modeltype->model_class, 'scopeQueryFilter')) {
            $model->queryFilter($request->getFilterables());
        }
        $model->orderBy($modeltype->details->ordering_column , $modeltype->details->ordering_direction);
        // we should only load the browse data
        $rells = $this->relations_to_load($modeltype->rows);
        if ($rells['with']) {
            $model->with($rells['with']);
        }
        if ($rells['count']) {
            $model->withCount($rells['count']);
        }
        // // check if should be paginated
        $perpage = intval(request()->query('paginate')) ?: $modeltype->pagination;
        $data = $perpage ? $model->paginate($perpage)->withQueryString() : $model->limit(10)->get();
        return view('zview::pages.default.index', compact('modeltype', 'data'))->with('trash', false);
    }
    public function create(Request $request)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $this->authorizeModelType($modeltype, 'create');
        $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('create', true)->with('relation.target')]);
        return view('zview::pages.default.create', compact('modeltype'));
    }
    public function store(Request $request)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $this->authorizeModelType($modeltype, 'create');
        $model = \ZeusPanel::getModel($modeltype->model_class);
        $modeltype->load(['rows' => fn($q) => $q->where('create', true)->with('relation')]);
        $this->validatModelType($modeltype);
        try {
            \DB::beginTransaction();
            $modeltype->rows->filter(fn($r) => is_null($r->model_relation_id) || $r->relation->type === 'belongsTo')->each(fn($row) => $this->fullfil_model_with_data($model, $row));
            // $modeltype->rows->filter(fn($r) => ! is_null($r->model_relation_id) && $r->relation->type === 'belongsTo')->each(function($r) use($model) {
            //     if (request($r->field)) {
            //         $model->{$r->relation->local_method}()->associate(request($r->field));
            //     }
            // });
            if ($model->save()) {
                flash()->success(__('zlang::modeltype.messages.created', ['name' => __($modeltype->name_singular)]));
                $modeltype->rows->filter(fn($r) => ! is_null($r->model_relation_id) && $r->relation->type !== 'belongsTo')->each(function($r) use($model) {
                    $method = $model->{$r->relation->local_method}();
                    switch ($r->relation->type) {
                        case 'belongsToMany':
                            $items = json_decode(request()->input("{$r->field}.value"));
                            if ($items) {
                                $method->sync($items);
                            }
                            break;
                        // case 'hasMany':
                        //     foreach (request($r->field) as $params) {
                        //         $related = app()->make($r->relation->target_model);
                        //         foreach ($params as $param_key => $param_value) {
                        //             $related->{$param_key} = $param_value;
                        //         }
                        //         $method->save($related);
                        //     }
                        //     break;
                    }
                });
                foreach (\ZeusPanel::getExtensions() as $extension_name) {
                    $extension = \ZeusPanel::getExtension($extension_name)->setMethod('create')->setModelType($modeltype);
                    if ($extension->shouldHandleAdjustment()) {
                        $extension->handleAdjustment($request, $model);
                    }
                }
            }
            \DB::commit();
            return redirect()->to(
                $this->redirection_path(
                    request()->input('__submit_type'),
                    $modeltype->slug,
                    ['id' => $model->getKey()]
                )
            );
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            flash()->error(__('zlang::modeltype.messages.not-created', ['name' => __($modeltype->name_singular)]));
            return back();
        }
    }
    public function edit($id)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $model = \ZeusPanel::getModel($modeltype->model_class);
        $this->authorizeModelType($modeltype, 'update', $model);
        $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('edit', true)->with('relation.target')]);
        $selection = $this->rows_to_select($modeltype->rows, $model->getKeyName());
        $rells = $this->relations_to_load($modeltype->rows, true);
        $data = $model->select($selection)->with($rells)->findOrFail($id);
        return view('zview::pages.default.edit', compact('modeltype', 'data'));
    }
    public function update(Request $request, $id)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $model = \ZeusPanel::getModel($modeltype->model_class);
        $this->authorizeModelType($modeltype, 'update', $model);
        $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('edit', true)->with('relation.target')]);
        $selection = $this->rows_to_select($modeltype->rows, $model->getKeyName());
        $data = $model->select($selection)->findOrFail($id);
        $this->validatModelType($modeltype);
        try {
            \DB::beginTransaction();
            $modeltype->rows->filter(fn($r) => is_null($r->model_relation_id) || $r->relation->type === 'belongsTo')
                            ->each(fn($row) => $this->fullfil_model_with_data($data, $row));
            if ($data->save()) {
                $title = __($modeltype->name_singular) . " ({$data->as_text})";
                $modeltype->rows->filter(fn($r) => ! is_null($r->model_relation_id) && $r->relation->type !== 'belongsTo')->each(function($r) use($data) {
                    $method = $data->{$r->relation->local_method}();
                    switch ($r->relation->type) {
                        case 'belongsToMany':
                            $items = json_decode(request()->input("{$r->field}.value"));
                            if ($items) {
                                $method->sync($items);
                            }
                            break;
                    }
                });
                foreach (\ZeusPanel::getExtensions() as $extension_name) {
                    $extension = \ZeusPanel::getExtension($extension_name)->setMethod('edit')->setModelType($modeltype);
                    if ($extension->shouldHandleAdjustment()) {
                        $extension->handleAdjustment($request, $data);
                    }
                }
                flash()->success(__('zlang::modeltype.messages.updated', ['name' => $title]));
            }
            \DB::commit();
            return redirect(route("zeus.{$modeltype->slug}.show", ['id' => $data->getKey()]));
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            // \Log::error($e->getMessage());
            // \Log::error($e->getLine());
            flash()->error(__('zlang::modeltype.messages.not-created', ['name' => __($modeltype->name_singular)]));
            return back();
        }
    }
    public function show($id, Request $request)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $this->authorizeModelType($modeltype, 'viewAny');
        $model = \ZeusPanel::getModel($modeltype->model_class);
        $modeltype->load([
            'view_rows.relation.target'
        ]);
        $selection = $this->rows_to_select($modeltype->view_rows, $model->getKeyName());
        $data = $model->select($selection)->findOrFail($id);
        // $modeltype->multi_side = $modeltype->view_rows->whereNotNull('relation')->filter(function($item) {
        //     return ! in_array($item->relation->type, ['belongsTo', 'hasOne', 'morphOne']);
        // });
        return view('zview::pages.default.show', compact('modeltype', 'data'));
    }
    public function destroy($id)
    {
        $model_type = ModelType::whereSlug($this->get_slug())->firstOrFail();
        $model = \ZeusPanel::getModel($model_type->model_class);
        $softDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            (new \ReflectionClass($model))->getTraitNames()
        );
        $data = $softDeletes ? $model->withTrashed()->findOrFail($id) : $model->findOrFail($id);
        if ($softDeletes && $data->trashed()) {
            $this->authorize('forceDelete-zeus-model', [$data, $model_type->slug]);
            $data->forceDelete();
            return redirect(route("zeus.{$model_type->slug}.index"));
        }
        $this->authorize('delete-zeus-model', [$data, $model_type->slug]);
        $data->delete();
        return redirect(route("zeus.{$model_type->slug}.index"));
    }
    public function restore($id)
    {
        $model_type = ModelType::whereSlug($this->get_slug())->firstOrFail();
        $model = \ZeusPanel::getModel($model_type->model_class);
        $softDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            (new \ReflectionClass($model))->getTraitNames()
        );
        abort_if(! $softDeletes, 404);
        $data = $model->withTrashed()->findOrFail($id);
        $this->authorize('restore-zeus-model', [$data, $model_type->slug]);
        $data->restore();
        return back();
    }

    protected function validatModelType($modeltype)
    {
        $validation_rules = [];
        foreach ($modeltype->rows as $r) {
            $validation_rules[$r->field] = $r->get_validation_rules();
        }
    }
}