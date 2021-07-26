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
                        <h1 class="text-bold text-center">DATA NILAI TUGAS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                @if (auth()->user()->role == 'admin')

                                    <a href="{{ url('/datanilaisiswa/tugasharian/add') }}"
                                        class="btn btn-success btn-sm active  ml-2" role="button" aria-pressed="true">
                                        Tambah Data Nilai
                                    </a>
                                    <br><br>
                                @endif


                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label>Kelas</label>
                                        <select id="filter-kelas" class="form-control form-control-sm filter ">
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            @foreach ($kelas as $kelas)
                                                <option value="{{ $kelas->id_kelas }}">
                                                    {{ $kelas->kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                @csrf
                                <table class="table table-bordered mt-3 table-sm table-responsive-sm text-center"
                                    id="tablenilai">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-auto">NO</th>
                                            <th scope="col" class="col-sm-3">Nama Siwa</th>
                                            <th scope="col" class="col-sm-2">Kelas</th>
                                            <th scope="col" class="col-sm-2">Mata Pelajaran</th>
                                            <th scope="col" class="col-sm-1">T1</th>
                                            <th scope="col" class="col-sm-1">T2</th>
                                            <th scope="col" class="col-sm-1">T3</th>
                                            <th scope="col" class="col-auto">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        @foreach ($nilaitugas as $nt)
                                            <tr class="text-sm-center">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $nt->siswa->namalengkap }}</td>
                                                <td>{{ $nt->pesertakelas->masterkelas->kelas->kelas }}</td>
                                                <td>{{ $nt->pesertakelas->masterkelas->mapel->namamapel }}</td>
                                                <td>{{ $nt->tugas1 }}</td>
                                                <td>{{ $nt->tugas2 }}</td>
                                                <td>{{ $nt->tugas3 }}</td>
                                                <td>
                                                    <a href="/datanilaisiswa/tugasharian/{{ $nt->id_tugas }}/edit"
                                                        class="btn btn-sm btn-success">ubah</a>
                                                    <form class="badge"
                                                        action="/datanilaisiswa/tugasharian/{{ $nt->id_tugas }}/delete"
                                                        method="POST" onsubmit="return confirm('Yakin Menghapus Data?')">
                                                        @csrf
                                                        {{ method_field('POST') }}
                                                        <button class=" btn btn-sm btn-danger" type="submit">
                                                            Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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

    <script>
        $("#filter-kelas").on('change', function() {
            let kelas = $("#filter-kelas").val()

            $.ajax({
                type: 'GET',
                url: '/datanilaisiswa/filter-kelas',
                data: {
                    kelas: kelas
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    var table = $('#tablenilai').DataTable();

                    table.clear().draw();

                    $.each(response, function(index, value) {
                        table.row.add([
                            index + 1,
                            value.namalengkap,
                            value.kelas,
                            value.namamapel,
                            value.tugas1,
                            value.tugas2,
                            value.tugas3,
                            '<td><a href="/datanilaisiswa/tugasharian/' + value.id +
                            '/edit" class="badge badge-success">ubah</a> </td>',
                        ]).draw();
                    });
                },
                error: function(response) {
                    console.log("err");
                }
            });
        })
    </script>

@endsection
