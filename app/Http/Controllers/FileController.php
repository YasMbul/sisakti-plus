<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return response()->json(File::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:2048',
        ]);

        $file = new File();
        $file->name = $data['name'];
        $file->url = $data['url'];
        $file->save();

        return response()->json($file, 201);
    }

    public function show(File $file)
    {
        return response()->json($file);
    }

    public function update(Request $request, File $file)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:2048',
        ]);

        $file->name = $data['name'];
        $file->url = $data['url'];
        $file->save();

        return response()->json($file);
    }

    public function destroy(File $file)
    {
        $file->delete();

        return response()->json(null, 204);
    }
}
