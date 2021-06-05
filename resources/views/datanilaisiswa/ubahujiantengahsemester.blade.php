@extends('layout.main')

@section('title', 'Ubah Nilai Tugas')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col md-4">
                    <h1 class="text-bold text-center">Masukkan Nilai Tugas</h1>
                    <div class="card card-success card-outline mt-4">
                        <div class="card-body">
                            <form class="col" method="POST" action="/datanilaisiswa/ujiantengahsemester/{{$uts->id_uts}}/update">
                                @csrf

                                <input class="form-control text-sm-center" type="text" name="nis" readonly value="{{$uts->nis}}">
                                <input class="form-control text-sm-center" type="text" name="kodemapel" readonly value="{{$uts->kodemapel}}">
                                <input class="form-control-range text-sm-center" type="text" name="ujiantengahsemester" value="{{$uts->ujiantengahsemester}}">

                                <button type="submit" class="btn btn-primary mt-4">SIMPAN</button>
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