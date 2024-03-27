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
        if (!Schema::connection('mysql')->hasTable('board_games')) {
            Schema::connection('mysql')->create('board_games', function (Blueprint $table) {
                $table->id();
                $table->string('name', 30);
                $table->string('created_by', 30);
                $table->string('created_year', 30);
                $table->string('genre', 30);
                $table->string('language', 30);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_games');
    }
};
