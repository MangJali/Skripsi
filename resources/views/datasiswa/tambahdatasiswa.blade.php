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
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form class="mt-3" method="POST" action="/datasiswa">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nis">No Induk Siswa</label>
                                            <input type="text" class="form-control" id="nis" placeholder="No Induk"
                                                name="nis" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="namalengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="namalengkap"
                                                placeholder="Nama Lengkap" name="namalengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label>Jenis Kelamin</label>
                                            <div class="ml-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio1" value="Laki-Laki" required>
                                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline ml-2">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio2" value="Perempuan" required>
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                                name="alamat" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="tempatlahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempatlahir"
                                                placeholder="Tempat Lahir" name="tempatlahir" required>
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="tanggallahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" placeholder="Tanggal Lahir"
                                                name="tanggallahir" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="sekolahumum">Sekolah Umum</label>
                                            <input type="text" class="form-control date" id="sekolahumum"
                                                placeholder="Sekoalah Umum" name="sekolahumum" required>
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="kodekelas">Orang Tua / Wali</label>
                                            <input type="text" class="form-control date" id="kodekelas"
                                                placeholder="Orang Tua / Wali" name="namaortu" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="kodekelas">STATUS</label>
                                            <select class="custom-select" name="status" required>
                                                <option selected disabled>-Status-</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="kodekelas">Tahun Angkatan</label>
                                            <select class="custom-select" name="angkatan" required>
                                                <option selected disabled>-Pilih Tahun-</option>
                                                <option value="2020/2021">2020/2021</option>
                                                <option value="2022/2023">2022/2023</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="btn btn-primary button btn-group-justified">Tambah</button>
                                    </div>
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
