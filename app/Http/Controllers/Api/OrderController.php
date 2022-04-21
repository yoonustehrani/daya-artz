<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function services(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2|max:20'
        ]);
        $query = $request->query('q');
        $services = Service::where('title', 'like', "%{$query}%")->orWhere('subtitle', 'like', "%{$query}%")->limit(3)->get();
        return response()->json($services);
    }
}