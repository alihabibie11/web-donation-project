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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('jenis');
            $table->text('ringkasan');
            $table->text('detail');
            $table->integer('target');
            $table->integer('dana_terkumpul')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('status', ['BERJALAN', 'TUNDA', 'SELESAI'])->default('BERJALAN');
            $table->text('sosmed')->nullable();
            $table->text('photo_program')->nullable();
            $table->text('location')->nullable();
            $table->text('url_location')->nullable();
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
        Schema::dropIfExists('programs');
    }
};
