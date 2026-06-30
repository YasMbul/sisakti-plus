<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function index()
   {
      return view('login');
   }

   public function login(Request $request)
   {
      $request->validate([
         'nim' => 'required',
         'password' => 'required',
      ]);
      $credentials = [
         'nim' => $request->nim,
         'password' => $request->password,
      ];

      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();

         return match (Auth::user()->role) {
            'admin' => redirect()->route('admin.home'),
            'mahasiswa' => redirect()->route('home'),
            default => redirect()->route('home'),
         };
      }
      return back()
         ->withErrors([
            'nim' => 'NIM atau password salah.',
         ])
         ->withInput();
   }

   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect()->route('login');
   }
}
