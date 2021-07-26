@extends('layout.main')

@section('title', 'data Kelas')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">DATA KELAS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <a href="{{ url('/datakelas/tambahkelas') }}" class="btn btn-success btn-lg active btn-sm"
                                    role="button" aria-pressed="true">
                                    Tambah Kelas
                                </a>
                                <br> <br>
                                <table class="table table-bordered mt-3 table-sm table-responsive-sm text-center"
                                    id="tablenilai" style="font-family: cursive">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-sm-auto text-uppercase">No</th>
                                            <th scope="col" class="col-sm-auto text-uppercase">kode Kelas</th>
                                            <th scope="col" class="col-sm-auto text-uppercase">Kelas</th>
                                            <th scope="col" class="col-sm-2 text-uppercase">Mata Pelajaran</th>
                                            <th scope="col" class="col-sm-3 text-uppercase">Guru Pengajar</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">Semester</th>
                                            <th scope="col" class="col-sm-auto">Rombel</th>
                                            <th scope="col" class="col-sm-auto">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($masterkelas as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->id_master }}</td>
                                                <td>{{ $item->kelas->kelas }}</td>
                                                <td>{{ $item->mapel->namamapel }}</td>
                                                <td>{{ $item->guru->namapendidik }}</td>
                                                <td>{{ $item->semester }}</td>
                                                <td>{{ $item->Rombel->rombel }}</td>
                                                <td>
                                                    {{-- <a href="/datakelas/ubahkelas/{{ $item->id_master }}/edit"
                                                        class="badge badge-success">Ubah</a> --}}
                                                    <form class="button" action="/datakelas/{{ $item->id_master }}/delete"
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
