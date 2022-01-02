<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthHandlerController extends Controller
{
    public function registerUser(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $validatedData['is_admin'] = false;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Akun Anda Telah Dibuat!');
    }

    public function registerAdmin(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $validatedData['is_admin'] = true;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/addAdmin')->with('success', 'Akun Anda Telah Dibuat!');
    }

    public function loginHandler(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->is_admin == false){
                return redirect()->to('/');
            }else{
                return redirect()->to('/product/create');
            }
        }

        return redirect()->to('/login')->with('error', 'Email atau Password Salah');
    }

    public function logoutHandler(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
