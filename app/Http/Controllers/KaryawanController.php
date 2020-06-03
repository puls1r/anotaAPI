<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Karyawan;
use App\ProgressKaryawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = DB::table('karyawans')
                    ->join('progress_karyawans','karyawans.idKaryawan','=','progress_karyawans.idKaryawan')
                    ->join('orders','progress_karyawans.idOrder','=','orders.idOrder')
                    ->select('karyawans.namaKaryawan','progress_karyawans.*','orders.namaOrder')
                    ->get();

        return response()->json($karyawans);
    }

    public function create(Request $request)
    {
        $karyawan = new Karyawan;

        $karyawan->namaKaryawan = $request->namaKaryawan;
        $karyawan->emailKaryawan = $request->emailKaryawan;
        $karyawan->save();

        $progressKaryawan = new ProgressKaryawan; //dibuat banyak null untuk abstract supaya bisa join

        $progressKaryawan->idKaryawan = $karyawan->idKaryawan;
        $progressKaryawan->idOrder = 5869; //id untuk yang belum ditugaskan
        $progressKaryawan->deadlineKaryawan = NULL;
        $progressKaryawan->uangPegangan = NULL;
        $progressKaryawan->progressKerjaan = 0;
        $progressKaryawan->statusKerjaan = NULL;

        $progressKaryawan->save();

        return response()->json('OK', 200);
    }

    public function show($idKaryawan)
    {
        $karyawans = Karyawan::find($idKaryawan);

        return response()->json($karyawans);
    }

    public function assign(Request $request, $idKaryawan){
        
        $progressKaryawan = ProgressKaryawan::find($idKaryawan);
        
        $progressKaryawan->idKaryawan = $idKaryawan;
        $progressKaryawan->idOrder = $request->idOrder;
        $progressKaryawan->deadlineKaryawan = $request->deadlineKaryawan;
        $progressKaryawan->uangPegangan = $request->uangPegangan;
        $progressKaryawan->progressKerjaan = 0;
        $progressKaryawan->statusKerjaan = NULL;
        $progressKaryawan->save();

        $order = Order::find($progressKaryawan->idOrder);

        $order->karyawanPekerjaOrder = $idKaryawan;
        $order->namaPekerjaOrder = $request->namaKaryawan;
        $order->save();

        return response()->json("OK", 200);
    }

    public function delete($idKaryawan){
        $karyawan = Karyawan::where('idKaryawan', '=', $idKaryawan);
        $karyawan->delete();
        $progressKaryawan = ProgressKaryawan::where('idKaryawan', '=', $idKaryawan);
        if($progressKaryawan === NULL){
            return response()->json('Deleted');
        }
        else{
        $progressKaryawan->delete();
        return response()->json('Deleted');
        }
    }
}
