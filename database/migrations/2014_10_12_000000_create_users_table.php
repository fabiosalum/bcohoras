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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('setor_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('matricula')->nullable();
            $table->string('password');
            $table->date('data_nascimento')->nullable();
            $table->enum('regras', ['admin', 'supervisor', 'user'] )->default('user');
            $table->enum('status', ['1', '0'] )->default('1');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('setor_id')->references('id')->on('setors');
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
