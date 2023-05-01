<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransaksiDetail;
use App\User;

class Transaksi extends Model
{
    protected $fillable = ['user_id', 'kode_payment',
    'kode_trx', 'total_item', 'total_harga', 'kode_unik', 
    'status', 'resi', 'kurir', 'name', 'phone', 'detail_lokasi', 'metode', 
    'deskripsi', 'expired_at','ongkir', 'total_transfer', 'bank','jasa_pengiriman'];

    public function details(){
        return $this->hasMany(TransaksiDetail::class, "transaksi_id", "id");
    }//punya banyak transaksi detail

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
