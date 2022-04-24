<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $selection = ['id', 'title', 'icon_class', 'group'];
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2|max:20'
        ]);
        $query = $request->query('q');
        $services = \Cache::remember('quick-order.search.' . \Str::slug($query), 60 * 60, function () use($query) {
            return Service::select($this->selection)
            ->where('main', false)
            ->where(function($query) {
                $query->where('title', 'like', "%{$query}%")->orWhere('subtitle', 'like', "%{$query}%");
            })
            ->limit(6)
            ->get();
        });
        return response()->json($services);
    }
    public function index()
    {
        $services = Service::select($this->selection)->where('main', true)->get();
        return response()->json($services);
    }
}