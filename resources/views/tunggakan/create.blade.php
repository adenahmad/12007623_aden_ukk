@extends('layouts.master')
@section('content')
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

@if(Auth::user()->role !='Petugas')
@if(Auth::user()->role !='Siswa')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Tunggakan Siswa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tunggakan.index') }}">Kembali</a>
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

<form action="{{ route('tunggakan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nis</strong>
                <select name="id_siswa" id="id_siswa" class="form-control" >
                    <option selected >pilih siswa</option>
                    @foreach($siswa as $row)
                        <option data-nama="{{ $row->nama  }}" data-kelas="{{ $row->id_kelas  }}" {{ $row->nis == old('id_siswa') ? 'selected' : '' }} value="{{$row->nis}}" >
                        {{ $row->nis}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama_siswa"  id="nama_siswa" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kelas</strong>
                <input type="text" name="nama_kelas"  id="nama_kelas"  class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bulan Tunggakan</strong>
                <input class="form-control" type="text" name="bulan_tunggakan" placeholder="Isi bulan tunggakan">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Tunggakan</strong>
                <input class="form-control" type="text" name="total_tunggakan" placeholder="Isi total tunggakan">          
           </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> 
    </div>

</form>
<script>
    const id_siswa = document.querySelector('#id_siswa')
    const nama_siswa = document.querySelector('#nama_siswa')
    const nama_kelas = document.querySelector('#nama_kelas')

    id_siswa.addEventListener('change', (e) => {
        const nama = e.target.options[e.target.selectedIndex].getAttribute('data-nama')
        nama_siswa.value = nama
        const id_kelas = e.target.options[e.target.selectedIndex].getAttribute('data-kelas')
        nama_kelas.value = id_kelas
    })
</script>
@endif
@endif
@endsection

@section('title')
Tunggakan Create
@stop