<?php

namespace Zeus\DBAL;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
/**
 * Type that maps an SQL VARCHAR to a PHP string.
 */
class MysqlEnumType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($column);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'enum';
    }
}
