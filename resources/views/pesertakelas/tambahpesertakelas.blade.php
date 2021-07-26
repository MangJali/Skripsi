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
                        <h1 class="text-bold text-center">TAMBAH PESERTA KELAS</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <form method="POST" action="/pesertakelas" class="col my-3">
                                    @csrf
                                    <label class="text-bold">PESERTA KELAS</label>
                                    <div class="row mt-3">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">Master Kelas</label>
                                        <input type="text" class="form-control form-control-sm col-9"
                                            placeholder="Kode Kelas" name="id_master" id="id_kelas" required>
                                    </div>
                                    {{-- <div class="row mt-3 ui-widget">
                                        <label for="matapelajaran" class="col-sm-2 col-from-label text-gray">Kelas</label>
                                        <input type="text" class="form-control form-control-sm col-9" placeholder="Kelas"
                                            name="kelas" id="kelas">
                                    </div> --}}

                                    <div class="row mt-3">
                                        <label for="kelas" class="col-sm-2 col-from-label text-gray">Kelas</label>
                                        <select name="id_kelas" class="custom-select custom-select-sm col-9" required>
                                            <option selected disabled>-Pilih Kelas-</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id_kelas }}">{{ $item->kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="row mt-3">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">Mata Pelajaran</label>
                                        <input type="text" class="form-control form-control-sm col-9"
                                            placeholder="Mata Pelajaran" name="mapel" id="mapel" readonly>
                                    </div> --}}
                                    <div class="row mt-3">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">NIS</label>
                                        <input type="text" class="form-control form-control-sm col-9" placeholder="NIS"
                                            name="nis" id="nis" readonly>
                                    </div>
                                    <div class="row mt-3 ui-widget">
                                        <label for="nip" class="col-sm-2 col-from-label text-gray">Nama Siswa</label>
                                        <input type="text" class="form-control form-control-sm col-9"
                                            placeholder="Nama Siswa" name="siswa" id="siswa" required>
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
        $(document).on("keydown", "#siswa", function() {
            if ($(this).val().length >= 1) {
                $.ajax({
                    type: 'GET',
                    url: '/autocomplete-siswa',
                    data: {
                        q: $("#siswa").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        var siswa = [];
                        $.each(response, function(index, value) {
                            siswa.push({
                                value: value.namalengkap,
                                id: value.nis
                            })
                        });
                        $("#siswa").autocomplete({
                            source: siswa,
                            select: function(event, ui) {
                                var result_selected = ui.item.id;
                                $("#siswa").val(ui.item.value);
                                $("#nis").val(result_selected);
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

        $(document).on("keydown", "#id_kelas", function() {
            if ($(this).val().length >= 1) {
                $.ajax({
                    type: 'GET',
                    url: '/autocomplete-id_kelas',
                    data: {
                        q: $("#id_kelas").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        var id_kelas = [];
                        $.each(response, function(index, value) {
                            id_kelas.push({
                                value: value.id_kelas,
                                id: value.kelas
                            })
                        });
                        $("#id_kelas").autocomplete({
                            source: id_kelas,
                            select: function(event, ui) {
                                var result_selected = ui.item.id;
                                $("#id_kelas").val(ui.item.value);
                                $("#kelas").val(result_selected);
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
