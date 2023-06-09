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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Data Kelas</h2>
                    </div>
                    <hr>
                    <div class="pull-right" style="float: right;">
                        <a class="btn btn-success" href="{{ route('kelas.create') }}">Tambah Kelas  <i class="fa-sharp fa-solid fa-add"></i></a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th width="112px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelass as $kelas)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $kelas->nama_kelas }}</td>
                                        <td>{{ $kelas->kompetensi_keahlian }}</td>
                                        <td>
                                            <form action="{{ route('kelas.destroy',$kelas->id) }}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('kelas.edit',$kelas->id) }}">
                                                    <i class="fa-solid fa-pen"> </i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
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
        @endif
        @endsection

        @section('title')
        Kelas
        @stop