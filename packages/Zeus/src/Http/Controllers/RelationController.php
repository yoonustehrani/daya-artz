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
        $related_modeltype = ModelType::whereSlug($this->get_slug())->firstOrFail();
        $related = $related_modeltype->getModel()->findOrFail($id);
        $relation = $related_modeltype->relations()->where('local_method', $this->get_relation_slug())->with('target')->first();
        // $related_model_type = \ZeusPanel::getModelTypeByModel($relation->target_model);
        if ($relation->target) {
            $modeltype = $relation->target;
            $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('browse', true)->with('relation.target')]);
            $model = $related->{$relation->local_method}();
            $model = $model->select(
                $this->rows_to_select($modeltype->rows, $modeltype->getModel()->getKeyName())
            );
            if (method_exists($modeltype->model_class, 'scopeQueryFilter')) {
                $model->queryFilter($request->getFilterables());
            }
            $model->orderBy($modeltype->details->ordering_column , $modeltype->details->ordering_direction);
            $rells = $this->relations_to_load($modeltype->rows);
            if ($rells['with']) {
                $model->with($rells['with']);
            }
            if ($rells['count']) {
                $model->withCount($rells['count']);
            }
            $perpage = intval(request()->query('paginate')) ?: $modeltype->pagination;
            $data = $perpage ? $model->paginate($perpage)->withQueryString() : $model->limit(10)->get();
            $related->__path__ = $related_modeltype->get_route('show', ['id' => $related->getKey()]);
            return view('zview::pages.default.index', compact('modeltype', 'data', 'related'))->with('trash', false);
        }
        abort(403, "Modeltype does not exist");
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
}