<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('pengguna.login');
    }

    public function postlogin(Request $req)
    {

        $this->validate($req, [
            'username' => ['required', 'max:250'],
            'password' => ['required', 'max:250'],
        ]);

        // dd($req->all());
        if (Auth::attempt($req->only('username', 'password'))) {
            return redirect('companies');
        }
        return redirect('login');

        // $success = Auth::attempt([
        //     'username' => $req->username,
        //     'password' => $req->password
        // ]);

        // if ($success) {
        //     return redirect('user');
        // }
        // return redirect()->back();
    }

    public function logout(Request $req)
    {
        // Auth::logout();
        // return redirect('/login');

        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }
}
