<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        return response()->json(Semester::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $semester = new Semester();
        $semester->name = $data['name'];
        $semester->save();

        return response()->json($semester, 201);
    }

    public function show(Semester $semester)
    {
        return response()->json($semester);
    }

    public function update(Request $request, Semester $semester)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $semester->name = $data['name'];
        $semester->save();

        return response()->json($semester);
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();

        return response()->json(null, 204);
    }
}
