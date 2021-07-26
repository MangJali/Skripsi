@extends('layout.main')

@section('title', 'Peserta Kelas')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center mt-4">PESERTA KELAS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <a href="{{ url('/pesertakelas/tambahpesertakelas') }}"
                                    class="btn btn-success btn-lg active btn-sm" role="button" aria-pressed="true">
                                    Tambah Peserta
                                </a>
                                <br><br>
                                <table class="table table-bordered mt-3 table-sm table-responsive-sm text-center"
                                    id="tablenilai" style="font-family: cursive">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-sm-auto">No</th>
                                            <th scope="col" class="col-sm-auto">Kode Master</th>
                                            <th scope="col" class="col-sm-1">Kelas</th>
                                            <th scope="col" class="col-sm-3">Nama Siswa</th>
                                            <th scope="col" class="col-sm-2">Mata Pelajaran</th>
                                            <th scope="col" class="col-sm-1">Semester</th>
                                            <th scope="col" class="col-sm-2">Guru</th>
                                            <th scope="col" class="col-sm-auto">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesertakelas as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->id_master }}</td>
                                                <td>{{ $item->masterkelas->kelas->kelas }}</td>
                                                <td>{{ $item->siswa->namalengkap }}</td>
                                                <td>{{ $item->masterkelas->mapel->namamapel }}</td>
                                                <td>{{ $item->masterkelas->semester }}</td>
                                                <td>{{ $item->masterkelas->guru->namapendidik }}</td>
                                                <td>
                                                    {{-- <a href="/pesertakelas/ubahpesertakelas/{{ $item->id }}/edit"
                                                        class="btn btn-sm btn-success">Ubah</a> --}}
                                                    <form class="badge" action="/pesertakelas/{{ $item->id }}/delete"
                                                        method="POST" onsubmit="return confirm('Yakin Menghapus Data?')">
                                                        @csrf
                                                        {{ method_field('POST') }}
                                                        <button class=" btn btn-sm btn-danger" type="submit">
                                                            Hapus</button>
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
