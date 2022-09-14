<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        // Com método tradicional do objeto
        $contato = new SiteContato();

        $contato->nome = "Sistema SG";
        $contato->telefone = "(11) 99999-8888";
        $contato->email = "contato@sg.com.br";
        $contato->motivo_contato = 1;
        $contato->mensagem = "Seja bem-vindo ao sistema Super Gestão";
        $contato->save();
        */

        \App\Models\SiteContato::factory()->count(300)->create();
        
    }
}
