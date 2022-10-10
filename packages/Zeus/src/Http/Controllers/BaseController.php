<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zeus\Models\ModelType;

class BaseController extends Controller
{
    public function website(Request $request)
    {
        $modeltypes = ModelType::where('namespace', 'not like', 'zeus_%')->get();
        return view('zview::pages.browse-overall', compact('modeltypes'));
    }
}