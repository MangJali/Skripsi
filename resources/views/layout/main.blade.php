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
    {{-- <link rel="stylesheet"
        href="{{ asset('/dashboard/plugins/tempusdominus-bootstrap-5/css/tempusdominus-bootstrap-5.min.css') }}"> --}}
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
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/datatables/datatables.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/dashboard/plugins/toastr/toastr.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DatePicker-->
    <link rel="stylesheet" href="{{ asset('/air-datepicker/dist/css/datepicker.css') }}">
    <!-- Autocomplete-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    @yield("custom-css")


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
                    <a href="/logout" class="nav-link text-light ">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- Right navbar links -->

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
                        {{-- <img src="{{ url('/dashboard/dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2"
                            alt="User Image"> --}}
                    </div>
                    <div class="info">
                        <a
                            class="d-block">{{ ucwords(auth()->user()->name) . ' (' . (auth()->user()->role == 'ortu' ? 'Orang Tua' : ucwords(auth()->user()->role)) . ')' }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item margin-top has-treeview">
                                <a href="{{ url('/tenagapendidik') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Tenaga Pendidik
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item mt-4 margin-top has-treeview">
                                <a href="{{ url('/datasiswa') }}" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Siswa
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
                            <li class="nav-item mt-4 margin-top has-treeview">
                                <a href="{{ url('/datasekolahumum') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Data Sekolah Umum
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item mt-4 margin-top has-treeview">
                                <a href="{{ url('/datamapel') }}" class="nav-link">
                                    <i class="nav-icon fas fa-folder-open"></i>
                                    <p>
                                        Akademik
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item mt-4 margin-top has-treeview">
                                        <a href="{{ url('/datamapel') }}" class="nav-link">
                                            <i class="nav-icon fas fa-folder-open"></i>
                                            <p>
                                                Mata Pelajaran
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item mt-4 margin-top has-treeview">
                                        <a href="{{ url('/datakelas') }}" class="nav-link">
                                            <i class="nav-icon fas fa-building"></i>
                                            <p>
                                                Kelas
                                            </p>
                                        </a>

                                    </li>
                                    <li class="nav-item mt-4 margin-top has-treeview">
                                        <a href="{{ url('/pesertakelas') }}" class="nav-link">
                                            <i class="nav-icon fas fa-building"></i>
                                            <p>
                                                Peserta Kelas
                                            </p>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
                            <li class="nav-item mt-4 margin-top has-treeview">
                                <a href="{{ url('/dataabsensi') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p>
                                        Absensi Siswa
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == 'ortu')
                            <li class="nav-item mt-4 margin-top has-treeview">
                                <a href="{{ url('/dataabsensi/indexsiswa') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p>
                                        Absensi Siswa
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
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
                            </li>
                        @endif

                        <li class="nav-item mt-4 margin-top has-treeview">
                            <a href="{{ url('/penilaianhasilbelajar') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Nilai Siswa
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

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
    <!-- Data Table -->
    <script src="{{ asset('/dashboard/plugins/datatables/datatables.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('/dashboard/plugins/toastr/toastr.min.js') }}"></script>
    <!-- DatePicker -->
    <script src="{{ asset('/air-datepicker/dist/js/datepicker.js') }}"></script>
    <script src="{{ asset('/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>

    <!--Autocomplete-->


    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if (Session::has('sukses'))
        <script>
            toastr.success("{{ Session::get('sukses') }}", "Sukses");
        </script>
    @endif
    @if (Session::has('gagal'))
        <script>
            toastr.error("{{ Session::get('gagal') }}", "Gagal");
        </script>
    @endif
    @yield('script')
    <!--Autocomplete-->


</body>

</html>
