<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use Zeus\Models\ModelType;
use Zeus\Traits\FindSlugMethod;
use Zeus\Traits\HelperForDefault;

class ExtraDefaultController extends Controller
{
    use HelperForDefault;
    public function trash()
    {
        $model_type = ModelType::whereSlug($this->get_slug())->with('trash_rows')->firstOrFail();
        $model = app()->make($model_type->model_class);
        $softDeletes = in_array(
            'Illuminate\Database\Eloquent\SoftDeletes',
            (new \ReflectionClass($model))->getTraitNames()
        );
        if (! $model_type->soft_delete || ! $softDeletes) {
            abort(404);
        }
        $selection = $this->rows_to_select($model_type->trash_rows, $model->getKeyName());
        $model = $model->select($selection)->onlyTrashed();
        // filtering query for needed scopes
        $this->filterQuery($model_type, $model, $selection);
        // check if should be paginated
        $perpage = intval(request()->query('paginate')) ?: $model_type->pagination;
        $data = $perpage ? $model->paginate($perpage)->withQueryString() : $model->limit(10)->get();

        return view('zview::pages.default.index', compact('model_type', 'data'))->with('trash', true);
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