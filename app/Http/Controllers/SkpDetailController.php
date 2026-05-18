<?php

namespace App\Http\Controllers;

use App\Models\SkpDetail;
use Illuminate\Http\Request;

class SkpDetailController extends Controller
{
    public function index()
    {
        return response()->json(SkpDetail::with('unsur')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:skp_details,name',
            'bobot' => 'required|integer|min:0',
            'unsur_id' => 'required|exists:unsurs,id',
        ]);

        $detail = new SkpDetail();
        $detail->name = $data['name'];
        $detail->bobot = $data['bobot'];
        $detail->unsur_id = $data['unsur_id'];
        $detail->save();

        return response()->json($detail->load('unsur'), 201);
    }

    public function show(SkpDetail $skpDetail)
    {
        return response()->json($skpDetail->load('unsur'));
    }

    public function update(Request $request, SkpDetail $skpDetail)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:skp_details,name,' . $skpDetail->id,
            'bobot' => 'required|integer|min:0',
            'unsur_id' => 'required|exists:unsurs,id',
        ]);

        $skpDetail->name = $data['name'];
        $skpDetail->bobot = $data['bobot'];
        $skpDetail->unsur_id = $data['unsur_id'];
        $skpDetail->save();

        return response()->json($skpDetail->load('unsur'));
    }

    public function destroy(SkpDetail $skpDetail)
    {
        $skpDetail->delete();

        return response()->json(null, 204);
    }
}
