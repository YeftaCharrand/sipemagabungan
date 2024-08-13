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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained(
                table: 'kelas', indexName: 'requests_kelas_id'
            );
            $table->foreignId('mahasiswa_id')->constrained(
                table: 'mahasiswas', indexName: 'requests_mahasiswa_id'
            );
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
