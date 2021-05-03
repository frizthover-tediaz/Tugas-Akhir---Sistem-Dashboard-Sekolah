<?php 
session_start(); 
require 'koneksi.php';

$query1 = mysqli_query($conn, "SELECT * FROM tbstaff WHERE status LIKE '%Waka%'");
$waka = mysqli_num_rows($query1);

$query2 = mysqli_query($conn, "SELECT * FROM tbstaff WHERE status = '%Guru%'");
$guru = mysqli_num_rows($query2);

$query3 = mysqli_query($conn, "SELECT * FROM tbstaff WHERE status = '%DLL%'");
$dll = mysqli_num_rows($query3);

$query4 = mysqli_query($conn, "SELECT * FROM tbsiswa");
$siswa = mysqli_num_rows($query4);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK Immanuel Pontianak - Dashboard</title>

    <!-- Custom fonts for this -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/siswa.css" rel="stylesheet">

</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" style="width: 2.5rem;">
                </div>
                <div class="sidebar-brand-text mx-3">SMK Immanuel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Jadwal -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Jadwal</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <div class="container my-auto" style="color: white;margin-bottom: 4%!important;">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SMK Immanuel Pontianak <?= date("Y") ?></span>
                </div>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="data">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat Datang Kembali, <?= $_SESSION['nama'] ?></h1>
                    </div>

                   
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jadwal Hari ini:</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="">Lihat semua
                                        
                                        </a>
                                    </div>
                                </div>

                                <div class="card-header py-3 d-flex flex-column align-items-center">

                                    <div class="list-jadwal d-flex flex-row align-items-center justify-content-between mb-4">

                                        <div class="jadwal-content d-flex justify-content-between align-items-center">
                                            <h5 class="black-pel mr-2" style="color: #03a9f4;">XI TKJ 3</h5>

                                            <p class="garis mr-2">PKN</p>

                                            <h6 class="black-pel mr-4">-</h6>

                                            <p class="time mr-2">09:00 - 10:00</p>
                                        </div>


                                        <div class="btn-content">
                                            <button class="btn-masuk" id="" name="">Masuk</button>
                                        </div>
                                    </div>

                                    <div class="list-jadwal d-flex flex-row align-items-center justify-content-between">

                                        <div class="jadwal-content d-flex justify-content-between align-items-center">
                                            <h5 class="black-pel mr-2" style="color: #03a9f4;">X TKJ 3</h5>

                                            <p class="garis mr-2">|</p>

                                            <h6 class="black-pel mr-4">Matematika</h6>

                                            <p class="time mr-2">11:00 - 12:00</p>
                                        </div>


                                        <div class="btn-content">
                                            <button class="btn-masuk" id="" name="">Masuk</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
</body>
</html>
