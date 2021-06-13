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
                        <h1 class="text-bold text-center">Nilai Ujian Akhir Semester</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ '/datanilaisiswa/ujianakhirsemester/add' }}"
                                        class="btn btn-success btn-lg active btn-sm ml-2" role="button" aria-pressed="true">
                                        Tambah Data Nilai
                                    </a>
                                    <br> <br>
                                @endif
                                <form class="col">
                                    @csrf
                                    <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col" class="col-sm-auto">NO</th>
                                                <th scope="col" class="col-sm-3">NIS</th>
                                                <th scope="col" class="col-sm-6">MATA PELAJARAN</th>
                                                <th scope="col" class="col-sm-2">UAS</th>
                                                <th scope="col" class="col-sm-1">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilaiuas as $item)
                                                <tr class="text-sm-center">

                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td class="text-left">{{ $item->siswa->namalengkap }}</td>
                                                    <td class="text-left">{{ $item->mapel->matapelajaran }}</td>
                                                    <td class="text-left">{{ $item->ujianakhirsemester }}</td>
                                                    <td>
                                                        <a href="/datanilaisiswa/ujianakhirsemester/{{ $item->id_uas }}/edit"
                                                            class="badge badge-success">ubah</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
