<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Karyawan;
use App\Accounting;
use App\JenisOrder;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        $orders = DB::table('orders')
                ->join('accountings','orders.idOrder','=','accountings.idOrder')
                ->select('orders.*','accountings.priceOrder')
                ->get();
       
        return response()->json($orders);
    }

    public function create(Request $request)
    {
        $order = new Order;
        $accounting = new Accounting;
        $karyawan = new Karyawan;

        $order->namaOrder = $request->namaOrder;
        $order->deadlineOrder = $request->deadlineOrder;
        $order->karyawanPekerjaOrder = NULL;
        $order->progressOrder = 0;
        $order->jenisOrder = $request->jenisOrder;
        $order->save();

        $accounting->priceOrder = $request->priceOrder;
        $accounting->biayaSisa = $request->priceOrder;
        $accounting->biayaMasuk = 0;
        $accounting->idOrder = $order->idOrder;
        $accounting->save();

        return response()->json('OK', 200);
    }

    public function show($idOrder)
    {
        $orders = Order::find($idOrder);
        $progress_karyawans = DB::table('progress_karyawans')
                                ->where('idOrder',$idOrder)
                                ->join('karyawans','progress_karyawans.idKaryawan','=','karyawans.idKaryawan')
                                ->select('progress_karyawans.*','karyawans.namaKaryawan')
                                ->get();
        $notas = DB::table('notas')->where('idOrder',$idOrder)->get();
        $accountings = DB::table('accountings')->where('idOrder',$idOrder)->first();
        
        $response = [
            'orders' => $orders,
            'progress_karyawans' => $progress_karyawans,
            'notas' => $notas,
            'accountings' => $accountings
        ];
        
        return response()->json($response);
    }
}
