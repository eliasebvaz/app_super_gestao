<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
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
            echo 'Usuário validado';
        } else {
            echo 'Usuário não existe'; 
        }
    }
}
