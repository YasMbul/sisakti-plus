<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::with('major')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:users,nim',
            'password' => 'required|string|min:8',
            'major_id' => 'required|exists:majors,id',
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->nim = $data['nim'];
        $user->password = Hash::make($data['password']);
        $user->major_id = $data['major_id'];
        $user->save();

        return response()->json($user->load('major'), 201);
    }

    public function show(User $user)
    {
        return response()->json($user->load('major'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:users,nim,' . $user->id,
            'password' => 'nullable|string|min:8',
            'major_id' => 'required|exists:majors,id',
        ]);

        $user->name = $data['name'];
        $user->nim = $data['nim'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->major_id = $data['major_id'];
        $user->save();

        return response()->json($user->load('major'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
