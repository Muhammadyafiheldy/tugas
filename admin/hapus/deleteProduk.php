// Mengimpor file koneksi ke database
<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';
session_start();

$id = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM produk WHERE id_produk = '$id'"; // Tambahkan tanda kutip pada $nidn
    $result = mysqli_query($koneksi, $query);
    $_SESSION['hapus']= 'Data Berhasil di hapus';
    header("location:../layout/layoutside.php?page=produk");

?>