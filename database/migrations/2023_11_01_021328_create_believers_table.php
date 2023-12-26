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
        Schema::create('believers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->string("nome");
            $table->enum("genero", ["M", "F"]);
            $table->date("data_nascimento")->nullable();
            $table->string("endereco");
            $table->enum("batizado", [0, 1]);
            $table->string("contacto")->nullable();
            $table->string("cargo")->nullable();
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
        Schema::dropIfExists('believers');
    }
};
