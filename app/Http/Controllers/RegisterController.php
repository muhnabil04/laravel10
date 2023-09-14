<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', ['halaman' => 'Registration']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:11|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'role_id' => 'required',
            'password' => 'required|min:7|max:255'
        ]);

        User::create($validated);

        return redirect('/login')->with('berhasil', 'Registrasi berhasil, silahkan login');
    }
}
