<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorizacaoUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        
        Schema::create('autorizacao_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'user_id'
            );
            $table->foreignId('nivel_acesso_id')->constrained(
                table: 'nivel_acesso', indexName: 'nivel_acesso_id'
            );
        });
    
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizacao_users');
    }
};
