@extends('layout.main')

@section('title', 'Data Mapel')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">MATA PELAJARAN</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <a href="{{ url('/datamapel/tambahmapel') }}" class="btn btn-success btn-sm active"
                                    role="button" aria-pressed="true">
                                    Tambah Mapel
                                </a>
                                <br> <br>
                                <table class="table mt-3" id="tablenilai">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-sm-auto">NO</th>
                                            <th scope="col" class="col-sm-2">Kode</th>
                                            <th scope="col" class="col-sm-6">Mata Pelajaran</th>
                                            <th scope="col" class="col-sm-2">Kurikulum</th>
                                            <th scope="col" class="col-sm-2">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mapels as $mp)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $mp->id_mapel }}</td>
                                                <td>{{ $mp->namamapel }}</td>
                                                <td>{{ $mp->tahunkurikulum }}</td>
                                                <td>
                                                    <a href="" class="badge badge-success">Ubah</a>
                                                    <form class="badge" action="/datamapel/{{ $mp->kodemapel }}/delete"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('POST') }}
                                                        <button class="badge badge-danger" type="submit">Hapus</button>
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
