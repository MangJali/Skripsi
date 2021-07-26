@extends('layout.main')

@section('title', 'Nilai Ulangan')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">DATA NILAI UTS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ '/datanilaisiswa/ujiantengahsemester/add' }}"
                                        class="btn btn-success btn-lg active btn-sm ml-2" role="button" aria-pressed="true">
                                        Tambah Data Nilai
                                    </a>
                                    <br> <br>

                                @endif

                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label>Kelas</label>
                                        <select id="filter-kelas" class="form-control form-control-sm filter">
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
                                            <th scope="col" class="col-sm-auto">NO</th>
                                            <th scope="col" class="col-sm-3">NAMA SISWA</th>
                                            <th scope="col" class="col-sm-2">KELAS</th>
                                            <th scope="col" class="col-sm-3">MATA PELAJARAN</th>
                                            <th scope="col" class="col-sm-2">UTS</th>
                                            <th scope="col" class="col-sm-auto">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilaiuts as $item)
                                            <tr class="text-sm-center">

                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->pesertakelas->siswa->namalengkap }}</td>
                                                <td>{{ $item->pesertakelas->masterkelas->kelas->kelas }}</td>
                                                <td>{{ $item->pesertakelas->masterkelas->mapel->namamapel }}</td>
                                                <td>{{ $item->ujiantengahsemester }}</td>
                                                <td>
                                                    <a href="/datanilaisiswa/ujiantengahsemester/{{ $item->id_uts }}/edit"
                                                        class="btn btn-sm btn-success">Ubah</a>
                                                    <form class="badge"
                                                        action="/datanilaisiswa/ujiantengahsemester/{{ $item->id_uts }}/delete"
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
