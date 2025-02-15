<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function createRegistrasi()
    {
        return view('auth.register');
    }

    public function storeRegistrasi(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->route('login');
    }

    public function tampilLogin()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('welcome');
        } else {
            return redirect()->route('login')->with('gagal', 'Email atau Password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}