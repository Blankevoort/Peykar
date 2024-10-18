<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('academic_experience_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("profile_id");
            $table->unsignedBigInteger("academic_experience_id");
        });
    }

    public function down()
    {
        Schema::dropIfExists('academic_experience_profile');
    }
};
