<?php
include 'headerr.php';
// session_start();
require_once "../koneksi.php"; // File koneksi ke database

// Pastikan sudah login dengan session yang sudah diset
if (!isset($_SESSION['login']['status']) || $_SESSION['login']['status'] !== true) {
  // Jika tidak login, arahkan ke halaman login atau halaman lainnya
  header("Location: login.php");
  exit();
}

// Ambil id user dari session
$id_user = $_SESSION['id_user'];

// Query untuk mengambil data user yang sedang login
$stmt = $koneksi->prepare("SELECT * FROM User WHERE id_user = ?");
if ($stmt === false) {
  die("Error preparing statement: " . $koneksi->error);
}

// Bind parameter
$stmt->bind_param("i", $id_user);

// Execute statement
$stmt->execute();

// Ambil hasil query
$result = $stmt->get_result();

// Cek jika data ditemukan
if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
} else {
  die("Data user tidak ditemukan.");
}
// Query untuk mengambil data member
$stmt = $koneksi->prepare("SELECT * FROM member WHERE id_user = ?");
if ($stmt === false) {
  die("Error preparing statement: " . $koneksi->error);
}

// Bind parameter
$stmt->bind_param("i", $id_user);

// Execute statement
$stmt->execute();

// Ambil hasil query
$result = $stmt->get_result();

// Cek jika data member ditemukan
if ($result->num_rows > 0) {
  $member = $result->fetch_assoc();
  $is_member = true;
} else {
  $is_member = false;
}

// Tutup statement
$stmt->close();

// Tutup koneksi
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
  <div class="container mx-auto px-4 mt-4" id="content">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full md:w-1/3 px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
          <div class="bg-gray-100 px-4 py-2">
            <h2 class="font-semibold text-lg">Profile Picture</h2>
          </div>
          <div class="px-4 py-4 text-center">
            <img class="inline-block h-40 w-40 rounded-full" src="./images/profile (1).png" alt="foto profile" />
          </div>
        </div>
      </div>
      <div class="w-full md:w-2/3 px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
          <div class="bg-gray-100 px-4 py-2">
            <h2 class="font-semibold text-lg">Detail akun</h2>
          </div>
          <div class="px-4 py-4">
            <form>
              <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="NIk">Username</label>
                <input class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="NIk" type="text" value="<?php echo $user['username']; ?>" readonly />
              </div>
              <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="Nama_lengkap">Email</label>
                <input class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="Nama_lengkap" type="text" value="<?php echo $user['email']; ?>" readonly />
              </div>



              <a type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="editProfile.php">
                Edit profile
              </a>
            </form>
          </div>
        </div>
      </div>

      <div class="w-full px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
          <div class="bg-gray-100 px-4 py-2">
            <h2 class="font-semibold text-lg">Detail Membership</h2>
          </div>
          <div class="px-4 py-4">
            <?php if ($is_member) : ?>
              <div class="mb-4 flex items-center">
                <div class="mr-4">
                  <h4 class="block text-sm font-bold text-gray-700">Member ID</h4>
                  <p class="mt-1 block"><?php echo $member['id_member']; ?></p>
                  <div class="mr-4 mt-4">
                    <h4 class="block text-sm font-bold text-gray-700">Nama Lengkap</h4>
                    <p class="mt-1 block"><?php echo $member['Nama_lengkap']; ?></p>
                  </div>
                </div>
                <div>
                  <h4 class="block text-sm font-bold text-gray-700">Barcode</h4>
                  <?php
                  $kode = "member" . $member['id_member'];
                  require_once('../phpqrcode/qrlib.php');
                  $filePath = "kode" . $member['id_member'] . ".png";
                  QRcode::png($kode, $filePath, "M", 1, 1);
                  ?>
                  <img src="<?php echo $filePath; ?>" alt="kode" class="mt-1 block w-24">
                </div>
              </div>
              <a href="../user/cetakPdf.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cetak pdf
              </a>
            <?php else : ?>
              <div class="mb-4">
                <a href="../user/headerr.php?page=membership" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Daftar Member
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>