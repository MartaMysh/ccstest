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
        if (!Schema::connection('sqlite')->hasTable('sales')) {
            Schema::connection('sqlite')->create('sales', function (Blueprint $table) {
                $table->id();
                $table->integer('board_game_id');
                $table->string('price', 30);
                $table->string('market', 30);
                $table->string('customer', 30);
                $table->timestamps();
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
