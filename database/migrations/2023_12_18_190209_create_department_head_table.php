<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_head', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('rights');
            $table->json('module'); // Assuming 'module' is an array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_head');
    }
};
