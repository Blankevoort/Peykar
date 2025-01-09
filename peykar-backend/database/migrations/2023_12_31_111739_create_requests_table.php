<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('state')->default('درحال بررسی');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
