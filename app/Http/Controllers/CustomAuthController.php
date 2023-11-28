<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function Login(){
        return view('admin.login');
    }

    public function Dashboard(){
        return view('admin.trangchu');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('name','email','password');
        if (Auth::attempt($credentials) ) {
            $request->session()->regenerate(); // Refresh session ID for security
            $id_admin = Auth::user()->id;
            return redirect()->intended('/admin/trang-chu'); // Chuyển hướng đến trang mong muốn
        }
        return view('admin.login')->with('Thông tin đăng nhập không chính xác');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }
}
