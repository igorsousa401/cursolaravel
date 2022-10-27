<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo de E-mail não pode ser vazio!',
            'password.required' => 'O campo de Senha não pode ser vazio!',
            'email.email' => 'O E-mail não é válido!',
        ]
    
    );

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else{
            return redirect()->back()->with('erro', 'E-mail/Senha incorreto(s)!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('site.index'));
    }
}
