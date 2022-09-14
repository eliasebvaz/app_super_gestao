<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        /* 1° Método, salvar preenchendo manualmente os campos
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        // Salvando somente se o método passado estiver com POST
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $contato->save();
        }
        */
        
        /* 2° Método, salvar preenchendo com fill
        $contato = new SiteContato();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $contato->fill($request->all());
            $contato->save();
        }
        */

        /* 3° Método, salvar preenchendo com create
        $contato = new SiteContato();
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $contato->create($request->all());
        }
        */

        /* 4° Método, salvar diretamente com o Model
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            SiteContato::create($request->all());
        }
        */
        
        return view ('site.contato', ['titulo' => 'Contato']);
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
        
        return view ('site.contato', ['titulo' => 'Contato']);
    }
}
