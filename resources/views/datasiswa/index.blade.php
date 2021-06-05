@extends('layout.main')

@section('title', 'Data Siswa')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col md-4">
                    <h1 class="text-bold text-center">MATA PELAJARAN</h1>
                    <a href="{{ url('/datasiswa/tambahdatasiswa') }}" class="btn btn-success btn-lg active btn-sm" role="button" aria-pressed="true">
                        Tambah Siswa
                    </a>
                    <br> <br>
                    <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="col-sm-auto">NO</th>
                                <th scope="col" class="col-sm-3">NIS</th>
                                <th scope="col" class="col-sm-6">Nama</th>
                                <th scope="col" class="col-sm-2">Kelas</th>
                                <th scope="col" class="col-sm-1">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $swa)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $swa->nis }}</td>
                                <td>{{ $swa->namalengkap }}</td>
                                <td>{{ $swa->kelas->kelas }}</td>
                                <td>
                                    <a href="" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-danger">delet</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#tablenilai').DataTable();
    });
</script>
@endsection