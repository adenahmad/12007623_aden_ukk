<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SPP;
use Barryvdh\DomPDF\Facade\Pdf;


class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spps = spp::orderBy('created_at', 'desc')->get();

        return view('spp.index', compact('spps'))
            ->with('i', (request()->input('spp', 1) - 1) * 5);
    }
    // $count = DB::table('tbl_karyawan')->count();

    // //eloquent
    // $count = ModelKaryawan::all()->count();

    // atau 

    // $count = ModelKaryawan::count();
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'tahun' => 'required',
          'nominal' => 'required',
      ]);

      spp::create($request->all());

      return redirect()->route('spp.index')
          ->with('success', 'Berhasil Menyimpan !');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = spp::find($id);
        return view('spp.edit',compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        // $kelas->nama_kelas = $request->nama_kelas;
        // $kelas->kompetensi_keahlian =   $request->kompetensi_keahlian;
        // $kelas->save();

        spp::find($id)->update($request->all());
        return redirect()->route('spp.index')
            ->with('success', 'Berhasil Di Edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($spp)
    {
        $sppid = SPP::find($spp);
        $sppid->delete();

        return redirect()->route('spp.index')
            ->with('success', 'Berhasil Hapus !');
    }

    public function createPDF() {
        // // retreive all records from db
        // $data = SPP::all();
        // // share data to view//
        // view()->share('spp',$data);
        // $pdf = PDF::loadView('spp', $data);
        // // download PDF file with download method
        // return $pdf->download('spp.pdf');
      }

}
