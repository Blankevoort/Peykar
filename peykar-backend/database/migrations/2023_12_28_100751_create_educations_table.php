<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('grade')->nullable();
            $table->string('fieldofStudy')->nullable();
            $table->string('university')->nullable();
            $table->string('GPA')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->boolean('stillStuding')->nullable();
            $table->boolean('underDiploma')->nullable();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('educations');
    }
};
