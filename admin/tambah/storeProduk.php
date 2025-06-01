<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';

session_start();

$nama = $_POST['nama'];
$masa = $_POST['masa_berlaku'];
$harga = $_POST['harga'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan
$query = "INSERT INTO produk (nama, `masa berlaku`, harga) VALUES ('$nama', '$masa', '$harga')";
$result = mysqli_query($koneksi, $query);

// periksa query apakah ada error
if (!$result) {
    die("Query ini gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    // tampil alert dan akan redirect ke halaman mahasiswa.php

    $_SESSION['sukses'] = 'berhasil tambah';
    header("location:../layout/layoutside.php?page=produk");

}
?>;