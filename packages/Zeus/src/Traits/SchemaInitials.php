<?php

namespace Zeus\Traits;

trait SchemaInitials
{
    public function guess_best_type($column)
    {
        switch ($column['type']) {
            case 'bigint':
            case 'int':
            case 'integer':
            case 'biginteger':
                $type = 'number';
                break;
            case 'datetime':
                $type = 'datetime';
                break;
            case 'string':
                switch ($column['name']) {
                    case 'password':
                        $type = 'password';
                        break;
                    case 'email':
                        $type = 'email';
                        break;
                    case 'slug':
                        $type = 'slug';
                        break;
                }
                break;
            case 'text':
                $type = 'textarea';
                break;
            case 'enum':
                $type = 'select';
                break;
            case 'json':
                $type = 'json';
                break;
            case 'boolean':
                $type = 'checkbox';
                break;
            default:
                $type = 'text';
                break;
        }
        return $type ?? 'text';
    }
    public function guess_best_visibility($column)
    {
        $disallow = [];
        if ($column['autoincrement'] || $column['name'] == 'id') {
            $disallow = ['create', 'edit', 'browse'];
        }
        if ($column['input_type'] == 'password' || $column['type'] == 'json') {
            $disallow = ['browse', 'view'];
        }
        if ($column['name'] == 'updated_at' || $column['name'] == 'deleted_at') {
            $disallow = ['create', 'edit', 'browse'];
        }
        if ($column['name'] == 'created_at') {
            $disallow = ['create', 'edit'];
        }
        if (empty($disallow)) {
            $disallow = ['trash'];
        }
        $visibilities = [];
        foreach ($this->getVisibilities() as $v) {
            $value = ! in_array($v, $disallow);
            $visibilities[$v] = $value;
        }
        return $visibilities;
    }
    public function getTableColumns($table, $customize = false, $withUnique = false, $withPrimary = true)
    {
        if ($this->getSchema()->tablesExist($table)) {
            $table = $this->getTableDetails($table);
            $table_columns = $table->getColumns();
            if ($customize) {
                $table_columns = collect($table_columns)->map(function($column) use($table, $withUnique, $withPrimary) {
                    $column = $column->toArray();
                    $details = ['rules' => ['create' => [], 'update' => []]];
                    $column['type'] = $column['type']->getName();
                    if ($column['type'] == 'enum') {
                        $details['choices'] = $this->getEnumChoices($table->getName(), $column['name']);
                    }
                    if ($withPrimary) {
                        $column['primary'] = $this->columnIsPrimary($table, $column['name']);
                    }
                    if ($withUnique) {
                        $column['unique'] = $this->columnIsUnique($table, $column['name']);
                    }
                    $column['input_type'] = $this->guess_best_type($column);
                    if ($column['input_type'] === 'slug') {
                        $details['from'] = "";
                    }
                    $column['visibilities'] = $this->guess_best_visibility($column);
                    $column['details'] = $details;
                    return $column;
                });
            }
            return $table_columns;
        }
        abort(403, "Table does not exist in the database");
    }
}