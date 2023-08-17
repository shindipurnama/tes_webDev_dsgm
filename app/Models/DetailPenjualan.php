<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'qty',
        'harga',
    ];
    
    public function barang(){
        return $this->hasOne(Barang::class, 'id','barang_id');
    }
}
