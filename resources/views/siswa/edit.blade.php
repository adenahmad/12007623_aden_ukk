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
            <h2>Edit Siswa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('siswa.index') }}">Kembali</a>
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

<form action="{{route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nisn</strong>
                <input class="form-control" type="text" name="nisn" placeholder="Isi Nisn" value="{{$siswa->nisn}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nis</strong>
                <input class="form-control" type="number" name="nis" placeholder="Isi Nis" value="{{$siswa->nis}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input class="form-control" type="text" name="nama" placeholder="Isi Nama" value="{{$siswa->nama}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{$siswa->alamat}}</textarea>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp</strong>
                <input class="form-control" type="number" name="no_telp" placeholder="Isi No Telp" value="{{$siswa->no_telp}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Angkatan</strong>
                {{-- <input class="form-control" type="number" name="id_spp" placeholder="Isi id spp">           --}}
                <select name="tahun" id="tahun" class="form-control" >
                    <option selected >{{$siswa->tahun}}</option>
                    @foreach($tahun as $row)
                        <option data-tahun="{{ $row->nominal  }}" {{ $row->tahun == old('tahun') ? 'selected' : '' }} value="{{$row->tahun}}" >
                        {{ $row->tahun}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Spp</strong>
                <input type="text" name="id_spp" id="id_spp" class="form-control"value="{{$siswa->id_spp}}" >
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kelas </strong>
                <select name="id_kelas" id="" class="form-control">
                    <option selected >{{$siswa->id_kelas}}</option>
                    @foreach($kelas as $row)
                        <option {{ $row->id_kelas == old('id_kelas',$siswa->id_kelas) ? 'selected' : '' }} value="{{$row->nama_kelas}}">
                        {{ $row->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endif
@endif
<script>
    const tahun = document.querySelector('#tahun')
    const id_spp = document.querySelector('#id_spp')

    tahun.addEventListener('change', (e) => {
        const nominal = e.target.options[e.target.selectedIndex].getAttribute('data-tahun')
        id_spp.value = nominal
    })
</script>
@endsection

@section('title')
edit kelas
@stop