<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';

session_start();

if (isset($_POST['id_artikel']) && isset($_POST['judul']) && isset($_POST['isi']) && isset($_POST['kategori'])) {
    $id_artikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];

    if (!empty($judul) && !empty($isi) && !empty($kategori)) {
        $query = "UPDATE artikel SET judul = '$judul', isi = '$isi', kategori = '$kategori' WHERE id_artikel = '$id_artikel'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $_SESSION['edit'] = 'Berhasil mengupdate data';
            header("location:../layout/layoutside.php?page=artikel");
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error: Pastikan semua field terisi dengan benar.";
    }
} else {
    echo "Error: Data tidak valid.";
}
?>
