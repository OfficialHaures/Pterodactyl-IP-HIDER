<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityIpsTable extends Migration
{
    public function up()
    {
        Schema::create('activity_ips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->string('ip_address');
            $table->timestamps();

            $table->foreign('activity_id')
                  ->references('id')
                  ->on('activity_logs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_ips');
    }
}
