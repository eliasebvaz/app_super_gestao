<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Com método tradicional do objeto
        $fornecedor = new Fornecedor();

        $fornecedor->nome = "Fornecedor 100";
        $fornecedor->site = "fornecedor100.com.br";
        $fornecedor->uf = "CE";
        $fornecedor->email = "contato@fornecedor100.com.br";
        $fornecedor->save();

        // Com método Create (Atenção para o atributo fillable no Model da Classe)
        Fornecedor::create([
            "nome" => "Fornecedor 200",
            "site" => "fornecedor200.com.br",
            "uf" => "RS",
            "email" => "contato@fornecedor200.com.br"
        ]);

        // Com método Insert (Sem Eloquent, fica sem os timestamps)
        \DB::table('fornecedores')->insert([

            "nome" => "Fornecedor 300",
            "site" => "fornecedor300.com.br",
            "uf" => "SP",
            "email" => "contato@fornecedor300.com.br"

        ]);
    }
}
