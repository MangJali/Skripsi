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
                        <h1 class="text-bold text-center">TAMBAH SEKOLAH UMUM</h1>
                        <form class="col my-3" method="POST" action="/datasekolahumum">
                            @csrf
                            <label class="text-bold">DATA SEKOLAH UMUM</label>
                            <div class="row mt-3">
                                <label for="kodesekolah" class="col-sm-2 col-from-label text-gray">Kode Sekolah
                                    Umum</label>
                                <input type="text" class="form-control col-9" placeholder="Kode Sekolah Umum"
                                    name="kodesekolah">
                            </div>
                            <div class="row mt-3">
                                <label for="namasekolah" class="col-sm-2 col-form-label text-gray">Nama
                                    Sekolah</label>
                                <input class="form-control col-9" placeholder="Nama Sekolah" name="namasekolah">
                            </div>
                            <div class="row mt-3">
                                <label for="alamatsekolah" class="col-sm-2 col-form-label text-gray">Alamat
                                    Sekolah</label>
                                <input class="form-control col-9" placeholder="Alamat Sekolah" name="alamat">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mt-4">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

@endsection
