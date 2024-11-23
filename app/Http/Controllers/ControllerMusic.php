<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Penyanyi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ControllerMusic extends Controller
{
    public function index()
    {
        $penyanyi = Penyanyi::with('relasi')->get();
        return view('home', compact('penyanyi'));
    }
    public function login()
    {
        return view('login');
    }
    public function pencarian()
    {
        return view('pencarian');
    }
    public function register()
    {
        return view('register');
    }
    public function storeRegister(Request $request)
    {
        $data = $request->validate(['name' => 'string', 'email' => 'email', 'password' => 'min:2', 'foto' => 'image']);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->storeAs('public/img', $foto->getClientOriginalName());
            $data['foto'] = str_replace('public', 'storage', $fotoPath);
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect('login');
    }
    public function storeLogin(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->with('gagal', 'nama atau password salah ');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
