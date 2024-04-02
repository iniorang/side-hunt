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
        Schema::create('sidejobs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('desk')->unique();
            // $table->foreign('owner')->references('id')->on('users');
            $table->date('tanggalbuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidejobs');
    }
};
