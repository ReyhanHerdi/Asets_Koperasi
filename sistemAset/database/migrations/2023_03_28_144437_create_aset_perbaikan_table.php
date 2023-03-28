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
        Schema::create('aset_perbaikan', function (Blueprint $table) {
            $table->increments('id_Aset')->unique();
            $table->string('nama_Aset');
            $table->string('status_Perbaikan', 10);
            $table->date('tanggal_Perbaikan');
            $table->foreign('pj_Perbaikan')->references('id_PJ')->on('pj_perbaikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_perbaikan');
    }
};
