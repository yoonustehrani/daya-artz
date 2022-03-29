<?php

namespace Zeus\Traits;

// use Illuminate\Database\Query\Builder;

trait FiltersQuery
{
    public function scopeQueryFilter($builder, $filterables)
    {
        foreach ($filterables as $filter => $items) {
            $filter = 'filter' . \Str::camel($filter);
            foreach ($items as $key => $value) {
                if ($value) {
                    $builder->{$filter}($key, $value);
                }
            }
        }
        if ($orderby = request('order_by')) {
            $builder->orderBy($orderby, request('order_dir') === 'desc' ? 'desc' : 'asc');
        }
    }
    public function scopeFilterExact($builder, $column, $query)
    {
        $builder->where($column, '=', $query);
    }
    public function scopeFilterContains($builder, $column, $query)
    {
        $builder->where($column, 'like', "%$query%");
    }
    public function scopeFilterStartsWith($builder, $column, $query)
    {
        $builder->where($column, 'like', "$query%");
    }
    public function scopeFilterEndsWith($builder, $column, $query)
    {
        $builder->where($column, 'like', "%$query");
    }
    public function scopeFilterGt($builder, $column, $query)
    {
        $builder->where($column, '>', $query);
    }
    public function scopeFilterGte($builder, $column, $query)
    {
        $builder->where($column, '>=', $query);
    }
    public function scopeFilterLt($builder, $column, $query)
    {
        $builder->where($column, '<', $query);
    }
    public function scopeFilterLte($builder, $column, $query)
    {
        $builder->where($column, '<=', $query);
    }
    public function scopeFilterRange($builder, $column, $query)
    {
        $range = explode(',', $query);
        if (count($range) == 2) {
            $builder->whereBetween($column, $range);
        }
    }
}