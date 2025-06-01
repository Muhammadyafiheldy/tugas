<?php
session_start();
require 'koneksi.php'; // file konfigurasi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
   

    // Buat member
    $query = "INSERT INTO member (id_user, Nama_lengkap, Alamat_member, No_HP) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("isss", $id_user, $nama_lengkap, $alamat, $no_hp);
    $stmt->execute();
}
?>;
