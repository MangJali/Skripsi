@extends('layout.main')

@section('title', 'Tenaga Pendidik')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col md-4">
                        <h1 class="text-bold text-center">DATA GURU</h1>
                        <div class="card card-success card-outline mt-4">
                            <div class="card-body">
                                <a href="{{ url('/dataguru/tambahguru') }}" class="btn btn-success btn-lg active btn-sm"
                                    role="button" aria-pressed="true">
                                    Tambah Guru
                                </a>
                                <br> <br>
                                <table class="table mt-3 table-sm table-responsive-sm" id="tablenilai">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">NAMA</th>
                                            <th scope="col">ALAMAT</th>
                                            <th scope="col">JENIS KELAMIN</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tenagapendidiks as $pdk)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $pdk->nip }}</td>
                                                <td>{{ $pdk->namapendidik }}</td>
                                                <td>{{ $pdk->alamat }}</td>
                                                <td>{{ $pdk->jeniskelamin }}</td>
                                                <td>
                                                    <a href="/dataguru/ubahguru/{{ $pdk->nip }}/edit"
                                                        class="badge badge-success">Ubah</a>
                                                    {{-- <form class="badge" action="/dataguru/{{ $pdk->nip }}/delete"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('POST') }}
                                                        <button class="badge badge-danger" type="submit">Hapus</button>
                                                    </form> --}}
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
@endsection
