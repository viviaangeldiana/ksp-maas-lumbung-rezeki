<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_pinjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('jenis_pinjaman');
            $table->decimal('jumlah_pinjaman', 15, 2);
            $table->integer('tenor_bulan');
            $table->string('tujuan_pinjaman');
            $table->string('pekerjaan');
            $table->decimal('penghasilan_bulanan', 15, 2);
            $table->string('agunan')->nullable();
            $table->string('status')->default('menunggu');
            $table->text('catatan_petugas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pinjaman');
    }
};