<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('/dashboard/plugins/tempusdominus-bootstrap-5/css/tempusdominus-bootstrap-5.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dashboard/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DatePicker-->
    <link rel="stylesheet" href="{{ asset('/air-datepicker/dist/css/datepicker.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/home') }}" class="nav-link text-light">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link text-light ">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- Right navbar links -->


        {{-- <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <button
          data-widget="pushmenu"
          class="btn btn-link nav-link pushMenu">
          <i class="fas fa-bars"></i>
        </button>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button class="btn btn-sm btn-link text-bold text-light"><i class="fas fa-arrow-circle-left"></i>&ensp;kembali</button>
      </li>
    </ul>
  </nav> --}}
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4 bg">
            <!-- Brand Logo -->
            <a class="brand-link">
                <img src="{{ url('/dashboard/dist/img/college.png') }}" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SIMAS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('/dashboard/dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item margin-top has-treeview">
                            <a href="{{ url('/tenagapendidik') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tenaga Pendidik
                                </p>
                            </a>
                        </li>

                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/datamapel') }}" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Data Mapel
                                </p>
                            </a>
                        </li>

                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/datasiswa') }}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Data Siswa
                                </p>
                            </a>
                        </li>

                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/datasekolahumum') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Data Sekolah Umum
                                </p>
                            </a>
                        </li>

                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/dataabsensi') }}" class="nav-link">
                                <i class="nav-icon fas fa-check-square"></i>
                                <p>
                                    Absensi Siswa
                                </p>
                            </a>
                        </li>

                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/penilaianhasilbelajar') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Penilaian Hasil Belajar
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/datanilaisiswa/tugasharian') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tugas Harian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/datanilaisiswa/ulanganharian') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ulangan Harian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/datanilaisiswa/ujiantengahsemester') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ujian Tengah Semester</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/datanilaisiswa/ujianakhirsemester') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ujian Akhir Semester</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/penilaianhasilbelajar') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Nilai Siswa
                                </p>
                            </a>
                        </li>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        {{-- <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class= "col md-4">
            <h1 class="text-dark text-center">SIMAS</h1>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NIS</th>
                    <th scope="col">KELAS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>

          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper --> --}}
        <footer class="main-footer">
            <strong>PONPES BUSTANUL HUDA PASURUAN</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>SISTEM INFORMASI AKADEMIK SISWA</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/dashboard/plugins/sparklines/sparkline.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/dashboard/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dashboard/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/dashboard/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dashboard/dist/js/demo.js') }}"></script>
    <!-- DatePicker -->
    <script src="{{ asset('/air-datepicker/dist/js/datepicker.js') }}"></script>
    <script src="{{ asset('/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>

</body>

</html>
