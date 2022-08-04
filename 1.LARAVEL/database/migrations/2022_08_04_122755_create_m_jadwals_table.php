<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_pegawai_id')->comment("relations to m_pegawai");
            $table->foreign('m_pegawai_id')->references('id')->on('m_pegawai')
                ->onUpdate('cascade')
                ->restrictOnDelete();
            $table->unsignedBigInteger('hari_id')->comment("relations to hari");
            $table->foreign('hari_id')->references('id')->on('hari')
                ->onUpdate('cascade')
                ->restrictOnDelete();
            $table->time('jam_masuk');
            $table->time('jam_pulang');
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
        Schema::dropIfExists('m_jadwal');
    }
};
