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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            
            $table->bigInteger('platform_id')->unsigned()->index()->nullable();
            $table->foreign('platform_id')->references('id')->on('platforms');
            
            $table->bigInteger('genre_id')->unsigned()->index()->nullable();
            $table->foreign('genre_id')->references('id')->on('genres');
            
            $table->bigInteger('publisher_id')->unsigned()->index()->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers');

            $table->boolean('is_physical');
            $table->boolean('is_digital');
            $table->integer('release');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
