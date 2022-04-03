<?php

namespace Zeus\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Zeus\Models\ZeusModel;

trait HelperForDefault
{
    // /**
    //  * @deprecated
    //  */
    protected function filterQuery($model_type, $model)
    {
        // if (request()->query('order_by') && request()->query('order_dir')) {
        //     $col = request()->query('order_by');
        //     $this->validateColumn($col, $selection);
        //     $dir = request()->query('order_dir') === 'desc' ? 'desc' : 'asc';
        //     $model->orderBy($col , $dir);
        // } else {
        //     // $this->validateColumn($model_type->details->ordering_column, $selection);
        //     $model->orderBy($model_type->details->ordering_column , $model_type->details->ordering_direction);
        // }
        $search_query = request()->query('q');
        if ($search_query) {
            $model->where($model_type->details->search_key, 'like', "%{$search_query}%");
        }
    }
    protected function validateColumn($col, $allowed) :void
    {
        if (! in_array($col, $allowed)) abort(403, "Column is invalid");
    }
    protected function relation_target_is_one($row)
    {
        return in_array($row->relation->type ?? '', ['belongsTo', 'hasOne', 'morphOne']);
    }
    protected function rows_to_select($rows, $primary_key = 'id')
    {
        if ($rows instanceof \Illuminate\Support\Collection) {
            return $rows->filter(function($r) {
                if ($r->model_relation_id && ! in_array($r->relation->type, ['belongsTo'])) return false;
                if($r->type === 'password') return false;
                return ! $r->dynamic;
            })->pluck('field')->prepend($primary_key)->unique()->values()->toArray();
        }
        return [];
    }
    protected function relations_to_load($rows, $minimal = false)
    {
        $relations = $minimal ? [] : ['with' => [], 'count' => []];
        if ($rows instanceof \Illuminate\Support\Collection) {
            foreach ($rows->filter(fn($row) => ! is_null($row->model_relation_id)) as $r) {
                $side = $this->relation_target_is_one($r) ? 'with' : 'count';
                if ($minimal) {
                    array_push($relations, $r->relation->local_method);
                } else {
                    $side = $this->relation_target_is_one($r) ? 'with' : 'count';
                    array_push($relations[$side], $r->relation->local_method);
                }
            }
        }
        return $relations;
    }
    /**
     * @param Illuminate\Http\Request $request
     * @return string slug
     */
    protected function get_slug()
    {
        return explode('.', request()->route()->getName())[1];
    }
    protected function get_api_slug()
    {
        return explode('.', request()->route()->getName())[2];
    }
    protected function get_relation_slug()
    {
        return explode('.', request()->route()->getName())[2];
    }
    protected function fulfil_model_with_relation()
    {

    }
    protected function fullfil_model_with_data($model, $row)
    {
        $value = request($row->field);
        if ($row->type === 'checkbox') {
            $model->{$row->field} = $value ? 1 : 0;
            return;
        }
        if ($row->type === 'password') {
            if ($value) {
                $model->{$row->field} = \Hash::make($value);
            }
            return;
        }
        if ($row->type === 'key-value') {
            $model->{$row->field} = json_encode(json_decode($value) ?: []);
            return;
        }
        if ($value === null) {
            $model->{$row->field} = null;
            return;
        }
        switch ($row->type) {
            case 'email':
                $model->{$row->field} = trim(\Str::lower($value));
                break;
            case 'number':
                $model->{$row->field} = intval($value);
                break;
            case 'price':
                $model->{$row->field} = floatval(preg_replace('/[^0-9.-]+/', '',$value));
                break;
            case 'slug':
                $model->{$row->field} = \Str::kebab($value);
                break;
            case 'json':
                $model->{$row->field} = json_encode($value);
                break;
            case 'date':
                $model->{$row->field} = Carbon::rawParse(intval($value), '+03:30')
                    ->setTimezone('Asia/Tehran')
                    ->format('Y-m-d');
                break;
            case 'datetime':
                $model->{$row->field} = Carbon::rawParse(intval($value), '+03:30')
                    ->setTimezone('Asia/Tehran')
                    ->format('Y-m-d H:i:s');
                break;
            default:
                $model->{$row->field} = str_replace("\r",'',(string) $value);
                break;
        }
    }

    public function redirection_path($submit_type, $slug, $params = [])
    {
        switch ($submit_type) {
            case 'save-and-create':
                $to = route("zeus.{$slug}.create");
                break;
            case 'save-and-edit':
                $to = route("zeus.{$slug}.edit", $params);
                break;
            case 'save-and-after':
                $to = route(request()->query('after'));
                break;
            default:
                $to = route("zeus.{$slug}.index");
                break;
        }
        return $to;
    }

    protected function authorizeModelType($modeltype, $for, $model = null)
    {
        $model_object = $model ?? \ZeusPanel::getModel($modeltype->model_class);
        if ($model_object instanceof ZeusModel) {
            $this->authorize("{$for}-zeus-model", [$model_object, $modeltype->slug]);
            return;
        }
        $this->authorize($for, [$model_object]);
    }
}