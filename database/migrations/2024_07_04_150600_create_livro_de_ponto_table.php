<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivroDePontoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        
        Schema::create('livro_de_ponto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('data', 100);
            $table->string('entrada', 100);
            $table->string('saida_intervalo', 100);
            $table->string('retorno_intervalo', 100);
            $table->string('saida', 100);
            $table->string('total_horas', 100);
            $table->string('horas_minimas', 100);
            $table->string('horas_extras', 100);
            $table->string('horas_devendo', 100);
        });
    
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_de_ponto');
    }
};