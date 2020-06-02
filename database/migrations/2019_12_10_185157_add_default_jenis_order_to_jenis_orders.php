<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultJenisOrderToJenisOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert some stuff
        DB::table('jenis_orders')->insert(
            [
                [
                    'jenisOrder' => 'Akta Tanah'
                ],
                [
                    'jenisOrder' => 'Akta Pindah Tangan'
                ],
                [
                    'jenisOrder' => 'Akta Peralihan Hak'
                ],
                [
                    'jenisOrder' => 'Surat Wasiat'
                ],
                [
                    'jenisOrder' => 'Pendirian Perseroan Terbatas (PT)'
                ],
                [
                    'jenisOrder' => 'Kontrak Kerja'
                ],
                
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_orders', function (Blueprint $table) {
            //
        });
    }
}
