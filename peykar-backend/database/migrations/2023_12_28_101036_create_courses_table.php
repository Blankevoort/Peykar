<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("organizer");
            $table->string("country");
            $table->boolean("certified");
            $table->dateTime("year");
            $table->dateTime("length");
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
