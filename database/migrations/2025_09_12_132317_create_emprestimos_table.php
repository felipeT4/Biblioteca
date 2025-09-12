<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->datetime('data_emprestimo');
            $table->datetime('data_devolucao');
            $table->integer('codigo_membro');
            $table->integer('codigo_livro');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
