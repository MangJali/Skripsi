@extends('layout.main')

@section('title', 'Ubah Data Siswa')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">Ubah Data Siswa</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form class="mt-3" method="POST" action="/datasiswa/{{ $siswa->nis }}/update">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nis">NIS</label>
                                            <input type="text" class="form-control" id="nis" placeholder="Nama Lengkap"
                                                name="nis" value="{{ $siswa->nis }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="namalengkap">NAMA LENGKAP</label>
                                            <input type="text" class="form-control" id="inputNIP" placeholder="Nama Lengkap"
                                                name="namalengkap" value="{{ $siswa->namalengkap }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label>Jenis Kelamin</label>
                                            <div class="ml-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio1" value="{{ $siswa->jeniskelamin }}">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline ml-2">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio2" value="{{ $siswa->jeniskelamin }}">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                                name="alamat" value="{{ $siswa->alamat }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="tempatlahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempatlahir"
                                                placeholder="Tempat Lahir" name="tempatlahir"
                                                value="{{ $siswa->tempatlahir }}">
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="tanggallahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" placeholder="Tanggal Lahir"
                                                name="tanggallahir" value="{{ $siswa->tanggallahir }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="sekolahumum">Sekolah Umum</label>
                                            <input type="text" class="form-control date" id="sekolahumum"
                                                placeholder="Sekoalah Umum" name="sekolahumum"
                                                value="{{ $siswa->sekolahumum }}">
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="kodekelas">Orang Tua / Wali</label>
                                            <input type="text" class="form-control date" id="kodekelas"
                                                placeholder="Orang Tua / Wali" name="namaortu"
                                                value="{{ $siswa->namaortu }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="kodekelas">STATUS</label>
                                            <select class="custom-select" name="status">
                                                <option selected disabled>-Status-</option>
                                                <option value="{{ $siswa->status }}">Aktif</option>
                                                <option value="{{ $siswa->status }}">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="kodekelas">Tahun Angkatan</label>
                                            <select class="custom-select" name="angkatan">
                                                <option selected disabled>-Pilih Tahun-</option>
                                                <option value="{{ $siswa->angkatan }}">2020/2021</option>
                                                <option value="{{ $siswa->angkatan }}">2022/2023</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary button btn-group-justified">Simpan</button>
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
