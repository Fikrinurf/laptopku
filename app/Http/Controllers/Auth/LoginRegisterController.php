<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email Wajib diisi',
                'password.required' => 'password Wajib diisi'
            ]
        );

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'seller') {
                return redirect('/seller/product');
            } else if (Auth::user()->role == 'buyer') {
                return redirect('/product');
            }
        } else {
            return redirect('/')->withErrors('Username dan password yang dimasukan tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('');
    }
}
