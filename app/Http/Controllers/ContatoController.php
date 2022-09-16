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

        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            SiteContato::create($request->all());
        }
        
        // Enviando motivo_contatos
        $motivo_contatos = \App\Models\MotivoContato::all();
        
        return view ('site.contato', ['titulo' => 'Contato'],  ['motivo_contatos' => $motivo_contatos]);
    }
}
