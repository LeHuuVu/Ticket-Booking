<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_category', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('movie_id');
            // $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('category_id');
            // $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('movie_category');
    }
}
