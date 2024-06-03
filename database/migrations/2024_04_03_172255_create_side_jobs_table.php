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
            $table->string('koordinat');
            $table->integer('min_gaji');
            $table->integer('max_gaji');
            $table->integer('max_pekerja');
            $table->integer('jumlah_pelamar_diterima')->default('0');
            $table->bigInteger('pembuat')->unsigned();
            $table->timestamps();
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
