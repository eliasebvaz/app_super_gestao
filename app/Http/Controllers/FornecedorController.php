<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use Illuminate\Http\Request;


class FornecedorController extends Controller
{
    // $next da tela de fornecedor
    public function index() { 
        
        return view ('app.fornecedor.index');
    }

    // Função de pesquisa de fornecedor
    public function listar(Request $request) { 
        
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();
        return view ('app.fornecedor.listar', ['fornecedores'=> $fornecedores]);
    }

    // Função de adição de fornecedor
    public function adicionar(Request $request) { 

        $msg = "";

        // Cadastro do registro
        $regras = [
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'email'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
            'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
            'email.email' => 'O campo email não foi preenchido corretamente',
        ];

        // Inclusão de um novo fornecedor
        if(($request->input('_token') != '') && ($request->input('id') == '')){

            $request->validate($regras, $feedback);
            Fornecedor::create($request->all());

            $msg = "Cadastro realizado com sucesso";

            return view ('app.fornecedor.adicionar', ['msg' => $msg]);
        }

        // Alteração de um fornecedor
        if(($request->input('_token') != '') && ($request->input('id') != '')){

            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = "Update realizado com sucesso";
            } else {
                $msg = "Alteração apresentou erro";
            }

            // $request->validate($regras, $feedback);

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        // Caso caia pelo método get
        return view ('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    // Função de edição de fornecedor
    public function editar($id, $msg = '') { 

        // Criando o objeto e atribuindo a pesquisa do id para ele
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);

    }

    // Função de excluir de fornecedor
    public function excluir($id) { 

        // Excluir registro no banco
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');

    }
}
