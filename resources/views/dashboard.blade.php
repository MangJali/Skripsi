@extends('layout.main')

@section('title', 'Ponpes Bustanul Huda')


@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class= "col md-4">
            <h1 class="text-dark text-center">SIMAS</h1>
          <div class="mt-3 callout callout-info bg-lightblue">
              <h4>Login Succes</h4>
              <p>Anda Login Sebagai {{auth()->user()->role=="ortu"?"Orang Tua":ucwords(auth()->user()->role)}}</p>
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



