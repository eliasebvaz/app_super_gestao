<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function principal(Request $request) {

        $request->all();

        return view ('site.contato', ['titulo' => 'Contato']);
    }
}
