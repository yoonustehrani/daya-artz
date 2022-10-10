<?php

namespace ZeusExtensions\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Zeus\Models\ModelType;

interface ExtensionStructure
{
    // public function shouldBeInjected(ModelType $modelType, $method) :bool;
    // public function shouldHandleAdjustment() :bool;
    // public function inject() :string;
    // public function handleAdjustment(Request $request, Model $model) :void;
    public function getName() :string;
    public function setModelType(ModelType $modelType) :void;
}