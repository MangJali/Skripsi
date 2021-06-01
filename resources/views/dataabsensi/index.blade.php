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
                        <a href="{{ url('/dataabsensi/tambahabsensi') }}" class="btn btn-success btn-lg active"
                            role="button" aria-pressed="true">
                            Tambah Absensi
                        </a>
                        <table class="table mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="row">No</th>
                                    <th scope="col">Kode Mapel</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Alpha</th>
                                    <th scope="col">Ijin</th>
                                    <th scope="col">Sakit</th>
                                    <th scope="col">Hadir</th>
                                    <th scope="col">Tatap Muka</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="badge badge-success">edit</a>
                                        <a href="" class="badge badge-danger">delet</a>
                                    </td>
                                </tr>
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
