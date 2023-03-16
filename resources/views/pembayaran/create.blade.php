@extends('layouts.master')
@section('content')
@if(Auth::user()->role !='Admin')
@if(Auth::user()->role !='Petugas')
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
                <h2>Tambah Pembayaran</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pembayaran.index') }}">Kembali</a>
            </div>
        </div>
    </div>

    <br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                <div class="form-group">
                    <strong>Id Petugas</strong>
                    <input type="text" name="id_petugas"  class="form-control" value="{{ Auth::user()->name }}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis</strong>
                    {{-- <input type="text" name="nis" id="id_nis" class="form-control" > --}}
                    <select name="nis" id="id_nis" class="form-control search">
                        <option selected></option>
                        @foreach($siswa as $row)
                            <option data-spp="{{ $row->id_spp }}" data-total="{{ $row->id_spp }}"  data-nama="{{ $row->nama }}"  {{ $row->nis == old('nis') ? 'selected' : '' }} value="{{$row->nis}}">
                            {{ $row->nis}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Siswa</strong>
                    <input class="form-control" type="text" name="nama" id="siswa" readonly>          
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Bayar</strong>
                    <input class="form-control" type="date" name="tgl_bayar" >          
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id Spp</strong>
                    <input type="text" name="id_spp" id="spps" class="form-control" readonly>
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Bayar</strong>
                    <input class="form-control" type="text" name="tunggakan_bulan" placeholder="Isi tunggakan" >          
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Bayar</strong>
                    <input class="form-control" type="text" name="jumlah_dibayar" id="cekbayar" placeholder="Isi jumlah Bayar">          
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endif
<script>
    const id_nis = document.querySelector('#id_nis')
    const spps = document.querySelector('#spps')
    const cekbayar = document.querySelector('#cekbayar')
    const siswa = document.querySelector('#siswa')

    id_nis.addEventListener('change', (e) => {
        const id_spp = e.target.options[e.target.selectedIndex].getAttribute('data-spp')
        spps.value = id_spp
    })
    id_nis.addEventListener('change', (e) => {
        const id_spp = e.target.options[e.target.selectedIndex].getAttribute('data-total')
        cekbayar.value = id_spp
    })
    id_nis.addEventListener('change', (e) => {
        const nama = e.target.options[e.target.selectedIndex].getAttribute('data-nama')
        siswa.value = nama
    })
</script>
@endsection
@section('title')
Create Bayar
@stop