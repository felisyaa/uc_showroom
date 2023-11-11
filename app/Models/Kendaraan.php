<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'model', 
        'jenis',
        'tahun', 
        'jumlah_penumpang', 
        'manufaktur', 
        'harga',
        'bahan_bakar', 
        'luas_bagasi', 
        'jumlah_roda', 
        'luas_kargo', 
        'ukuran_bagasi', 
        'kapasitas_bensin',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
