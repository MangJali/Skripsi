@extends('layout.main')

@section('title', 'Data Siswa')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center my-3">PENILAIAN HASIL BELAJAR SISWA</h1>
                        <div class="card card-success card-outline">
                            <div class="card-body">
                                <div class="row mb-3">

                                </div>
                                <table class="table table-bordered mb-3 table-sm table-responsive-sm" id="tablenilai"
                                    style="font-family: cursive">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th scope="col" class="col-auto text-uppercase">NO</th>
                                            <th scope="col" class="col-sm-2 text-uppercase">Nama Siswa</th>
                                            <th scope="col" class="col-sm-2 text-uppercase">Kelas</th>
                                            <th scope="col" class="col-sm-2 text-uppercase">Mata Pelajaran</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">T1</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">T2</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">T3</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">UH1</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">UH2</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">UTS</th>
                                            <th scope="col" class="col-sm-1 text-uppercase">UAS</th>
                                            <th scope="col" class="col-auto text-uppercase">NA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($rapor as $key => $item)
                                            @foreach ($item as $key1 => $item1)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $counter++ }}</th>
                                                    <td>{{ $item1['namalengkap'] }}</td>
                                                    <td>{{ $item1['id'] }}</td>
                                                    <td>{{ $item1['mapel'] }}</td>
                                                    <td>{{ isset($item1['tugas1']) ? $item1['tugas1'] : '' }}</td>
                                                    <td>{{ isset($item1['tugas2']) ? $item1['tugas2'] : '' }}</td>
                                                    <td>{{ isset($item1['tugas3']) ? $item1['tugas3'] : '' }}</td>
                                                    <td>{{ isset($item1['uh1']) ? $item1['uh1'] : '' }}</td>
                                                    <td>{{ isset($item1['uh2']) ? $item1['uh2'] : '' }}</td>
                                                    <td>{{ isset($item1['uts']) ? $item1['uts'] : '' }}</td>
                                                    <td>{{ isset($item1['uas']) ? $item1['uas'] : '' }}</td>
                                                    <td>
                                                        @php
                                                            $final = ((isset($item1['tugas1']) ? $item1['tugas1'] : 0) + (isset($item1['tugas2']) ? $item1['tugas2'] : 0) + (isset($item1['tugas3']) ? $item1['tugas3'] : 0) + (isset($item1['uh1']) ? $item1['uh1'] : 0) + (isset($item1['uh2']) ? $item1['uh2'] : 0) + (isset($item1['uts']) ? $item1['uts'] : 0) + (isset($item1['uas']) ? $item1['uh1'] : 0)) / 7;
                                                            echo round($final, 0);
                                                        @endphp
                                                    </td>
                                                </tr>

                                            @endforeach
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

    {{-- <script>
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
                            value.uh1,
                            value.uh2,
                            value.uts,
                            value.uas,

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

    </script> --}}
@endsection
