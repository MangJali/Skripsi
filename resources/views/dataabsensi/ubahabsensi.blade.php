@extends('layout.main')

@section('title', 'Tambah Mapel')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">TAMBAH ABSENSI SISWA</h1>
                        <form class="col my-3">
                            <label class="text-bold">ABSENSI SISWA</label>
                            <div class="row mt-3">
                                <label for="kodemapel" class="col-sm-2 col-from-label text-gray">Kode Mata
                                    Pelajaran</label>
                                <input type="text" class="form-control col-9" placeholder="Kode Mata Pelajaran">
                            </div>
                            <div class="row mt-3">
                                <label for="inputAbsensi" class="col-sm-2 col-form-label text-gray">Absensi</label>
                                <select class="form-control col-9" placeholder="Absensi">
                                    <option selected>Absensi Kehadiran</option>
                                    <option value="hadir">Hadir</option>
                                    <option value="ijin">Ijin</option>
                                    <option value="alpa">Alpa</option>
                                </select>
                            </div>
                            <div class="row mt-3">
                                <label for="inputJumlahAbsensi" class="col-sm-2 col-form-label text-gray">Jumlah
                                    Absensi</label>
                                <input class="form-control col-9" placeholder="Jumlah Absensi">
                            </div>
                        </form>
                        <button type="button" class="btn btn-primary mt-4">SIMPAN</button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

@endsection
