<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToProgressKaryawans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress_karyawans', function (Blueprint $table) {
            $table->string('statusKerjaan')->nullable()->change();
            $table->date('deadlineKaryawan')->nullable()->change();
            $table->bigInteger('idOrder')->unsigned()->nullable()->change();
            $table->date('deadlineKaryawan')->nullable()->change();
            $table->string('statusKerjaan')->nullable()->change();
            $table->string('uangPegangan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progress_karyawans', function (Blueprint $table) {
            //
        });
    }
}
