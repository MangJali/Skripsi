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
                                <table class="table table-bordered mt-3 table-sm table-responsive-sm text-center"
                                    id="tablenilai" style="font-family: cursive">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="row" class="text-uppercase">No</th>
                                            <th scope="col" class="text-uppercase">Nama Siswa</th>
                                            <th scope="col" class="text-uppercase">Kelas</th>
                                            <th scope="col" class="text-uppercase">Mata Pelajaran</th>
                                            <th scope="col" class="text-uppercase">Hadir</th>
                                            <th scope="col" class="text-uppercase">Ijin</th>
                                            <th scope="col" class="text-uppercase">Alpha</th>
                                            {{-- <th scope="col">AKSI</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absen as $item)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->pesertakelas->siswa->namalengkap }}</td>
                                                <td>{{ $item->pesertakelas->masterkelas->kelas->kelas }}</td>
                                                <td>{{ $item->pesertakelas->masterkelas->mapel->namamapel }}</td>
                                                <td>{{ $item->alpha }}</td>
                                                <td>{{ $item->ijin }}</td>
                                                <td>{{ $item->hadir }}</td>
                                                {{-- <td>
                                                    <a href="/dataabsensi/ubahabsensi/{{ $item->id_absensi }}/edit"
                                                        class="badge badge-success">ubah</a>
                                                    <a href="" class="badge badge-danger">hapus</a>
                                                </td> --}}
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
