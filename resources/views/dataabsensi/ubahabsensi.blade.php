@extends('layout.main')

@section('title', 'Absensi Siswa')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">ABSENSI SISWA</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form method="POST" action="/dataabsensi/{{ $absensi->id_absensi }}/update">
                                    @csrf
                                    <table class="table mt-3" id="tablenilai">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="row">No</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Hadir</th>
                                                <th scope="col">Ijin</th>
                                                <th scope="col">Alpha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">{{ $absensi->id_absensi }}</th>
                                                <td>{{ $absensi->siswa->namalengkap }}</td>
                                                <td>{{ $absensi->mapel->matapelajaran }}</td>
                                                <td>{{ $absensi->siswa->kelas->kelas }}</td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="alpha" value="{{ $absensi->alpha }}">
                                                </td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text" name="ijin"
                                                        value="{{ $absensi->ijin }}">
                                                </td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="hadir" value="{{ $absensi->hadir }}">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
{{-- @section('script')
    <script>
        $(document).ready(function() {
            $('#tablenilai').DataTable();
        });

    </script>
@endsection --}}
