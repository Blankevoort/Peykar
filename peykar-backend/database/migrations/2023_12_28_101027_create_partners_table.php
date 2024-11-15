<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("role");
            $table->string("company");
            $table->integer("phone");
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
};