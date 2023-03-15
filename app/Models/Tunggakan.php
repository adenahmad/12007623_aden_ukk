<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunggakan extends Model
{
    use HasFactory;
    protected $table = 'tunggakans';
    protected $fillable = [
        'id_siswa',
        'nama_siswa',
        'nama_kelas',
        'bulan_tunggakan',
        'total_tunggakan',
        'sisa_tunggakan',
        'sisa_bulan'];
}
