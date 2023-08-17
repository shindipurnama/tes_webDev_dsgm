<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = [
        'tanggal',
        'user_id',
        'customer',
        'jumlah',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}
