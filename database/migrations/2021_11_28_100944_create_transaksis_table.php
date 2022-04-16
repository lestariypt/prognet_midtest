<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_ajaran');
            $table->integer('semester');
            $table->foreignId('mahasiswa_id')->constrained();
            $table->foreignId('mata_kuliah_id')->constrained();
            $table->enum('nilai',['Tunda','A','B','C','D','E']);
            $table->double('nilai_angka',[-1]);
            $table->enum('status',['Disetujui','Belum Disetujui','Dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
