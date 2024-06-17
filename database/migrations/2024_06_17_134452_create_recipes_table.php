<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('cooking_time');
            $table->text('ingredients');
            $table->text('instructions');
            $table->foreignId('category_id')->constrained();
            $table->boolean('is_private')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}