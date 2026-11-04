<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    /** @use HasFactory<\Database\Factories\HargaFactory> */
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tanggal_awal',
        'tanggal_akhir',
        'jenis',
        'harga_1',
        'harga_2',
        'harga_3',
        'harga_4',
    ];
}
