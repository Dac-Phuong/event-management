<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function post_login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|string',
                'password' => 'required'
            ],
        );
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('error', $errors);
        } else {
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
            }
            if (Auth::user()->status !== 1) {
                return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khóa');
            }
            return redirect('admin');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');

    }
}
