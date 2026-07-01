<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return response()->json(Major::with('faculty')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'name' => 'required|string|max:100|unique:majors,name',
        ]);

        $major = new Major();
        $major->faculty_id = $data['faculty_id'];
        $major->name = $data['name'];
        $major->save();

        return response()->json($major->load('faculty'), 201);
    }

    public function show(Major $major)
    {
        return response()->json($major->load('faculty'));
    }

    public function update(Request $request, Major $major)
    {
        $data = $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'name' => 'required|string|max:100|unique:majors,name,' . $major->id,
        ]);

        $major->faculty_id = $data['faculty_id'];
        $major->name = $data['name'];
        $major->save();

        return response()->json($major->load('faculty'));
    }

    public function destroy(Major $major)
    {
        $major->delete();

        return response()->json(null, 204);
    }
}
