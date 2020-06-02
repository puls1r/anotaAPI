<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAbstractOrderToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('orders')->insert(
            [
                'idOrder' => '5869',
                'namaOrder' => 'Belum Ditugaskan',
                'jenisOrder' => 'Akta Tanah',
                'deadlineOrder' => '2020-01-01',
                'progressOrder' => '0'
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
