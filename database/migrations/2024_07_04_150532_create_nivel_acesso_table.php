<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivelAcessoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('nivel_acesso', function (Blueprint $table) {
            $table->id();
            $table->string('nivel_user', 100);
        }); 
    
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivel_acesso');
    }
};
