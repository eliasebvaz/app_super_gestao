<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválidos';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a pagina';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        
        // Regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // Mensagens de feedback
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // Se não passar pelo validate, cai na ultima rota acessada
        $request->validate($regras, $feedback);

        // Recuperando os parâmetros do form
        $email = $request->get('usuario');
        $password =  $request->get('senha');

        // Usando o model user
        $user = new User();

        // Pesquisando no banco de dados
        $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        } else {

            // Redirecionando para a rota no método get
            return redirect()->route('site.login', ['erro' => '1']);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}