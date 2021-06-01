@extends('layout.main')

@section('title', 'Tenaga Pendidik')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">TAMBAH SISWA</h1>
                        <form class="mt-3" method="POST" action="/datasiswa">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nis">NO INDUK SISWA</label>
                                    <input type="text" class="form-control" id="nis" placeholder="No Induk" name="nis">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namalengkap">NAMA LENGKAP</label>
                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap"
                                        name="namalengkap">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col md-col-6">
                                    <label for="jeniskelamin">JENIS KELAMIN</label>
                                    <input type="text" class="form-control" id="jeniskelamin" placeholder="Jenis kelamin"
                                        name="jeniskelamin">
                                </div>
                                <div class="form-group col md-col-6">
                                    <label for="alamat">ALAMAT</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col md-col-6">
                                    <label for="tempatlahir">TEMPAT LAHIR</label>
                                    <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir"
                                        name="tempatlahir">
                                </div>
                                <div class="form-group col md-col-6">
                                    <label for="tanggallahir">TANGGAL LAHIR</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggallahir">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col md-col-6">
                                    <label for="sekolahumum">SEKOLAH UMUM</label>
                                    <input type="text" class="form-control date" id="sekolahumum"
                                        placeholder="Sekoalah Umum" name="sekolahumum">
                                </div>
                                <div class="form-group col md-col-6">
                                    <label for="kodekelas">Kelas</label>
                                    <input type="text" class="form-control date" id="kodekelas" placeholder="Kelas"
                                        name="kodekelas">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary button btn-group-justified">Tambah</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->
@endsection
