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
        Schema::create('saves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('type');
            $table->string('category');
            $table->string('note');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('price');
            $table->string('title');
            $table->string('mileage');
            $table->string('city');
            $table->string('state');
            $table->string('timestamp');
            $table->string('image');
            $table->string('url');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('source');
            $table->string('int');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saves');
    }
};
