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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id(); // Kolom primary key
            $table->string('nama'); // Kolom lain di tabel kelas
            $table->timestamps();
        });
        
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Kolom primary key
            $table->string('nama');
            $table->string('nis');
            $table->foreignId('kelas_id')->constrained('kelas', 'id'); // Menambahkan kunci asing
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
