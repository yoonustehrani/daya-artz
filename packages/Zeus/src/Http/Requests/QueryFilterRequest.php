<?php

namespace Zeus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QueryFilterRequest extends FormRequest
{
    protected $filters = ['exact', 'contains', 'gt', 'gte', 'lt', 'lte', 'starts_with', 'ends_with', 'range', 'pivot'];
    // protected $pivot_filters = [];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    public function getFilterables()
    {
        $filterables = [];
        foreach ($this->filters as $filter) {
            $filterables[$filter] = collect($this->query())
                ->filter(fn($v,$k) => str_ends_with($k, "__$filter"))
                ->mapWithKeys(fn($v,$k) => [str_replace("__$filter", '',$k) => $v])->toArray();
        }
        return $filterables;
    }
}
