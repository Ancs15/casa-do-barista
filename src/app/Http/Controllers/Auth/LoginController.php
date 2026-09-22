<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Usa o arquivo de autenticação DO LARAVEL
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibir tela de login
    public function index()
    {
        //Carrega uma tela de LOGIN
        return view('auth.login');
    }


    // Realizar login
    public function login(Request $request)
    {
        // 1 - Validar dados
        $dados = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Informe seu e-mail.',
            'email.email' => 'Informe um e-mail válido.',
            'password.required' => 'Informe sua senha.',
        ]);


        // 2 - Tentar autenticar
        if (Auth::attempt([
            'email_usuarios' => $dados['email'],
            'password' => $dados['password'],
            'status_usuarios' => 'ATIVO',
        ])) {

            // Segurança: cria uma nova sessão
            $request->session()->regenerate();

            // Vai para a página solicitada ou dashboard
            return redirect()
                ->intended(route('dashboard'));
        }


        // 3 - Login inválido
        return back()
            ->withErrors([
                'email' => 'E-mail ou senha incorretos.',
            ])
            ->onlyInput('email');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Destrói a sessão
        $request->session()->invalidate();

        // Limpa os tokens da sessão
        $request->session()->regenerateToken();

        //Volta pra tela de Login
        return redirect()
            ->route('login')
            ->with('success', 'Logout realizado com sucesso.');
    }
}