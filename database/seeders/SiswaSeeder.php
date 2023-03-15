<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sedsiswa = new Siswa();
        $sedsiswa->nisn = '108352863419';
        $sedsiswa->nis = '12007623';
        $sedsiswa->nama = 'Ibnu';
        $sedsiswa->alamat = 'kp Cisarua';
        $sedsiswa->no_telp = '086534267134';
        $sedsiswa->tahun = '2018';
        $sedsiswa->id_spp = '200.000.00';
        $sedsiswa->id_kelas = 'XII';
        $sedsiswa->save();

        $sedsiswa = new Siswa();
        $sedsiswa->nisn = '126389546178';
        $sedsiswa->nis = '12007554';
        $sedsiswa->nama = 'pajar';
        $sedsiswa->alamat = 'kp rancamaya';
        $sedsiswa->no_telp = '086534263412';
        $sedsiswa->tahun = '2018';
        $sedsiswa->id_spp = '200.000.00';
        $sedsiswa->id_kelas = 'XII';
        $sedsiswa->save();
        
        $sedsiswa = new Siswa();
        $sedsiswa->nisn = '935273529772';
        $sedsiswa->nis = '12007656';
        $sedsiswa->nama = 'nanda';
        $sedsiswa->alamat = 'kp Cisarua';
        $sedsiswa->no_telp = '08653426732';
        $sedsiswa->tahun = '2018';
        $sedsiswa->id_spp = '200.000.00';
        $sedsiswa->id_kelas = 'XII';
        $sedsiswa->save();
     
    }
}
