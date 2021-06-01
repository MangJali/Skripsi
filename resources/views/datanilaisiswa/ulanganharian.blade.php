@extends('layout.main')

@section('title', 'Nilai Ulangan')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">Nilai Ulangan</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <a href="{{ '/datanilaisiswa/ubahulanganharian' }}"
                                    class="btn btn-success btn-lg active btn-sm ml-2" role="button" aria-pressed="true">
                                    Tambah Nilai
                                </a>
                                <form class="col" method="POST" action="">
                                    @csrf
                                    <table class="table mt-3 table-sm table-responsive-sm text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col" class="col-sm-auto">NO</th>
                                                <th scope="col" class="col-sm-4">NIS</th>
                                                <th scope="col" class="col-sm-3">MATA PELAJARAN</th>
                                                <th scope="col" class="col-sm-2">UH1</th>
                                                <th scope="col" class="col-sm-2">UH2</th>
                                                <th scope="col" class="col-sm-1">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilaiuh as $nt)
                                                <tr class="text-sm-center">

                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td class="text-left">{{ $nt->siswaUH->namalengkap }}</td>
                                                    <td class="text-left">{{ $nt->mapel->matapelajaran }}</td>
                                                    <td class="text-left">{{ $nt->uh1 }}</td>
                                                    <td class="text-left">{{ $nt->uh2 }}</td>
                                                    <td>
                                                        <a href="" class="badge badge-success">ubah</a>
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
