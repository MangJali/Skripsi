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
                        <h1 class="text-bold text-center ">DATA SISWA</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <a href="{{ url('/datasiswa/tambahdatasiswa') }}"
                                    class="btn btn-success btn-lg active btn-sm" role="button" aria-pressed="true">
                                    Tambah Siswa
                                </a>
                                <br> <br>
                                <table class="table table-bordered mt-3 table-sm table-responsive-sm text-center"
                                    id="tablenilai" style="font-family: cursive">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-sm-auto">No</th>
                                            <th scope="col" class="col-sm-2">NIS</th>
                                            <th scope="col" class="col-sm-4">Nama</th>
                                            <th scope="col" class="col-sm-2">Tanggal Lahir</th>
                                            <th scope="col" class="col-sm-1">Status</th>
                                            <th scope="col" class="col-sm-1">Angkatan</th>
                                            <th scope="col" class="col-sm-2">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $siswa)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $siswa->nis }}</td>
                                                <td>{{ $siswa->namalengkap }}</td>
                                                <td>{{ $siswa->tanggallahir }}</td>
                                                <td>{{ $siswa->status }}</td>
                                                <td>{{ $siswa->angkatan }}</td>
                                                <td>
                                                    <a href="/datasiswa/ubahdatasiswa/{{ $siswa->nis }}/edit"
                                                        class="btn btn-sm btn-success">Ubah</a>
                                                    <form class="badge" action="/datasiswa/{{ $siswa->nis }}/delete"
                                                        method="POST" onsubmit="return confirm('Yakin Menghapus Data?')">
                                                        @csrf
                                                        {{ method_field('POST') }}
                                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
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
