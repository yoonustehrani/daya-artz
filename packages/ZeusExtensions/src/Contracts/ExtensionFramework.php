<?php

namespace ZeusExtensions\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Zeus\Models\ModelType;

abstract class ExtensionFramework
{
    public $name;
    public $modelType;
    public $method;
    public abstract function shouldBeInjected();
    public abstract function inject();
    public abstract function shouldHandleAdjustment();
    public abstract function handleAdjustment(Request $request, Model $model);
    public function getName(): string
    {
        return $this->name;
    }
    public function setModelType(ModelType $modelType)
    {
        $this->modelType = $modelType;
        return $this;
    }
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
}