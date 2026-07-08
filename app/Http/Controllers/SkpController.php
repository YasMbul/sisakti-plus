<?php

namespace App\Http\Controllers;

use App\Models\Skp;
use Illuminate\Http\Request;

class SkpController extends Controller
{
    public function index()
    {
        return response()->json(Skp::with(['user', 'semester', 'skpDetail'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'sertificate' => 'required|string|max:255',
            'status' => 'required|in:pending,approved',
            'note' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'semester_id' => 'required|exists:semesters,id',
            'skp_detail_id' => 'required|exists:skp_details,id',
        ]);

        $skp = new Skp();
        $skp->name = $data['name'];
        $skp->location = $data['location'];
        $skp->start_date = $data['start_date'];
        $skp->end_date = $data['end_date'];
        $skp->sertificate = $data['sertificate'];
        $skp->status = $data['status'];
        $skp->note = $data['note'] ?? null;
        $skp->user_id = $data['user_id'];
        $skp->semester_id = $data['semester_id'];
        $skp->skp_detail_id = $data['skp_detail_id'];
        $skp->save();

        return response()->json($skp->load(['user', 'semester', 'skpDetail']), 201);
    }

    public function show(Skp $skp)
    {
        return response()->json($skp->load(['user', 'semester', 'skpDetail']));
    }

    public function update(Request $request, Skp $skp)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'sertificate' => 'required|string|max:255',
            'status' => 'required|in:pending,approved',
            'note' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'semester_id' => 'required|exists:semesters,id',
            'skp_detail_id' => 'required|exists:skp_details,id',
        ]);

        $skp->name = $data['name'];
        $skp->location = $data['location'];
        $skp->start_date = $data['start_date'];
        $skp->end_date = $data['end_date'];
        $skp->sertificate = $data['sertificate'];
        $skp->status = $data['status'];
        $skp->note = $data['note'] ?? null;
        $skp->user_id = $data['user_id'];
        $skp->semester_id = $data['semester_id'];
        $skp->skp_detail_id = $data['skp_detail_id'];
        $skp->save();

        return response()->json($skp->load(['user', 'semester', 'skpDetail']));
    }

    public function destroy(Skp $skp)
    {
        $skp->delete();

        return response()->json(null, 204);
    }
}
