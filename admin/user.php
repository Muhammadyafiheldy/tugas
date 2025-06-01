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
    <title>User</title>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>level</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                // session_start();
              
                            $no = 1;
                            while ($user = mysqli_fetch_array($dataUser)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['level']; ?></td>

                                    

                                    

                                       
                            
                                </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</body>
</html>