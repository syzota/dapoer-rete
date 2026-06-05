<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (session('id_user')) {
            if (session('role') === 'owner') {
                return redirect('/owner/berita');
            }
            return redirect('/pegawai/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('name', $request->name)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return back()->with('error', 'Nama atau password salah');
        }

        session([
            'id_user' => $user->id,
            'name' => $user->name,
            'role' => $user->role,
            'id_cabang' => $user->id_cabang
        ]);

        if ($user->role == 'owner') {
            return redirect('/owner/berita');
        }

        return redirect('/pegawai/dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}