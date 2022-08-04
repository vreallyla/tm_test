<?php

use App\Models\JobDesc;
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
        Schema::create('m_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JobDesc::class, 'job_desc_id')
                ->comment("relations to job_descs")
                ->onUpdate('cascade')
                ->restrictOnDelete();
            $table->unsignedBigInteger('m_poli_id')->comment("relations to m_poli");
            $table->foreign('m_poli_id')->references('id')->on('m_poli')
                ->onUpdate('cascade')
                ->restrictOnDelete();
            $table->string('photo', 100)->nullable();
            $table->string('no_pegawai', 15)->unique();
            $table->string('sip', 20);
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 500)->nullable();

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
        Schema::dropIfExists('m_pegawai');
    }
};
