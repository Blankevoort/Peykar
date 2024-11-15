<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string("jobTitle");
            $table->string("field");
            $table->string("organizationalLevel");
            $table->string("companyName");
            $table->string("companyField");
            $table->string("country");
            $table->string("city");
            $table->string("startMonth");
            $table->string("achievements");
            $table->string("startYear");
            $table->string("endMonth")->nullable();
            $table->string("endYear")->nullable();
            $table->boolean("currentlyWorking")->default(false);
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_experiences');
    }
};
