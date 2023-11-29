<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials) ) {
            $id_admin = Auth::user()->id;

            session()->put('id_admin', $id_admin);
                return redirect()->intended('admin/trang-chu')->withSuccess('Đăng nhập thành công');

        }
        return view('admin.login')->with('error','Thông tin đăng nhập không chính xác');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }

    // Thay đổi mật khẩu
    public function viewChangePassword(){   
        return view('admin.changepassword');
    }

    public function changePassword(Request $request)
    {   
        $request->validate([
            'old-password' => 'required',
            'new-password' => 'required|string|different:old-password',
            'renew-password' => 'required|string|same:new-password',
        ]);

        $user = User::where('id',session('id_admin'))->get();
        // dd(request()->input('old-password'));die();
        if (!Hash::check(request()->input('old-password'), $user[0]['password'])) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại bạn nhập không đúng');
        }
        $user[0]->update(['password' => bcrypt(request()->input('new-password'))]);
        

        return redirect('admin/changepassword')->withSuccess('Mật khẩu đã được cập nhật thành công');
    }
}
