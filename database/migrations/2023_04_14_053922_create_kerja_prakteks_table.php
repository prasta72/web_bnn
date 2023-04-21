<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjaPrakteksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerja_prakteks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('pembina_id');
            $table->string('NIM');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('instansi');
            $table->string('jurusan');
            $table->string('mulai_kerja_praktek');
            $table->string('selesai_kerja_praktek');
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
        Schema::dropIfExists('kerja_prakteks');
    }
}
