<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPP Laporan Pdf</title>
    <link href="{{asset('assets2/img/logo.png')}}" rel="icon">
    <!-- Custom fonts for this template-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('assets2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{-- <script src="https://cdn.tiny.cloud/1/i62phsrg4132j4da2r91942mcx3wfzykskhlfuoqa7khhqn5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/vendor/datatables/dataTables.bootstrap4.min.css"') }}" rel="stylesheet">

</head>
<center>
    <img src="{{asset('assets2/img/logo.png')}}" alt="" width="100px" style="margin-top:80px;"><br><br>
    <H3>lAPORAN SPP WIKRAMA</H3>
        
</center><br>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th>Id Petugas</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Tgl Bayar</th>
                    <th>Bulan Bayar</th>
                    <th>Id Spp</th>
                    <th>Jumlah Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $laporan)
                    <tr>
                        {{-- <td>{{ ++$i }}</td> --}}
                        <td>{{ $laporan->id_petugas }}</td>
                        <td>{{ $laporan->nis }}</td>
                        <td>{{ $laporan->nama }}</td>
                        <td>{{ $laporan->tgl_bayar}}</td>
                        <td>Bulan {{ $laporan->tunggakan_bulan }}</td>
                        <td>Rp.{{ $laporan->id_spp }}</td>
                        <td>Rp.{{ $laporan->jumlah_dibayar }}</td>
                    </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>




<script type="text/javascript">
    window.print();
    </script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets2/js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('assets2/vendor/chart.js/Chart.min.js') }}"></script>
<!-- Datatables -->

<!-- Page level custom scripts -->
<script src="{{ asset('assets2/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets2/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('assets2/js/demo/datatables-demo.js') }}"></script>

{{-- ck editor --}}
<script type="text/javascript" src="{{ asset('assets2/ckeditor/ckeditor.js') }}"></script>


{{-- inputan --}}
<script src="{{ asset('assets2/js/input.js') }}"></script>

<!-- Custom styles for this page -->
<script src="{{ asset('assets2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<link href="{{ asset('assets2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

</body>

</html>
