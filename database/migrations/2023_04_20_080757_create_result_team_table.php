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
        Schema::create('result_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('result_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->foreign('result_id')->references('id')->on('results') ->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams') ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_team');
    }
};
