<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Karyawan;
use App\Accounting;
use App\JenisOrder;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangan = DB::table('orders')
                ->join('accountings','orders.idOrder','=','accountings.idOrder')
                ->select('orders.*','accountings.*')
                ->get();
        
        return response()->json($keuangan);
    }

    public function updatepembayaran(Request $request, $idAccounting)
    {
        $accounting = Accounting::find($idAccounting);

        $accounting->biayaMasuk = $request->biayaMasuk;
        $accounting->save();

        return response()->json('OK', 200);
    }
}
