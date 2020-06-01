<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisOrder;
use Illuminate\Support\Facades\DB;


class JenisOrderController extends Controller
{
    public function index(JenisOrder $jenisOrder){
        $jenisOrders = $jenisOrder->all();
        
        return response()->json($jenisOrders);
    }
}
