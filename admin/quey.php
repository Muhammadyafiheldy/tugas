<?php
include 'C:\laragon\www\tugas akhir\koneksi.php';

// Mengambil jumlah total user
$sql_user = "SELECT COUNT(*) as total_user FROM user";
$result_user = $koneksi->query($sql_user);
$total_user = ($result_user->num_rows > 0) ? $result_user->fetch_assoc()["total_user"] : 0;

// Mengambil jumlah total produk
$sql_produk = "SELECT COUNT(*) as total_produk FROM produk";
$result_produk = $koneksi->query($sql_produk);
$total_produk = ($result_produk->num_rows > 0) ? $result_produk->fetch_assoc()["total_produk"] : 0;

// Mengambil jumlah total member
$sql_member = "SELECT COUNT(*) as total_member FROM member";
$result_member = $koneksi->query($sql_member);
$total_member = ($result_member->num_rows > 0) ? $result_member->fetch_assoc()["total_member"] : 0;

// Mengambil jumlah total artikel
$sql_artikel = "SELECT COUNT(*) as total_artikel FROM artikel";
$result_artikel = $koneksi->query($sql_artikel);
$total_artikel = ($result_artikel->num_rows > 0) ? $result_artikel->fetch_assoc()["total_artikel"] : 0;

// kueri untuk di datatable
$dataUser = mysqli_query($koneksi, "SELECT * from user");
$dataMember = mysqli_query($koneksi, "SELECT * from member");
$dataProduk = mysqli_query($koneksi, "SELECT * from produk");
$dataArtikel = mysqli_query($koneksi, "SELECT * from artikel");
$dataAbsen = mysqli_query($koneksi, " SELECT absen.id_absen, absen.tanggal, member.id_member, member.Nama_lengkap
    FROM absen
    JOIN member ON absen.id_member = member.id_member");


// edit

$koneksi->close();
?>
