<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zeus\Http\Requests\QueryFilterRequest;
use Zeus\Models\ModelType;
use Zeus\Traits\FindSlugMethod;
use Zeus\Traits\HelperForDefault;

class ExtraDefaultController extends Controller
{
    use HelperForDefault;
    public function trash(QueryFilterRequest $request)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_slug());
        // $this->authorizeModelType($modeltype, 'viewAny');
        $model = \ZeusPanel::getModel($modeltype->model_class);
        $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('trash', true)]);
        $softDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            (new \ReflectionClass($model))->getTraitNames()
        );
        if (! $modeltype->soft_delete || ! $softDeletes) {
            abort(404);
        }
        $model = $model->select(
            $this->rows_to_select($modeltype->rows, $model->getKeyName())
        )->onlyTrashed();
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

        return view('zview::pages.default.index', compact('modeltype', 'data'))->with('trash', true);
    }
    public function clone($id)
    {
        $model_type = ModelType::whereSlug($this->get_slug())->firstOrFail();
        $model = app()->make($model_type->model_class);
        $data = $model->findOrFail($id);
        $copy = $model;
        foreach ($data->getOriginal() as $key => $value) {
            if (! in_array($key, [$model->getKeyName(), 'created_at', 'updated_at'])) {
                $copy->{$key} = $value;
            }
        }
        if ($copy->save()) {
            return back();
        }
    }
}