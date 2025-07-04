<?php
session_start();

if (!isset($_SESSION['login']['status']) || $_SESSION['login']['status'] !== true || ($_SESSION['login']['level'] !== 'admin' && $_SESSION['login']['level'] !== 'admin artikel')) {
    header("Location: /tugas akhir/login.php?");
    exit();
}
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['login']['username'];
$level = $_SESSION['login']['level'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- datatabel -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- swal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <title>SB Admin 2 - Dashboard</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion custom" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Brother Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="layoutside.php?page=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if ($level === 'admin') { ?>
                <!-- Nav Item - user -->
                <li class="nav-item">
                    <a class="nav-link" href="layoutside.php?page=user">
                        <i class="fas fa-user"></i>
                        <span>User</span></a>
                </li>

                <!-- Nav Item - member -->
                <li class="nav-item">
                    <a class="nav-link" href="layoutside.php?page=member">
                        <i class="fas fa-users"></i>
                        <span>Member</span></a>
                </li>

                <!-- Nav item - produk -->
                <li class="nav-item">
                    <a class="nav-link" href="layoutside.php?page=produk">
                        <i class="fas fa-box"></i>
                        <span>Produk</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="layoutside.php?page=absen">
                    <i class="fas fa-folder-open"></i>                     
                    <span>Absen</span></a>
                </li>
            <?php } ?>


            <?php if ($level === 'admin artikel') {?>
            <!-- artikel -->
            <li class="nav-item">
                <a class="nav-link" href="layoutside.php?page=artikel">
                    <i class="fas fa-newspaper"></i>
                    <span>Artikel</span></a>
            </li>
            <?php }?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <div class="container-fluid">
                    <!-- ambil halaman -->
                    <?php
                    //  include '../admin.php';
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($page) {
                            case 'home':
                                include '../admin.php';
                                break;
                            case 'user':
                                include '../user.php';
                                break;
                            case 'member':
                                include '../member.php';
                                break;
                            case 'produk':
                                include '../produk.php';
                                break;
                            case 'artikel':
                                include '../artikel.php';
                                break;
                            case 'absen':
                                include '../absen.php';
                                break;

                            default:
                             include '../admin.php';
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="/tugas akhir/login.php">Logout</a>
                </div>
            </div>
        </div>

    </div>

    <!-- sukses tambah data -->
    <?php if (@$_SESSION['sukses']) { ?>
       <script>
           Swal.fire({
               icon: 'success',
               title: 'Berhasil',
               text: 'Data berhasil ditambah',
           })
       </script>
   <?php unset($_SESSION['sukses']);
   } ?>
   <!-- edit data -->
    <?php if (@$_SESSION['edit']) { ?>
       <script>
           Swal.fire({
               icon: 'success',
               title: 'Berhasil',
               text: 'Data berhasil ditambah',
           })
       </script>
   <?php unset($_SESSION['edit']);
   } ?>

<!-- hapus data -->
    <?php if (@$_SESSION['hapus']) { ?>
       <script>
           Swal.fire({
               icon: 'success',
               title: 'Berhasil',
               text: 'Data berhasil dihapus',
           })
       </script>
   <?php unset($_SESSION['hapus']);
   } ?>
    <?php if (@$_SESSION['error']) { ?>
       <script>
           Swal.fire({
               icon: 'error',
               title: 'OOPS!',
               text: 'Data tidak ditemukan',
           })
       </script>
   <?php unset($_SESSION['error']);
   } ?>


<script>
        $('.alert_notif').on('click', function() {
            var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            }).then(result => {
                //jika klik ya maka arahkan ke proses.php
                if (result.isConfirmed) {
                    window.location.href = getLink;

                }
            })
            return false;
        });
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <!-- swall -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

</body>

</html>