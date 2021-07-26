@extends('layout.main')

@section('title', 'Ubah Data Guru')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">Ubah Data Tenaga Pendidik</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form class="mt-3" method="POST" action="/dataguru/{{ $tenagapendidik->nip }}/update">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" placeholder="Nama Lengkap"
                                                name="nip" value="{{ $tenagapendidik->nip }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="namalengkap">NAMA LENGKAP</label>
                                            <input type="text" class="form-control" id="inputNIP" placeholder="Nama Lengkap"
                                                name="namapendidik" value="{{ $tenagapendidik->namapendidik }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="alamat">ALAMAT</label>
                                            <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                                name="alamat" value="{{ $tenagapendidik->alamat }}">
                                        </div>
                                        <div class="form-group col md-col-6">
                                            <label for="jeniskelamin">JENIS KELAMAIN</label>
                                            <div class="ml-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio1" value="Laki-Laki">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline ml-2">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio2" value="Perempuan">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary button btn-group-justified">Tambah</button>
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
