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
                        <h1 class="text-bold text-center">TAMBAH TENAGA PENDIDIK</h1>
                        <form class="mt-3" method="POST" action="/tenagapendidik">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" placeholder="Nama Lengkap" name="nip">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namalengkap">NAMA LENGKAP</label>
                                    <input type="text" class="form-control" id="inputNIP" placeholder="Nama Lengkap"
                                        name="namalengkap">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col md-col-6">
                                    <label for="alamat">ALAMAT</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                                </div>
                                <div class="form-group col md-col-6">
                                    <label for="jeniskelamin">JENIS KELAMAIN</label>
                                    <select type="text" class="form-control" aria-label="form-select-sm example"
                                        name="jeniskelamin">
                                        <option selected>Jenis Kelamin</option>
                                        <option value="Laki laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
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
