<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';

session_start();

if (isset($_POST['id_produk']) && isset($_POST['nama']) && isset($_POST['harga']) && isset($_POST['masa_berlaku'])) {
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $masa = $_POST['masa_berlaku'];

    if (!empty($nama) && !empty($harga) && !empty($masa)) {
        $query = "UPDATE produk SET nama = '$nama', harga = '$harga', `masa berlaku` = '$masa' WHERE id_produk = '$id_produk'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $_SESSION['edit'] = 'Berhasil mengupdate data';
            header("location:../layout/layoutside.php?page=produk");
            exit();
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
