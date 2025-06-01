<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';
include 'quey.php';

if (!isset($_SESSION['login']['status']) || $_SESSION['login']['status'] !== true || ($_SESSION['login']['level'] !== 'admin')) {
    header("Location: /tugas akhir/login.php?");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <!-- swal -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script type="text/javascript" src="instascan.min.js"></script>

</head>

<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Absen</h1>


        <!-- DataTales user -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Absen</h6>
                <!-- <a href="/tugas akhir/admin/scan.php" class="btn btn-primary mt-2">Absen</a> -->

                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                    Scan Member
                </button>
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModalInput">
                    Input Member
                </button>

                <!-- modal scan -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Absen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="wrapper">
                                    <div class="scanner"></div>
                                    <video id="preview"></video>
                                </div>


                                <form action="../tambah/storeAbsen.php" method="POST" id="form">


                                    <input type="hidden" name="id_member" id="member_id">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal input -->
                <div class="modal fade" id="exampleModalInput" tabindex="-1" aria-labelledby="exampleModalLabelInput" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Input member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../tambah/storeAbsen_input.php" method="post">

                                    <!-- <input type="hidden" name="id_member" id="member_id"> -->
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">ID member</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="id_member">
                                            <?php while ($member = mysqli_fetch_array($dataMember)) {
                                            ?>
                                                <option><?php echo $member['id_member']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <button type="sumbit" class="btn btn-primary">Absen</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID member</th>
                                <th>Nama lengkap</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // session_start();
                            $no = 1;
                            while ($absen = mysqli_fetch_array($dataAbsen)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $absen['id_member']; ?></td>
                                    <td><?php echo $absen['Nama_lengkap']; ?></td>
                                    <td><?php echo $absen['tanggal']; ?></td>
                                    <td class="d-flex">

                                        <a href="../hapus/deleteabsen.php?id=<?php echo $absen['id_absen']; ?>" class="btn btn-danger mx-2 alert_notif">hapus absen</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <!-- scan qr -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
        scanner.addListener('scan', function(c) {
            document.getElementById('member_id').value = c;
            document.getElementById('form').submit();
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

</body>

</html>