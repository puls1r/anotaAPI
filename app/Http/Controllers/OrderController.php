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
}
