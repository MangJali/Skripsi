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
                            <!-- <div class="row my-1">
                                <select class="form-control-sm col-2 m-2 bg-dark " placeholder="Absensi">
                                    <option selected>Kelas</option>
                                    <option value="1">1 SANAWIYAH</option>
                                    <option value="2">2 SANAWIYAH</option>
                                    <option value="3">3 SANAWIYAH</option>
                                </select>
                                <select class="form-control-sm col-2 m-2 bg-dark " placeholder="Absensi">
                                    <option selected>Mata Pelajaran</option>
                                    <option value="hadir">Hadir</option>
                                    <option value="ijin">Ijin</option>
                                    <option value="alpa">Alpa</option>
                                </select>
                            </div> -->

                            <table class="table mb-3 table-sm table-responsive-sm" id="tablenilai">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col" class="col-sm-0">NO</th>
                                        <th scope="col" class="col-sm-2">Nama Siswa</th>
                                        <th scope="col" class="col-sm-2">Mata Pelajaran</th>
                                        <th scope="col" class="col-sm-1">T 1</th>
                                        <th scope="col" class="col-sm-1">T 2</th>
                                        <th scope="col" class="col-sm-1">T 3</th>
                                        <th scope="col" class="col-sm-1">UH1</th>
                                        <th scope="col" class="col-sm-1">UH2</th>
                                        <th scope="col" class="col-sm-1">UTS</th>
                                        <th scope="col" class="col-sm-1">UAS</th>
                                        <th scope="col" class="col-sm-1">NA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter=1;
                                    @endphp
                                    @foreach ($rapor as $key=>$item)
                                    @foreach ($item as $key1=>$item1)
                                    <tr class="text-center">
                                        <th scope="row">{{ $counter++}}</th>
                                        <td>{{ $item1["namalengkap"] }}</td>
                                        <td>{{ $item1["namamapel"] }}</td>
                                        <td>{{ isset($item1["tugas1"])?$item1["tugas1"]:"" }}</td>
                                        <td>{{ isset($item1["tugas2"])?$item1["tugas2"]:"" }}</td>
                                        <td>{{ isset($item1["tugas3"])?$item1["tugas3"]:"" }}</td>
                                        <td>{{ isset($item1["uh1"])?$item1["uh1"]:"" }}</td>
                                        <td>{{ isset($item1["uh2"])?$item1["uh2"]:"" }}</td>
                                        <td>{{ isset($item1["uts"])?$item1["uts"]:"" }}</td>
                                        <td>{{ isset($item1["uas"])?$item1["uas"]:"" }}</td>
                                        <td></td>
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
@endsection