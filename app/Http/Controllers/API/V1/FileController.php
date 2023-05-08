<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoreFileRequest;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController
{
    function upload(Request $request)
    {
        dd($request->all());
        $file_name = $request->sample_image->getClientOriginalExtension();

        $request->sample_image->move(public_path('images'), $file_name);

        $image_path = asset('images/'. $file_name);

        return response()->json(['image_path'=>$image_path]);
    }
    function create(Request $request)
    {
        dd($request->all());
        $file_name = $request->sample_image->getClientOriginalExtension();

        $request->sample_image->move(public_path('images'), $file_name);

        $image_path = asset('images/'. $file_name);

        return response()->json(['image_path'=>$image_path]);
    }
    function store(StoreFileRequest $request)
    {
        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $path = Storage::putFileAs('uploads',$request->file, $fileName);


        Files::create([
            'name' => $fileName,
            'path' => $path,
            'type' => $type,
            'size' => $size
        ]);

        return response()->withSuccess(__('Файл успешно загружен'));
    }
}
