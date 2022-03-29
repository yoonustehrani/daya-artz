<?php

namespace Zeus\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Zeus\Models\ModelRow;
use Zeus\Models\ModelType;

class ModelRowController extends Controller
{
    public function index($model_type)
    {
        $model_type = ModelType::with('rows')->findOrFail($model_type);
        // $rows = ModelType::where('id', $model_type)->rows()->get();

        return response()->json($model_type->rows);
    }
    public function store()
    {

    }
    public function show()
    {

    }
    public function update()
    {
        
    }
    public function destroy($modeltype_id, $row_id)
    {
        $row = ModelRow::where('model_type_id', $modeltype_id)->findOrFail($row_id);

        return $row;
    }
    public function groups($model_type)
    {
        return DB::table(ModelRow::TABLE_PREFIX . 'model_rows')
                ->select('group as group_name')
                ->where('model_type_id', $model_type)
                ->orderBy('group')
                ->distinct()
                ->get();
        // return DB::table(ModelRow::TABLE_PREFIX . 'model_rows')
        //         ->select('group as group_name', 'order')
        //         ->where('model_type_id', $model_type)
        //         ->groupBy('group')
        //         ->orderBy('order', 'asc')
        //         ->distinct()
        //         ->get();
    }
}