<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zeus\Models\ModelRow;

class ModelRowController extends Controller
{
    public function edit(ModelRow $modelrow)
    {
        $modeltype = $modelrow->modeltype()->with(['rows' => function($q) use($modelrow) {
            $q->select('id','title', 'model_type_id')->where('id', '<>', $modelrow->id);
        }])->firstOrFail();
        if (request()->has('debug')) {
            return compact('modeltype', 'modelrow');
        }
        return view('zview::pages.modelrows.edit', compact('modeltype'))->with('row', $modelrow);
    }
    public function update(Request $request, ModelRow $modelrow)
    {
        // return $request->all();
        $modelrow->title = $request->input('title');
        $modelrow->group = $request->input('group');
        $modelrow->parent_id = $request->input('parent');
        $modelrow->type = $request->input('type');
        $modelrow->required = $request->input('required');
        $modelrow->order = $request->input('order');
        $modelrow->default_value = $request->input('default_value');
        $modelrow->placeholder = $request->input('placeholder');
        $modelrow->details = $request->input('details');
        if ($modelrow->save()) {
            flash()->success(
                __('zlang::modeltype.messages.updated', ['name' => trans_choice('zlang::main.modelrows', 1)])
            );
            return redirect()->to(route('zeus.modelrows.edit', ['modelrow' => $modelrow->id]));
        }
        flash()->error('Error');
    }
}