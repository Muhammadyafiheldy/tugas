<?php

include 'C:/laragon/www/tugas akhir/koneksi.php';
include 'quey.php';

if (!isset($_SESSION['login']['status']) || $_SESSION['login']['status'] !== true || ($_SESSION['login']['level'] !== 'admin artikel')) {
    header("Location: /tugas akhir/login.php?");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>artikel</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Artikel</h1>


        <!-- DataTales user -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables artikel</h6>
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">Tambah artikel</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah artikel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../tambah/storeArtikel.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="judul" class="col-form-label">Judul:</label>
                                        <input type="text" class="form-control" id="judul" name="judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="isi" class="col-form-label">Isi:</label>
                                        <textarea class="form-control" id="isi" name="isi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kategori</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                            <option>info</option>
                                            <option>tips and trik</option>
                                            <option>tutorial</option>
                                            <option>olahraga</option>
                                            <option>nutrisi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Gambar</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
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
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>kategori</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // session_start();

                            $no = 1;
                            while ($artikel = mysqli_fetch_array($dataArtikel)) {
                                $isi = $artikel['isi'];
                                if (strlen($isi) > 100) {
                                    $excerpt = substr($isi, 0, strrpos(substr($isi, 0, 50), ' ')) . '...';
                                } else {
                                    $excerpt = $isi;
                                }
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $artikel['judul']; ?></td>
                                    <td><?php echo $excerpt; ?></td>
                                    <td><?php echo $artikel['date']; ?></td>
                                    <td><?php echo $artikel['kategori']; ?></td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?php echo $artikel['id_artikel']; ?>">Edit</a>
                                        <a href="../hapus/deleteArtikel.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-danger mx-2 alert_notif">hapus</a>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal<?php echo $artikel['id_artikel']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit artikel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                            <div class="modal-body">
                                                <form action="../edit/editArtikel.php" method="post">
                                                <input type="hidden" name="id_artikel" value="<?php echo $artikel['id_artikel']; ?>">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Judul artikel</label>
                                                        <input type="text" class="form-control" name="judul" value="<?php echo $artikel['judul']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Isi artikel</label>
                                                        <textarea class="form-control" rows="5" name="isi"><?php echo $artikel['isi']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Kategori</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                                            <option><?php echo $artikel['kategori']; ?></option>

                                                            <option>tips and trik</option>
                                                            <option>tutorial</option>
                                                            <option>olahraga</option>
                                                            <option>nutrisi</option>
                                                        </select>
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