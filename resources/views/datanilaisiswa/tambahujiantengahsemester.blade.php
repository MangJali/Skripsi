@extends('layout.main')

@section('title', 'Nilai Tugas')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">TAMBAH DATA NILAI UTS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form class="col" method="POST" action="/datanilaisiswa/ujiantengahsemester">
                                    @csrf
                                    <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col" class="col-sm-auto">NO</th>
                                                <th scope="col" class="col-sm-1">TUGAS</th>
                                                <th scope="col" class="col-sm-1">PESERTA</th>
                                                <th scope="col" class="col-sm-2">NIS</th>
                                                <th scope="col" class="col-sm-1">NAMA</th>
                                                <th scope="col" class="col-sm-2">KODE KELAS</th>
                                                <th scope="col" class="col-sm-1">KELAS</th>
                                                <th scope="col" class="col-sm-1">KODE</th>
                                                <th scope="col" class="col-sm-1">MAPEL</th>
                                                <th scope="col" class="col-sm-2">GURU</th>
                                                <th scope="col" class="col-sm-2">UTS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($utsbaru as $item)
                                                <tr class="text-sm-center">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="number"
                                                            name="id_uts[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->id }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="number"
                                                            name="id_peserta[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->id }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="text"
                                                            name="nis[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->nis }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="text"
                                                            name="siswa[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->siswa->namalengkap }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="number"
                                                            name="id_kelas[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->masterkelas->kelas->id_kelas }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="text"
                                                            name="kelas[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->masterkelas->kelas->kelas }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="text"
                                                            name="id_mapel[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->masterkelas->mapel->id_mapel }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="text"
                                                            name="mapel[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->masterkelas->mapel->namamapel }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control text-sm-center" type="text"
                                                            name="nip[{{ $loop->iteration }}]" readonly
                                                            value={{ $item->pesertakelas->masterkelas->guru->nip }}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control-range text-sm-center" type="text"
                                                            name="uts[{{ $loop->iteration }}]">
                                                    </td>
                                                </tr>
                                            @endforeach
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
