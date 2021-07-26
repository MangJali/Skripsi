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
                        <h1 class="text-bold text-center">MASUKKAN NILAI ULANGAN</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form class="col" method="POST"
                                    action="/datanilaisiswa/ulanganharian/{{ $uh->id_uh }}/update">
                                    @csrf
                                    <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="row">No</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">UH1</th>
                                                <th scope="col">UH2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">{{ $uh->id_uh }}</th>
                                                <td>{{ $uh->siswa->namalengkap }}</td>
                                                <td>{{ $uh->pesertakelas->masterkelas->kelas->kelas }}</td>
                                                <td>{{ $uh->pesertakelas->masterkelas->mapel->namamapel }}</td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="ulanganharian1" value="{{ $uh->ulanganharian1 }}">
                                                </td>
                                                <td>
                                                    <input class="form-control-range text-sm-center" type="text"
                                                        name="ulanganharian2" value="{{ $uh->ulanganharian2 }}">
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
