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
            <h2>Edit Tunggakan</h2>
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

<form action="{{route('tunggakan.update', $tunggakan->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nis</strong>
                <select name="nis" id="" class="form-control">
                    <select class="form-control"  name="nis" required>
                        <option selected >{{$siswa->nis}}</option>
                        @foreach($siswa as $row)
                           <option {{ $row->id == old('nis', $tunggakan->nis) ? 'selected' : '' }} value="{{ $row->id }}">{{$row->nis}}</option>
                        @endforeach
                    
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                    <select class="form-control"  name="nama_siswa" required>
                        <option selected >{{$siswa->nama_siswa}}</option>
                        @foreach($siswa as $row)
                           <option {{ $row->id == old('nama_siswa', $tunggakan->nama_siswa) ? 'selected' : '' }} value="{{ $row->id }}">{{$row->nama}}</option>
                        @endforeach
                    
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kelas</strong>
                <select name="nama_kelas" id="" class="form-control">
                    <option selected >Pilih Kelas</option>
                    <option value="X" @if ($kelas->nama_kelas == 'X') selected @endif> X</option>
                    <option value="XI" @if ($kelas->nama_kelas == 'XI') selected @endif> XI</option>
                    <option value="XII" @if ($kelas->nama_kelas == 'XII') selected @endif> XII</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bulan Tunggakan</strong>
                <input class="form-control" type="text" name="bulan_tunggakan" value="{{$tunggakan->bulan_tunggakan}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Tunggakan</strong>
                <input class="form-control" type="text" name="total_tunggakan" value="Rp.{{$tunggakan->total_tunggakan}}">          
           </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div> 
{{--         
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nis</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control selectric"  name="id_siswa" required>
               @foreach($siswa as $data)
                  <option {{ $data->id == old('id_siswa', $tunggakan->id_siswa) ? 'selected' : '' }} value="{{ $data->id }}">{{$data->nis}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control selectric"  name="nama_siswa" required>
               @foreach($siswa as $data)
                  <option {{ $data->id == old('nama_siswa', $tunggakan->nama_siswa) ? 'selected' : '' }} value="{{ $data->id }}">{{$data->nama}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control selectric"  name="nama_kelas" required>
               @foreach($siswa as $data)
                  <option {{ $data->id == old('siswa_id', $tunggakan->siswa_id) ? 'selected' : '' }} value="{{ $data->id }}">{{$data->kelas->nama_kelas}}</option>
                  @endforeach
              </select>
            </div>
          </div>

           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan Tunggakan</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="bulan_tunggakan" class="form-control" value="{{$tunggakan->bulan_tunggakan}}">
            </div>
          </div>
           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Tunggakan</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" name="total_tunggakan" class="form-control" value="Rp.{{$tunggakan->total_tunggakan}}">
            </div>
          </div> --}}
    </div>
</form>
@endif
@endif
@endsection

@section('title')
edit tunggakan
@stop