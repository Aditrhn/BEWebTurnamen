<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
        return \view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('super-dashboard'); //redirect to url link dashboard
        } else {
            return Redirect::to("login"); //routing login jika user tidak ada
        }
    }
    public function createAdmin()
    {
        // return Admin::create([
        //     'name' => 'svperadmin',
        //     'email' => 'svper@mail.com',
        //     'password' => Hash::make('qwerty1234'),
        // ]);
    }
    public function dashboard()
    {
        return \view('admin.game.index');
    }
}
