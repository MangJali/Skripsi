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
                        <h1 class="text-bold text-center">TAMBAH GURU</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form class="mt-3 needs-validation" method="POST" action="/tenagapendidik">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control form-control-sm " id="validationCustom01"
                                                placeholder="NIP" name="nip" required>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="namalengkap">NAMA LENGKAP</label>
                                            <input type="text" class="form-control form-control-sm" id="inputNIP"
                                                placeholder="Nama Lengkap" name="namalengkap"
                                                required="Nama Tidak Boleh Kosong">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col md-col-6">
                                            <label for="alamat">ALAMAT</label>
                                            <input type="text" class="form-control form-control-sm" id="alamat"
                                                placeholder="Alamat" name="alamat" required>
                                        </div>
                                        <div class="form-group col md-col-4">
                                            <label>JENIS KELAMAIN</label>
                                            <div class="ml-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio1" value="Laku-Laki" required>
                                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline ml-2">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        id="inlineRadio2" value="Perempuan" required>
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
