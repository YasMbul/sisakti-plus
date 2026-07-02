<?php

namespace App\Http\Controllers;

use App\Models\Unsur;
use Illuminate\Http\Request;

class UnsurController extends Controller
{
    public function index()
    {
        return response()->json(Unsur::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unsur = new Unsur();
        $unsur->name = $data['name'];
        $unsur->save();

        return response()->json($unsur, 201);
    }

    public function show(Unsur $unsur)
    {
        return response()->json($unsur);
    }

    public function update(Request $request, Unsur $unsur)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unsur->name = $data['name'];
        $unsur->save();

        return response()->json($unsur);
    }

    public function destroy(Unsur $unsur)
    {
        $unsur->delete();

        return response()->json(null, 204);
    }
}
