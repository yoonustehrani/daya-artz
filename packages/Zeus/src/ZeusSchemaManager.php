<?php

namespace Zeus;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Zeus\DBAL\EnumType;

class ZeusSchemaManager
{
    public function getConnectionForSchema($config)
    {
        $conn = DriverManager::getConnection([
            'dbname' => $config['database'],
            'user' => $config['username'],
            'password' => $config['password'],
            'host' => $config['host'],
            'driver' => 'pdo_mysql',
        ]);
        if (! Type::hasType('enum_for_mysql')) {
            Type::addType('enum_for_mysql', EnumType::class);
        }
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'enum_for_mysql');
        return $conn;
    }
    public function getSchema()
    {
        $conn = $this->getConnectionForSchema(config('database.connections.mysql'));
        return $conn->createSchemaManager();
    }
    public function getTableDetails($table)
    {
        return $this->getSchema()->listTableDetails($table);
    }
    public function getUniqueIndexFor(\Doctrine\DBAL\Schema\Table $table, string $column)
    {
        $related_unique_indexes = collect($table->getIndexes())
                ->filter(fn($index) => $index->isUnique())
                ->filter(fn($index) => in_array($column, $index->getColumns()))
                ->values();
        return $related_unique_indexes;
    }
    public function columnIsUnique(\Doctrine\DBAL\Schema\Table $table, string $column)
    {
        if ($table->hasColumn($column)) return !! $this->getUniqueIndexFor($table, $column)->count();
        abort("Column Does not exist", 403);
    }
    public function columnIsPrimary(\Doctrine\DBAL\Schema\Table $table, string $column)
    {
        if ($table->hasColumn($column)) return in_array($column, optional($table->getPrimaryKey())->getColumns() ?? []);
        abort("Column Does not exist", 403);
    }
    protected function getEnumChoices($table, $column)
    {
        $type = \DB::selectOne("SHOW COLUMNS FROM `{$table}` WHERE FIELD = '{$column}'")->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $choices = [];
        if ($matches[1]) {
            $choices = explode(',', str_replace("'", "", $matches[1]));
        }
        return $choices;
    }
}