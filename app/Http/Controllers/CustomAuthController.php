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
            $id_admin = Auth::user()->id;
<<<<<<< HEAD
            // session()->put('id_admin', $id_admin);
                return redirect()->intended('admin/trang-chu')->with('Đăng nhập thành công');
=======
            session()->put('id_admin', $id_admin);
                return redirect()->intended('admin/trang-chu')->withSuccess('Đăng nhập thành công');
>>>>>>> 6e889ce540d515fb534e280225db563731ca4d06
        }
        return view('admin.login')->with('Thông tin đăng nhập không chính xác');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }
}
