<?php
session_start();
include('../config.php');
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = $mysqli->query($sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = $mysqli->query("SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tentang - Implementasi Metode Enkripsi AES 128 Bit pada Data Laporan Keuangan</title>
    <link rel="icon" href="../assets/assets2/img/logo1.png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fontbit.io/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://raw.githubusercontent.com/umarhadi/goenkrip/main/assets/assets2/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/index.php">
                <div class="sidebar-brand-icon">
                    <img src="../assets/assets2/img/logo1.png" width="35" height="35">
                </div>
                <div class="sidebar-brand-text mx-3">GoEnkrip</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                File
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="enkripsi.php" aria-expanded="true">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Enkripsi</span>
                </a>

                <a class="nav-link collapsed" href="dekripsi.php" aria-expanded="true">
                    <i class="fas fa-fw fa-lock-open"></i>
                    <span>Dekripsi</span>
                </a>

                <a class="nav-link collapsed" href="file.php" aria-expanded="true">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Laporan Keuangan</span>
                </a>
                <hr class="sidebar-divider">
            </li>
            <div class="sidebar-heading">
                Info
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="tentang.php" aria-expanded="true">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Tentang Aplikasi</span>
                </a>
                <a class="nav-link collapsed" href="bantuan.php" aria-expanded="true">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>Bantuan</span>
                </a>
                <hr class="sidebar-divider">
            </li>
            <div class="sidebar-heading">
                Sign Out
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt fa-sm"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pastikan data yang sudah anda proses telah disimpan!</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                    <a class="btn btn-primary" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1 class="h4 mb-0 ml-2 text-gray-800">Implementasi Metode Enkripsi AES 128 Bit pada Data Laporan Keuangan</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['fullname']; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            </li>

                    </ul>

                
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <!-- <div class="alert alert-success" role="alert">
                        <i><img src="../assets/assets2/img/logo1.png" class="mb-1 mr-2" width="25"></i>
                        Implementasi Metode Enkripsi AES 128 Bit pada Data Laporan Keuangan - Tentang Aplikasi
                    </div> -->
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tentang Aplikasi</h6>
                            </div>
                            <div class="card-body">
                                <h5>Implementasi Metode Enkripsi AES 128 Bit pada Data Laporan Keuangan</h5>
                                <h6>( Studi Kasus: Kantor Desa Krapyak Triharjo Sleman Yogyakarta )</h6>
                                <br>
                                <p>Implementasi Metode Enkripsi AES 128 Bit pada Data Laporan Keuangan Kantor Desa Krapyak Triharjo Sleman Yogyakarta, bertujuan
                                    untuk meminimalisir penyalahgunaan data rahasia data laporan keuangan oleh pihak yang tidak bertanggungjawab. Metode Enkripsi
                                    AES 128 Bit digunakan untuk mengubah data laporan keuangan menjadi file ciphertext atau file yang sulit untuk dimengerti makna dan isinya.
                                    File yang sudah dienkripsi memiliki sebuah kunci ( key ) yang berfungsi sebagai kunci untuk mendekripsi atau mengubah file seperti semula.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Implementasi Metode Enkripsi AES 128 Bit pada Data Laporan Keuangan 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" ></script>
    <script src="https://raw.githubusercontent.com/umarhadi/goenkrip/main/assets/js/essential-plugins.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js"></script>
    <script src="https://raw.githubusercontent.com/umarhadi/goenkrip/main/assets/js/main.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://raw.githubusercontent.com/umarhadi/goenkrip/main/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://raw.githubusercontent.com/umarhadi/goenkrip/main/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="https://raw.githubusercontent.com/umarhadi/goenkrip/main/js/demo/chart-area-demo.js"></script>
    <script src="https://raw.githubusercontent.com/umarhadi/goenkrip/main/js/demo/chart-pie-demo.js"></script>

</body>

</html>