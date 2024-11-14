<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('colleagues', function (Blueprint $table) {
            $table->id();
            $table->string("fullName");
            $table->string("organizationName");
            $table->string("jobTitle");
            $table->string("organizationalRelationship");
            $table->string("contactNumber");
            $table->date("startYear");
            $table->date("endYear")->nullable();
            $table->boolean("weStillWorkTogether")->default(false);
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('colleagues');
    }
};
