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
        Schema::create('arsip_dokumen', function (Blueprint $table) {
            $table->id();

            $table->foreignId('akta_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('nama_dokumen');
            $table->string('jenis_dokumen');
            $table->string('file');
            $table->text('keterangan')->nullable();

            $table->timestamps();        
        });
    }

    /**Schema
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_dokumens');
    }
};
