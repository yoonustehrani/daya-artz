<?php

namespace Zeus\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Zeus\Models\File;

class FileController extends Controller
{
    protected function makeThumbnailFrom($uploaded_file)
    {
        $img = \Image::make($uploaded_file)->widen(200);
        $file_name = 'images/tn_' . $uploaded_file->hashName();
        $file = $img->encode($uploaded_file->extension());
        return Storage::disk('public')->put($file_name, $file) ? $file_name : null;
    }
    public function index(Request $request)
    {
        $request->validate([
            'order_dir' => [
                'nullable',
                Rule::in(['desc', 'asc'])
            ],
            'order_by' => [
                'nullable',
                Rule::in(['name', 'ext', 'type', 'created_at', 'deleted_at'])
            ],
            'type' => 'nullable|string'
        ]);
        $files = app()->make(File::class)->query();
        if ($request->has('trash')) {
            $files->onlyTrashed();
        }
        if ($request->query('type') && in_array($request->query('type'), ['image', 'video', 'audio'])) {
            $files->whereType($request->query('type'));
        }
        if ($request->query('ext')) {
            $files->whereExt($request->query('ext'));
        }
        if ($request->query('order_by')) {
            $order = $request->query('order_dir') ?? 'asc';
            $files = $files->orderBy($request->query('order_by'), $order);
        }
        return $files->simplePaginate(12)->withQueryString();
    }
    public function store()
    {
        // $types = ['image', 'video', 'audio'];
        $type = 'image';
        $type_extentions = ['image' => 'jpeg,jpg,png,svg,gif', 'video' => 'gif'];
        request()->validate([
            'file' => [
                'required',
                'file',
                // 'lte:2048',
                "mimes:{$type_extentions[$type]}",
                // new MustHaveExtension(explode(',', strtolower($type_extentions[$type])))
            ]
        ]);
        $uploaded_file = request()->file('file');
        $private = request()->input('visibility') === 'private';
        $path = $private ? $uploaded_file->store('private/images') : $uploaded_file->storePublicly('images', 'public');
        $thumbnail_path = $this->makeThumbnailFrom($uploaded_file, $private);

        if ($path) {
            $file = new File();
            $file->name = $uploaded_file->getClientOriginalName();
            $file->ext = $uploaded_file->extension();
            $file->path = $private ? $path : 'storage/' . $path;
            $file->type = $type;
            $file->thumbnail_path = $private ? $thumbnail_path : 'storage/' . $thumbnail_path;
            $file->save();
            return $file;
        }

        abort(500);
    }
    public function show($file)
    {
        // return 'hello';
    }
    public function destroy(Request $request, $file)
    {
        $file = File::withTrashed($request->has('force_delete'))->find($file);
        return ['okay' => $file->deleted_at ? $file->forceDelete() : $file->delete()];
    }
}