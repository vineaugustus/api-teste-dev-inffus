<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('species')->nullable();
            $table->string('type')->nullable();
            $table->string('gender')->nullable();
            $table->string('origin')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
