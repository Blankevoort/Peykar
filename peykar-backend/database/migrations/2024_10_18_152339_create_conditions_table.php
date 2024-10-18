<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string("age");
            $table->string("gender");
            $table->string("militaryService");
        });
    }

    public function down()
    {
        Schema::dropIfExists('conditions');
    }
};
