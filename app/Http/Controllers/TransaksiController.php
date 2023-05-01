<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
        $transaksipending['pending'] = Transaksi::whereStatus("Pending")->get();
        $transaksiselesai['selesai'] = Transaksi::where("status", "NOT LIKE","%Pending")->get();
        return view('transaksi')->with($transaksipending)->with($transaksiselesai);
    }

    public function batal($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update([
            'status' => 'Batal'
        ]);
        return redirect('transaksi');
    }

    public function confirm($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update([
            'status' => 'Proses'
        ]);
        return redirect('transaksi');
    }

    public function kirim($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update([
            'status' => 'Terkirim'
        ]);
        return redirect('transaksi');
    }

    public function selesai($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update([
            'status' => 'Selesai'
        ]);
        return redirect('transaksi');
    }
}
