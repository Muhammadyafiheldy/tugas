<?php
// proses_absen.php
session_start();
include 'C:/laragon/www/tugas akhir/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_member = $_POST['id_member'];

    // Validasi ID member
    $query = "SELECT COUNT(*) as count FROM member WHERE id_member = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $id_member);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Masukkan data absen ke tabel absen
        $query = "INSERT INTO absen (id_member, tanggal) VALUES (?, NOW())";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $id_member);
        $stmt->execute();
        $_SESSION['sukses'] = 'berhasil tambah data';
        header("location:../layout/layoutside.php?page=absen");
        // echo "Absen berhasil.";

    } else {
        $_SESSION['error'] = 'berhasil tambah data';
        header("location:../layout/layoutside.php?page=absen");
    }
}
?>
