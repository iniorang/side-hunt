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
        Schema::create('side_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->date('tanggal_buat');
            $table->string('alamat');
            $table->integer('gaji');
            $table->bigInteger('pembuat')->unsigned();
            $table->timestamps();

            $table->foreign('pembuat')->references('id')->on('users')->cascadeOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('side_jobs');
    }
};
