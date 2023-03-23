<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class create_mqtt_data_1_table extends Migration
{
    public function up()
    {
        Schema::create('mqtt_data_1', function (Blueprint $table) {
            $table->id();
            $table->string('motor1');
            $table->string('haptic1');
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mqtt_data_1');
    }
}
