<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionar Colunas da Tabela Fornecedores
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->softDeletes();
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remover Colunas da Tabela Fornecedores
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropSoftDeletes();
            
        });
    }
};
