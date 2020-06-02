<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteToProgressKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress_karyawans', function (Blueprint $table) {
            $table->dropForeign('progress_karyawans_idKaryawan_foreign');
            $table->foreign('idKaryawan')->references('idKaryawan')->on('karyawans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progress_karyawan', function (Blueprint $table) {
            //
        });
    }
}
