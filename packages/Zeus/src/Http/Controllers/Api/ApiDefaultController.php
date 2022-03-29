<?php

namespace Zeus\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zeus\Post;
use Illuminate\Support\Facades\Gate;
use Zeus\Http\Requests\QueryFilterRequest;
use Zeus\Models\ModelType;
use Zeus\Traits\HelperForDefault;
use Zeus\ZeusFacade;

class ApiDefaultController extends Controller
{
    use HelperForDefault;
    public function index(QueryFilterRequest $request)
    {
        $modeltype = \ZeusPanel::getModelTypeBySlug($this->get_api_slug());
        // $this->authorizeModelType($modeltype, 'viewAny');
        $modeltype->load(['rows' => fn($q) => $q->orderBy('order')->where('browse', true)]);
        $data = [];
        $model = ZeusFacade::getModel($modeltype->model_class);
        $model = $model->select(
            $this->rows_to_select($modeltype->rows, $model->getKeyName())
        );
        if (method_exists($modeltype->model_class, 'scopeQueryFilter')) {
            // filtering query for needed scopes
            $model->queryFilter($request->getFilterables());
        }
        $model->orderBy($modeltype->details->ordering_column , $modeltype->details->ordering_direction);
        $this->filterQuery($modeltype, $model);
        $data = $model->limit(10)->get()->append('as_text');
        return response()->json($data);
    }
    public function show($id)
    {
        $model_type = ModelType::whereSlug($this->get_api_slug())->with('view_rows')->firstOrFail();
        $model = ZeusFacade::getModel($model_type->model_class);
        $selection = $this->rows_to_select($model_type->view_rows, $model->getKeyName());
        $data = $model->select($selection)->findOrFail($id)->append('as_text');

        return response()->json($data);
    }
    public function store()
    {
        $model_type = ModelType::whereSlug($this->get_api_slug())->with('create_rows')->firstOrFail();   
        $model = ZeusFacade::getModel($model_type->model_class);
        $model_type->create_rows->each(fn($row) => $this->fullfil_model_with_data($model, $row));
        if ($model->save()) {
            return response()->json($model);
        }
    }
    public function update($id)
    {
        $model_type = ModelType::whereSlug($this->get_api_slug())->with('edit_rows')->firstOrFail();
        $model = ZeusFacade::getModel($model_type->model_class);
        $selection = $this->rows_to_select($model_type->edit_rows, $model->getKeyName());
        $data = $model->select($selection)->findOrFail($id);
        $model_type->edit_rows->each(fn($row) => $this->fullfil_model_with_data($data, $row));
        if ($data->save()) {
            return response()->json($data);
        }
    }
    public function destroy($id)
    {
        $model_type = ModelType::whereSlug($this->get_api_slug())->firstOrFail();
        $model = ZeusFacade::getModel($model_type->model_class);
        $softDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            (new \ReflectionClass($model))->getTraitNames()
        );
        $data = $softDeletes ? $model->withTrashed()->findOrFail($id) : $model->findOrFail($id);
        if ($softDeletes && $data->trashed()) {
            return response()->json(['okay' => $data->forceDelete()]);
        }
        return response()->json(['okay' => $data->delete()]);
    }
    public function restore($id)
    {
        $model_type = ModelType::whereSlug($this->get_api_slug())->firstOrFail();
        $model = ZeusFacade::getModel($model_type->model_class);
        $softDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            (new \ReflectionClass($model))->getTraitNames()
        );
        abort_if(! $softDeletes, 404);
        $data = $model->withTrashed()->findOrFail($id);
        return response()->json(['okay' => $data->restore()]);
    }
}