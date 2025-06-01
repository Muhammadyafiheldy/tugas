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

</head>

<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Produk</h1>


        <!-- DataTales user -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Produk</h6>
                <!-- <a href="tambah_data_produk.php" class="btn btn-primary mt-2">Tambah produk</a> -->
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">Tambah produk</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../tambah/storeProduk.php" method="post">
                                    <div class="form-group">
                                        <label for="Nama" class="col-form-label">Nama:</label>
                                        <input type="text" class="form-control" id="Nama" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="Masa-berlaku" class="col-form-label">Masa berlaku:</label>
                                        <input type="text" class="form-control" id="Masa-berlaku" name="masa_berlaku">
                                    </div>
                                    <div class="form-group">
                                        <label for="Harga" class="col-form-label">Harga:</label>
                                        <input type="text" class="form-control" id="Harga" name="harga">
                                    </div>
                                    <button type="sumbit" class="btn btn-primary">Tambah</button>
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
                                <th>Nama </th>
                                <th>Masa berlaku</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // session_start();
                            $no = 1;
                            while ($produk = mysqli_fetch_array($dataProduk)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $produk['nama']; ?></td>
                                    <td><?php echo $produk['masa berlaku']; ?></td>
                                    <td><?php echo $produk['harga']; ?></td>
                                    <td class="d-flex">
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?php echo $produk['id_produk']; ?>">Edit</a>
    
                                        <a href="../hapus/deleteProduk.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-danger mx-2 alert_notif">hapus produk</a>
              <a href="transaksi.php?id_produk=<?php echo $row['id_produk']; ?>" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mt-6">Join</a>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal<?php echo $produk['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit produk</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                            <div class="modal-body">
                                                <form action="../edit/editproduk.php" method="post">
                                                <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="<?php echo $produk['nama']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Harga</label>
                                                        <input type="number" class="form-control" name="harga" value="<?php echo $produk['harga']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Masa berlaku</label>
                                                        <input type="number" class="form-control" name="masa_berlaku" value="<?php echo $produk['masa berlaku']; ?>">
                                                    </div>

                                                    
                                                    <button type="sumbit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

</body>

</html>