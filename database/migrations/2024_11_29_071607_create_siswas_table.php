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
            $table->string('nama_kelas')->nullable(false); // Kolom lain di tabel kelas
            $table->timestamps();
        });
        
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Kolom primary key
            $table->string('nama')->nullable(false);
            $table->string('nis')->nullable(false);
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
        Schema::dropIfExists('kelas');
    }
};
