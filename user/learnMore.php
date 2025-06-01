<?php
session_start();
include '../koneksi.php';
include 'headerArtikel.php';

// Ambil ID artikel dari URL
$artikel = $_GET['id'];

// Query untuk mengambil artikel berdasarkan ID
$query = "SELECT * FROM artikel WHERE id_artikel = '$artikel'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Ambil data komentar
$query_komentar = "
    SELECT k.*, u.username 
    FROM komentar k
    JOIN user u ON k.id_user = u.id_user
    WHERE k.id_artikel = ?
    ORDER BY k.tanggal DESC
";
$stmt_komentar = $koneksi->prepare($query_komentar);
$stmt_komentar->bind_param("i", $artikel);
$stmt_komentar->execute();
$result_komentar = $stmt_komentar->get_result();

// Ambil jumlah komentar
$query_jumlah_komentar = "
    SELECT COUNT(*) as jumlah
    FROM komentar
    WHERE id_artikel = ?
";
$stmt_jumlah_komentar = $koneksi->prepare($query_jumlah_komentar);
$stmt_jumlah_komentar->bind_param("i", $artikel);
$stmt_jumlah_komentar->execute();
$result_jumlah_komentar = $stmt_jumlah_komentar->get_result();
$jumlah_komentar = $result_jumlah_komentar->fetch_assoc()['jumlah'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Article</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>
    <div id="wrapper container">
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="headerArtikel.php?page=home">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $data['judul']; ?></li>
                                </ol>

                                <span class="color-orange"><a href="tech-category-01.html" title=""><?php echo $data['kategori']; ?></a></span>
                                <h3><?php echo $data['judul']; ?></h3>
                                <div class="blog-meta big-meta">
                                    <small><a href="tech-single.html" title=""><?php echo $data['date']; ?></a></small>
                                    <small><a href="tech-author.html" title="">by admin</a></small>
                                </div>
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-post-media">
                                <img src="../gambar/<?php echo $data['foto']; ?>" alt="" class="img-fluid">
                            </div>
                            <div class="blog-content">
                                <div class="pp">
                                    <p><?php echo $data['isi']; ?></p>
                                </div>
                            </div>
                        </div>
                        <hr class="invis1">
                        <div class="custombox clearfix">
                            <h4 class="small-title"><?php echo $jumlah_komentar; ?></h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        <?php while ($row = $result_komentar->fetch_assoc()) { ?>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="./images/profile (1).png" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?php echo $row['username']; ?> <small><?php echo $row['tanggal']; ?></small></h4>
                                                    <p><?php echo $row['konten']; ?></p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="invis1">
                        <div class="custombox clearfix">
                            <h4 class="small-title">Leave a Reply</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if (isset($_SESSION['login']['status']) && $_SESSION['login']['status'] === true) : ?>
                                        <form class="form-wrapper" method="post" action="simpan_komentar.php">
                                            <input type="hidden" name="id_artikel" value="<?php echo $artikel; ?>">

                                            <textarea class="form-control" placeholder="Komentar" name="konten"></textarea>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </form>
                                    <?php else : ?>
                                        <p>Anda harus <a class="text-warning" href="../login.php">login</a> untuk memberikan komentar.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="dmtop">Scroll to Top</div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <?php include 'footerArtikel.php'; ?>
</body>

</html>