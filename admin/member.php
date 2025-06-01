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
    <title>Member</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">User</h1>


<!-- DataTales user -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama lengkap</th>
                        <th>Member ID</th>
                        <th>QR code</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Tanggal membership</th>
                        <th>Tanggal berakhir</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                // session_start();
              
                            $no = 1;
                            while ($member = mysqli_fetch_array($dataMember)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $member['Nama_lengkap']; ?></td>
                                    <td><?php echo $member['id_member']; ?></td>
                                    <td><?php
                                    $kode = "member".$member['id_member'];
                                    require_once('../../phpqrcode/qrlib.php');
                                    $filePath = "kode".$member['id_member'].".png";
                                    QRcode::png($kode, $filePath, "M", 2, 2);
                                    ?>
                                    <img src="<?php echo $filePath; ?>" alt="kode">
                                    </td>
                                    <td><?php echo $member['Alamat_member']; ?></td>
                                    <td><?php echo $member['No_HP']; ?></td>
                                    <td><?php echo $member['current_date']; ?></td>
                                    <td><?php echo $member['expired_at']; ?></td>
                                    <td >
                                    <a href="../hapus/deleteMember.php?id=<?php echo $member['id_member']; ?>" class="btn btn-warning  alert_notif">hapus member</a>
                                    </td>
                                </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</body>
</html>