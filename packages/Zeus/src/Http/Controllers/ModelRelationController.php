<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zeus\Models\ModelRelation;
use Zeus\Models\ModelType;

class ModelRelationController extends Controller
{
    public function index($modeltype)
    {
        $modeltype = ModelType::with('relations')->findOrFail($modeltype);
        return view('zview::pages.modelrelations.index', compact('modeltype'));
    }
    public function store(Request $request, $modeltype)
    {
        $modeltype = ModelType::findOrFail($modeltype);
        $relation = new ModelRelation();
        $relation->type = $request->type;
        $relation->local_method = $request->local_method;
        $relation->target_model_type = $request->target_model_type;

        $modeltype->relations()->save($relation);
        return redirect(route('zeus.modeltypes.relations.index', ['modeltype' => $modeltype->getKey()]));
    }
    // public function update(ModelRelation $relation)
    // {
    //     return $relation;
    // }
    public function destroy($relation)
    {
        ModelRelation::whereId($relation)->delete();
        return back();
    }
}