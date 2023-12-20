<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id'); // Use increments for an auto-incremented primary key
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('ip_address');
            $table->string('mac_address')->nullable();
            $table->timestamp('login_time');
            // Add any other columns you may need

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Set the auto-increment starting value to 1000
        \DB::statement('ALTER TABLE logs AUTO_INCREMENT = 1000');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
