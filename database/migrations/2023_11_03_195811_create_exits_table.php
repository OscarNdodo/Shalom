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
        Schema::create('exits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("vault_id")->constrained()->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->double("valor");
            $table->string("motivo");
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
        Schema::dropIfExists('exits');
    }
};
