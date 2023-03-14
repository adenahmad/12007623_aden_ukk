<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SPP;
class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sedspp = new SPP();
        $sedspp->tahun = '2021';
        $sedspp->nominal = '500.000.00';
        $sedspp->save();

        $sedspp = new SPP();
        $sedspp->tahun = '2020';
        $sedspp->nominal = '400.000.00';
        $sedspp->save();

        $sedspp = new SPP();
        $sedspp->tahun = '2019';
        $sedspp->nominal = '300.000.00';
        $sedspp->save();

        $sedspp = new SPP();
        $sedspp->tahun = '2018';
        $sedspp->nominal = '200.000.00';
        $sedspp->save();

      
        
       

     
    }
}
