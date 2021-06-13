@extends('layout.main')

@section('title', 'Sekolah Umum')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">SEKOLAH UMUM SISWA</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                {{-- <a href="{{ url('/datasekolahumum/tambahsekolahumum') }}" class="btn btn-success btn-lg active"
                            role="button" aria-pressed="true">
                            Tambah Data
                        </a> --}}
                                <table class="table mt-3 table-sm table-responsive-sm text-center" id="tablenilai">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="col-sm-auto">NO</th>
                                            <th scope="col" class="col-sm-2">NIS</th>
                                            <th scope="col" class="col-sm-3">NAMA</th>
                                            <th scope="col" class="col-sm-2">KELAS</th>
                                            <th scope="col" class="col-sm-4">SEKOLAH UMUM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sekolahumums as $sekolah)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $sekolah->nis }}</td>
                                                <td>{{ $sekolah->namalengkap }}</td>
                                                <td>{{ $sekolah->kelas->kelas }}</td>
                                                <td>{{ $sekolah->sekolahumum }}</td>
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
@endsection
