<?php

namespace Zeus;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zeus\Zeus
 * @method static mixed getSchema
 * @method static \Doctrine\DBAL\Schema\Table getTableDetails
 * @method static mixed columnIsUnique
 * @method static array getDataTypes
 * @method static array getVisibilities
 * @method static \Illuminate\Database\Eloquent\Model getModel
 */
class ZeusFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Zeus::class;
    }
}