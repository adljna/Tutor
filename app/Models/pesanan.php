<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';          // nama tabel
    protected $primaryKey = 'idpesanan';   // primary key

    public $timestamps = false;            // karena tabel kamu tidak punya created_at / updated_at

    protected $fillable = [
        'idsesi',
        'userid',
        'tanggal',
        'jam',
        'istrial',
        'biaya',
        'statuspembayaran',
        'status'
    ];
}
