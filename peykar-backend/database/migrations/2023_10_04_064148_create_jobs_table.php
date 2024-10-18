<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("backgroundImage");
            $table->string("image");
            $table->string("workDate");
            $table->string("workConditions");
            $table->string("similarExperience");
            $table->json("benefits");
            $table->string("description")->nullable();
            $table->string("rightsMin")->nullable();
            $table->string("rightsMax")->nullable();
            $table->string("location")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->date("expiresAt");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
