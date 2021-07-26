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
                                <form class="col" method="POST"
                                    action="/datanilaisiswa/ujiantengahsemester/{{ $uts->id_uts }}/update">
                                    @csrf
                                    <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="row">No</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">UTS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">{{ $uts->id_uts }}</th>
                                                <td>{{ $uts->siswa->namalengkap }}</td>
                                                <td>{{ $uts->pesertakelas->masterkelas->kelas->kelas }}</td>
                                                <td>{{ $uts->pesertakelas->masterkelas->mapel->namamapel }}</td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="ujiantengahsemester"
                                                        value="{{ $uts->ujiantengahsemester }}">
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#tablenilai').DataTable();
        });

    </script>
@endsection
