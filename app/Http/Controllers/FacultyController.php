<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        return response()->json(Faculty::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:faculties,name',
        ]);

        $faculty = new Faculty();
        $faculty->name = $data['name'];
        $faculty->save();

        return response()->json($faculty, 201);
    }

    public function show(Faculty $faculty)
    {
        return response()->json($faculty);
    }

    public function update(Request $request, Faculty $faculty)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:faculties,name,' . $faculty->id,
        ]);

        $faculty->name = $data['name'];
        $faculty->save();

        return response()->json($faculty);
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return response()->json(null, 204);
    }
}
