<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->string("level");
            $table->string("proficiency");
        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
