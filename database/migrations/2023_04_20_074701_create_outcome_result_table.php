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
        Schema::create('outcome_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('result_id')->unsigned();
            $table->integer('outcome_id')->unsigned();
            $table->foreign('result_id')->references('id')->on('results') ->onDelete('cascade');
            $table->foreign('outcome_id')->references('id')->on('outcomes') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcome_result');
    }
};
