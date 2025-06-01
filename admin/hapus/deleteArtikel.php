// Mengimpor file koneksi ke database
<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';
session_start();

$id = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM artikel WHERE id_artikel = '$id'"; // Tambahkan tanda kutip pada $nidn
    $result = mysqli_query($koneksi, $query);
    $_SESSION['hapus']= 'Data Berhasil di hapus';
    header("location:../layout/layoutside.php?page=artikel");

?>