<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_tag', function (Blueprint $table) {
            $table->unsignedBigInteger("tag_id");
            $table->unsignedBigInteger("job_id");
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_tag');
    }
};
