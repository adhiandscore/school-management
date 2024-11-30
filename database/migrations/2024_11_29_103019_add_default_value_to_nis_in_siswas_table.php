<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('siswas', function (Blueprint $table) {
        $table->string('nis')->nullable('000000')->change(); // Set default value
    });
}

public function down()
{
    Schema::table('siswas', function (Blueprint $table) {
        $table->string('nis')->default(null)->change(); // Kembalikan ke semula
    });
}
};
