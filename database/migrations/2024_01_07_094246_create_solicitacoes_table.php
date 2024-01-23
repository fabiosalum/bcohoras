<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('data_movimentacao')->nullable();
            $table->time('qtde_horas')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('motivo')->nullable();
            $table->enum('status', ['pendente', 'aprovado'])->default('pendente');
            $table->enum('regras', ['entrada','saida'])->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
