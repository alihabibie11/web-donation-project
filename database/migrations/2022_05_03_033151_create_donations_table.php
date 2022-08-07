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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id');
            $table->integer('donatur_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('hamba_allah')->nullable();
            $table->text('doa')->nullable();
            $table->string('bank')->nullable();
            $table->enum('status', ['PENDING', 'GAGAL', 'SUCCESS'])->default('PENDING');
            $table->string('kode_donasi');
            $table->text('approval_picture')->nullable();
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
        Schema::dropIfExists('donations');
    }
};
