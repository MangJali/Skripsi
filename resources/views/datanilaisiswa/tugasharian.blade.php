@extends('layout.main')

@section('title', 'Nilai Tugas')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col md-4">
                    <h1 class="text-bold text-center">Masukkan Nilai Tugas</h1>
                    <div class="card card-success card-outline mt-4">
                        <div class="card-body">
                            @if(auth()->user()->role=="admin")
                            <a href="{{ url('/datanilaisiswa/tugasharian/add') }}" class="btn btn-success btn-lg active btn-sm ml-2" role="button" aria-pressed="true">
                                Tambah Guru
                            </a>
                            <br> <br>
                            @endif
                            <form class="col" method="POST" action="/datanilaisiswa/tugasharian">
                                @csrf
                                <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-sm-auto">NO</th>
                                            <th scope="col" class="col-sm-2">NIS</th>
                                            <th scope="col" class="col-sm-3">NAMA</th>
                                            <th scope="col" class="col-sm-2">T1</th>
                                            <th scope="col" class="col-sm-2">T2</th>
                                            <th scope="col" class="col-sm-2">T3</th>
                                            <th scope="col" class="col-sm-auto">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilaitugas as $nt)
                                        <tr class="text-sm-center">

                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-left">{{ $nt->siswa->namalengkap }}</td>
                                            <td class="text-left">{{ $nt->mapel->matapelajaran }}</td>
                                            <td class="text-left">{{ $nt->tugas1 }}</td>
                                            <td class="text-left">{{ $nt->tugas2 }}</td>
                                            <td class="text-left">{{ $nt->tugas3 }}</td>
                                            <td>
                                                <a href="/datanilaisiswa/tugasharian/{{$nt->id_tugas}}/edit" class="badge badge-success">ubah</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
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