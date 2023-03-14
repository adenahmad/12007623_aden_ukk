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
        'bulan_nunggak',
        'total_tunggakan',
       'sisa_tunggakan',
       'sisa_bulan'];
}
