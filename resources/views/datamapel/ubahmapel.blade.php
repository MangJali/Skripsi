@extends('layout.main')

@section('title', 'Ubah Mapel')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">TAMBAH MATA PELAJARAN</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form method="POST" action="/datamapel/{{ $mapel->id_mapel }}/update" class="col my-3">
                                    @csrf
                                    <label class="text-bold">DATA PELAJARAN</label>
                                    <div class="row mt-3">
                                        <label for="kodematapelajran" class="col-sm-2 col-from-label text-gray">Kode Mata
                                            Pelajaran</label>
                                        <input type="text" class="form-control col-9" placeholder="Kode Mata Pelajaran"
                                            name="kodematapelajaran" value="{{ $mapel->id_mapel }}" required>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="matapelajaran" class="col-sm-2 col-from-label text-gray">Mata
                                            Pelajaran</label>
                                        <input type="text" class="form-control col-9" placeholder="Mata Pelajaran"
                                            name="matapelajaran" value="{{ $mapel->namamapel }}" required>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="semester" class="col-sm-2 col-from-label text-gray">Tahun
                                            Kurikulum</label>
                                        <input type="text" class="form-control col-9" placeholder="Semester"
                                            name="thnkurikulum" value="{{ $mapel->tahunkurikulum }}" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary mt-4">SIMPAN</button>
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
