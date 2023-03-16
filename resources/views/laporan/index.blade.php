@extends('layouts.master')
@section('content')
@if(Auth::user()->role !='Petugas')
@if(Auth::user()->role !='Admin')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center" style="margin-top:200px;">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="{{asset('dashboard')}}">&larr; Back to Dashboard</a>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endif
@endif
@if(Auth::user()->role !='Siswa')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Laporan</h2>
            </div>
            <hr>
            <div class="pull-right" style="float: left;">
                <a class="btn btn-primary" href="/exportpdf">Export  <i class="fa-sharp fa-solid fa-file-export"></i></a>
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
            <h6 class="m-0 font-weight-bold text-primary" style="float:right;">Bayaran bulan [ Januari - Juni] & [ July - Desember ]  <span id="waktu"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Petugas</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Tgl Bayar</th>
                            <th>Bulan Bayar</th>
                            <th>Id Spp</th>
                            <th>Jumlah Bayar</th>
                            <th width="112px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporans as $laporan)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $laporan->id_petugas }}</td>
                                <td>{{ $laporan->nis }}</td>
                                <td>{{ $laporan->nama }}</td>
                                <td>{{ $laporan->tgl_bayar}}</td>
                                <td>Bulan {{ $laporan->tunggakan_bulan }}</td>
                                <td>Rp.{{ $laporan->id_spp }}</td>
                                <td>Rp.{{ $laporan->jumlah_dibayar }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('struk',$laporan->id) }}">
                                        <i class="fa-solid fa-file-invoice"> </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- {!! $pages->links() !!} --}}

@endif
@endsection

@section('title')
Laporan
@stop