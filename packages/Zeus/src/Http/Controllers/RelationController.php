<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Zeus\Http\Requests\QueryFilterRequest;
use Zeus\Models\ModelType;
use Zeus\Traits\HelperForDefault;
use Zeus\View\Components\FormField;

class RelationController extends Controller
{
    use HelperForDefault;
    public function index(QueryFilterRequest $request, $id)
    {
        $model_type = ModelType::whereSlug($this->get_slug())->firstOrFail();
        $relation = $model_type->relations()->where('local_method', $this->get_relation_slug())->first();
        $related_model_type = \ZeusPanel::getModelTypeByModel($relation->target_model);

        if ($related_model_type) {
            $related_model_type->load('browse_rows.relation');
            $model = \ZeusPanel::getModel($model_type->model_class)->findOrFail($id)->{$relation->local_method}();
            $selection = $this->rows_to_select($related_model_type->browse_rows
            // $model->getLocalKeyName()
            );
            $model = $model->select($selection);
            if (method_exists($related_model_type->model_class, 'scopeQueryFilter')) {
                $model->queryFilter($request->getFilterables());
            }
            $rells = $this->relations_to_load($related_model_type->browse_rows, [
                // $model_type->model_class
            ]);
            if ($rells['with']) {
                $model->with($rells['with']);
            }
            if ($rells['count']) {
                $model->withCount($rells['count']);
            }
            // check if should be paginated
            $perpage = intval(request()->query('paginate')) ?: $related_model_type->pagination;
            $data = $perpage ? $model->paginate($perpage)->withQueryString() : $model->limit(10)->get();

            return view('zview::pages.default.index', compact('data'))->with('model_type', $related_model_type)->with('trash', false);
        }
        // abort(403, "Modeltype does not exist");
    }
    public function store($id)
    {
        $base_model_type = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        $relation = $base_model_type->relations()->where('local_method', $this->get_relation_slug())->first();
        $target_model_type = \ZeusPanel::getModelTypeByModel($relation->target_model);
        $base_model = \ZeusPanel::getModel($base_model_type->model_class);
        $model = \ZeusPanel::getModel($model_type->model_class)->findOrFail($id)->{$relation->local_method}();
    }
    public function create($row_id)
    {
        $index = request()->query('index');
        $model_type = \ZeusPanel::getModelTypeBySlug($this->get_api_slug());
        $row = $model_type->getRowsFromCache()->where('create', 1)->firstWhere('id', $row_id);
        abort_if(is_null($row) && ! $index, 404);
        $relation = $row->relation()->firstOrFail();
        $except = [$model_type->getModel()->{$relation->local_method}()->getForeignKeyName()];
        $item_rows = $relation->getRelatedRows('create')->filter(fn($r) => ! in_array($r->field, $except))->values();
        $node = '<div class="px-2 py-5 grid grid-cols-1 lg:grid-cols-2 grid-flow-row place-content-center gap-4 bg-white">';
        $node .= '<p class="text-gray-700 text-md font-semibold col-span-full"><i class="fas fa-hashtag"></i>'. $index .'</p>';
        foreach ($item_rows as $item) {
            $node .= view('zview::components.forms.relations.row', ['row' => $item, 'prefix' => "{$relation->local_method}[{$index}]"])->render();
        }
        $node .= '</div>';
        return response()->json([
            'okay' => true,
            'html' =>  $node
        ]);
    }
    protected function get_relation_slug()
    {
        $r = explode('.', request()->route()->getName());
        return $r[count($r) - 2];
    }
}