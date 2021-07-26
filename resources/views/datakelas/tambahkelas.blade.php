@extends('layout.main')

@section('title', 'Tambah Kelas')

@section('custom-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">TAMBAH KELAS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form method="POST" action="/datakelas" class="col my-3">
                                    @csrf
                                    <label class="text-bold">Data Kelas</label>
                                    <div class="row mt-3">
                                        <label for="kelas" class="col-sm-2 col-from-label text-gray">Kelas</label>
                                        <select name="id_kelas" class="custom-select custom-select-sm col-9">
                                            <option selected disabled>-Pilih Kelas-</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id_kelas }}">{{ $item->kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">Kode Mapel</label>
                                        <input type="text" class="form-control form-control-sm col-9"
                                            placeholder="Kode Mapel" name="id_mapel" id="id_mapel" readonly>
                                    </div>
                                    <div class="row mt-3 ui-widget">
                                        <label for="matapelajaran" class="col-sm-2 col-from-label text-gray">Mapel</label>
                                        <input type="text" class="form-control form-control-sm col-9"
                                            placeholder="Mata Pelajaran" name="mapel" id="mapel" required>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">NIP</label>
                                        <input type="text" class="form-control form-control-sm col-9" placeholder="NIP"
                                            name="nip" id="nip" readonly>
                                    </div>
                                    <div class="row mt-3 ui-widget">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">Guru Pengajar</label>
                                        <input type="text" class="form-control form-control-sm col-9"
                                            placeholder="Guru Pengajar" name="guru" id="guru" required>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">Tahun Akademik</label>
                                        <input type="number" class="form-control form-control-sm col-9"
                                            placeholder="Tahun Akademik" name="thnakademik" required>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="semester" class="col-sm-2 col-from-label text-gray">Semester</label>
                                        <select class="custom-select custom-select-sm col-9" name="semester" required>
                                            <option selected disabled>-Semester-</option>
                                            <option value="Genap">Genap</option>
                                            <option value="Ganjil">Ganjil</option>
                                        </select>
                                    </div>
                                    {{-- <div class="row mt-3">
                                        <label for="kelas" class="col-sm-2 col-from-label text-gray">Kelas</label>
                                        <input type="text" class="form-control form-control-sm col-9" placeholder="Kelas"
                                            name="kelas">
                                    </div> --}}
                                    {{-- <div class="row mt-3">
                                        <label for="rombel" class="col-sm-2 col-from-label text-gray">Rombel</label>
                                        <input type="text" class="form-control form-control-sm col-9" placeholder="Rombel"
                                            name="rombel">
                                    </div> --}}
                                    <div class="row mt-3">
                                        <label for="kelas" class="col-sm-2 col-from-label text-gray">Kelas</label>
                                        <select name="rombel" class="custom-select custom-select-sm col-9" required>
                                            <option selected disabled>-Pilih Rombel-</option>
                                            @foreach ($rombel as $item)
                                                <option value="{{ $item->id_rombel }}">{{ $item->rombel }}
                                                </option>
                                            @endforeach
                                        </select>
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
@section('script')
    <script type="text/javascript">
        $(document).on("keydown", "#guru", function() {
            if ($(this).val().length >= 1) {
                $.ajax({
                    type: 'GET',
                    url: '/autocomplete',
                    data: {
                        q: $("#guru").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        var guru = [];
                        $.each(response, function(index, value) {
                            guru.push({
                                value: value.namapendidik,
                                id: value.nip
                            })
                        });
                        $("#guru").autocomplete({
                            source: guru,
                            select: function(event, ui) {
                                var result_selected = ui.item.id;
                                $("#guru").val(ui.item.value);
                                $("#nip").val(result_selected);
                                return false;
                            }
                        });
                    },
                    error: function(response) {
                        console.log("err");
                    }
                });
            }
        })

        $(document).on("keydown", "#mapel", function() {
            if ($(this).val().length >= 1) {
                $.ajax({
                    type: 'GET',
                    url: '/autocomplete-mapel',
                    data: {
                        q: $("#mapel").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        var mapel = [];
                        $.each(response, function(index, value) {
                            mapel.push({
                                value: value.namamapel,
                                id: value.id_mapel
                            })
                        });
                        $("#mapel").autocomplete({
                            source: mapel,
                            select: function(event, ui) {
                                var result_selected = ui.item.id;
                                $("#mapel").val(ui.item.value);
                                $("#id_mapel").val(result_selected);
                                return false;
                            }
                        });
                    },
                    error: function(response) {
                        console.log("err");
                    }
                });
            }
        })
    </script>

@endsection
