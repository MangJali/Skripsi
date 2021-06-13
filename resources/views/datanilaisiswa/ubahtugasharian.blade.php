@extends('layout.main')

@section('title', 'Ubah Nilai Tugas')



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
                                <form class="col" method="POST"
                                    action="/datanilaisiswa/tugasharian/{{ $tugas->id_tugas }}/update">
                                    @csrf
                                    <table class="table mt-3" id="tablenilai">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="row">No</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">T1</th>
                                                <th scope="col">T2</th>
                                                <th scope="col">T3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">{{ $tugas->id_tugas }}</th>
                                                <td>{{ $tugas->siswa->namalengkap }}</td>
                                                <td>{{ $tugas->mapel->matapelajaran }}</td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="tugas1" value="{{ $tugas->tugas1 }}">
                                                </td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="tugas2" value="{{ $tugas->tugas2 }}">
                                                </td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="tugas3" value="{{ $tugas->tugas3 }}">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-primary mt-4">SIMPAN</button>
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
