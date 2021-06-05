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
                    <a href="{{ url('/datamapel/tambahmapel') }}" class="btn btn-success btn-lg active" role="button" aria-pressed="true">
                        Tambah
                    </a>
                    <br> <br>
                    <table class="table mt-3" id="tablenilai">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="col-sm-auto">NO</th>
                                <th scope="col" class="col-sm-1">Kode</th>
                                <th scope="col" class="col-sm-3">Mata Pelajaran</th>
                                <th scope="col" class="col-sm-5">Guru Pengajar</th>
                                <th scope="col" class="col-sm-2">Semester</th>
                                <th scope="col" class="col-sm-2">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapels as $mp)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $mp->kodemapel }}</td>
                                <td>{{ $mp->matapelajaran }}</td>
                                <td>{{ $mp->guru->namapendidik }}</td>
                                <td>{{ $mp->semester->semester }}</td>
                                <td>
                                    <a href="" class="badge badge-success">edit</a>
                                    <form class="badge" action="/datamapel/{{$mp->kodemapel}}/delete" method="POST">
                                        @csrf
                                        {{ method_field('POST') }}
                                        <button type="submit" class="badge badge-danger">delete</button>
                                    </form>
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