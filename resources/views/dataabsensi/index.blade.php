@extends('layout.main')

@section('title', 'Absensi Siswa')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">ABSENSI SISWA</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ url('/dataabsensi/add') }}" class="btn btn-success btn-sm active"
                                        role="button" aria-pressed="true">
                                        Tambah Absensi
                                    </a>
                                    <br> <br>
                                @endif
                                <table class="table mt-3" id="tablenilai">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="row">No</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Mata Pelajaran</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Hadir</th>
                                            <th scope="col">Ijin</th>
                                            <th scope="col">Alpha</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absensi as $item)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->siswa->namalengkap }}</td>
                                                <td>{{ $item->mapel->matapelajaran }}</td>
                                                <td>{{ $item->siswa->kelas->kelas }}</td>
                                                <td>{{ $item->alpha }}</td>
                                                <td>{{ $item->ijin }}</td>
                                                <td>{{ $item->hadir }}</td>
                                                <td>
                                                    <a href="/dataabsensi/ubahabsensi/{{ $item->id_absensi }}/edit"
                                                        class="badge badge-success">edit</a>
                                                    <a href="" class="badge badge-danger">delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
