<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sedkelas = new Kelas();
        $sedkelas->nama_kelas = 'X';
        $sedkelas->kompetensi_keahlian = 'Rekayasa Perangkat Lunak';
        $sedkelas->save();

        $sedkelas = new Kelas();
        $sedkelas->nama_kelas = 'XI';
        $sedkelas->kompetensi_keahlian = 'Teknik Komputer Dan Jaringan';
        $sedkelas->save();

        $sedkelas = new Kelas();
        $sedkelas->nama_kelas = 'XII';
        $sedkelas->kompetensi_keahlian = 'Multimedia';
        $sedkelas->save();
    }
}
