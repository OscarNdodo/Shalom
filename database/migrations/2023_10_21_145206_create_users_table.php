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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("telefone")->unique();
            $table->enum("cargo", ["admin", "financas", "secretaria"]);
            $table->enum("nivel", ["A", "B", "C", "D"]);
            $table->enum("status", [1, 0]);
            $table->string("senha");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
