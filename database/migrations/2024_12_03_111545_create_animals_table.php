<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->unsignedInteger('age');
            $table->text('description');
            $table->unsignedBigInteger('cage_id');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('cage_id')->references('id')->on('cages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('animals');
    }
};
