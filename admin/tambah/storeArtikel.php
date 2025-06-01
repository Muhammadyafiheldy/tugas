<?php
include 'C:/laragon/www/tugas akhir/koneksi.php';

session_start();

// membuat variabel untuk menampung data dari form
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$kategori = $_POST['kategori'];
$foto = $_FILES['foto']['name'];

// cek dlu jika ada gambar jalankan codingan ini
if ($foto) {
    $ekstensi_diperbolehkan = array('png', 'jpg','jpeg');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    // menggabungkan angka acak dengan nama file sebenarnya
    $nama_gambar_baru = $angka_acak . '_' . $foto;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // memindahkan file gambar ke folder gambar
        move_uploaded_file($file_tmp, 'C:/laragon/www/tugas akhir/gambar/' . $nama_gambar_baru);
        // menjalankan query insert
        $query = "INSERT INTO artikel (judul, isi, kategori, foto) VALUES ('$judul', '$isi', '$kategori', '$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {

            $_SESSION['sukses'] = 'berhasil tambah data';
            header("location:../layout/layoutside.php?page=artikel");
            
        }
    } else {
        echo "<script>
        Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'Format gambar tidak sesuai!'
         });
         window.location.href='dosen.php'</script>";
    }
} else {
    $query = "INSERT INTO artikel (judul, isi, kategori) VALUES ('$judul', '$isi', '$kategori')";
    $result = mysqli_query($koneksi, $query);
    // periksa query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        // tampil alert dan akan redirect ke halaman dosen.php
        echo "<script>alert('Data berhasil ditambah.');window.location='dosen.php';</script>";
    }
}
?>
