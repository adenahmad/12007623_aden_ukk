@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Histori Spp</h2>
            </div>
            <hr>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Histori Spp</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Petugas</th>
                            <th>Nisn</th>
                            <th>Tgl Bayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Tahun Dibayar</th>
                            <th>Id Spp</th>
                            <th>Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historis as $histori)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $histori->id_petugas }}</td>
                                <td>{{ $histori->nisn }}</td>
                                <td>{{ $histori->tgl_bayar}}</td>
                                <td>{{ $histori->bulan_dibayar }}</td>
                                <td>{{ $histori->tahun_dibayar }}</td>
                                <td>Rp.{{ $histori->id_spp }}</td>
                                <td>Rp.{{ $histori->jumlah_bayar }}</td>
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
@endsection

@section('title')
Histori
@stop