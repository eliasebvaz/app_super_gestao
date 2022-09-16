<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        // Enviando motivo_contatos
        $motivo_contatos = \App\Models\MotivoContato::all();
        
        return view ('site.contato', ['titulo' => 'Contato'],  ['motivo_contatos' => $motivo_contatos]);
    }

    // Método para Salvar
    public function salvar(Request $request) {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ];

        $feedback = 
        [
            // Mensagem por campo
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            
            // Mensagem para default
            'required' => 'O campo :attribute deve precisa ser preenchido',
        ];

        // Validação dos dados
        $request->validate($regras, $feedback);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            SiteContato::create($request->all());
        }
        
        // Enviando motivo_contatos
        $motivo_contatos = \App\Models\MotivoContato::all();
        
        // return view ('site.contato', ['titulo' => 'Contato'],  ['motivo_contatos' => $motivo_contatos]);
        return redirect()->route('site.index');
    }
}
