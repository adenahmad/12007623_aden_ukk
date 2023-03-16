<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = [
        'id_petugas',
        'nis',
        'nama',
        'tgl_bayar',
        'id_spp',
        'tunggakan_bulan',
        'jumlah_dibayar'];
}
