<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("birth")->nullable();
            $table->string("resume")->nullable();
            $table->string("description")->nullable();
            $table->string("phone")->nullable();
            $table->string("gender")->nullable();
            $table->string("maritalStatus")->nullable();
            $table->string("militaryServiceStatus")->nullable();
            $table->string("city")->nullable();
            $table->string("region")->nullable();
            $table->string("expectedSalary")->nullable();
            $table->string("preferredJob")->nullable();
            $table->unsignedBigInteger("user_id")->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
