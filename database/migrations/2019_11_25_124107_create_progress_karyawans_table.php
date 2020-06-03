<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idKaryawan')->unsigned();
            $table->bigInteger('idOrder')->unsigned();
            $table->date('deadlineKaryawan');
            $table->string('statusKerjaan');
            $table->string('uangPegangan');
            $table->integer('progressKerjaan');
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
        Schema::dropIfExists('progress_karyawans');
    }
}
