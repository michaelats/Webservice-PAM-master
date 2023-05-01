<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\User;
use App\Produk;
use App\TransaksiDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::count();
        $users = User::count();
        $produk = Produk::count();
        $transaksidetail = TransaksiDetail::count();
        return view('home', compact('transaksi', 'users', 'produk','transaksidetail'));
    }
}
