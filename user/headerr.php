<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){

session_start();
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- swiper js -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    html,
    body {
      position: relative;
      height: 100%;
      font-family: 'Poppins', sans-serif;

    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>

</head>

<body>

  <!-- navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-20 border-b border-gray-200">
    <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">

      <!-- Navbar Start -->
      <div class="flex items-center space-x-4">
        <button type="button" class="lg:hidden p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300">
          <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </button>
        <a href="headerr.php?page=home" class="flex items-center space-x-3">
          <!-- <img src="../img/logo.jpeg" class="h-10 w-10 rounded-full" alt="Logo"> -->
          <!-- edit yang dibawah ini -->
          <span class="text-xl font-bold text-blue-500">belajarbersama</span>
        </a>
      </div>

      <!-- Navbar Center (Hidden on mobile) -->
      <div class="hidden lg:flex space-x-6 items-center">
        <a href="index.php"
          class="<?= ($activePage == 'home') ? 'text-blue-600 font-bold' : 'text-gray-500' ?>">Beranda</a>
        <a href="kelas.php"
          class="<?= ($activePage == 'kelas') ? 'text-blue-600 font-bold' : 'text-gray-500' ?>">Kelas</a>
        <a href="tentangkami.php"
          class="<?= ($activePage == 'tentang-kami') ? 'text-blue-600 font-bold' : 'text-gray-500' ?>">Tentang Kami</a>
        <a href="artikel.php"
          class="<?= ($activePage == 'artikel') ? 'text-blue-600 font-bold' : 'text-gray-500' ?>">Artikel</a>
        <a href="kontak.php"
          class="<?= ($activePage == 'kontak') ? 'text-blue-600 font-bold' : 'text-gray-500' ?>">Kontak</a>
      </div>

      <!-- Navbar End -->
      <div class="flex items-center space-x-3">
        <?php if (isset($_SESSION['login']['status']) && $_SESSION['login']['status']) : ?>
          <div class="relative group">
            <button class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none">
              <i class="fa-regular fa-user mr-2"></i>
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="absolute right-0 hidden group-hover:block mt-2 bg-white border border-gray-200 rounded-md shadow-lg w-40 z-10">
              <a href="profile.php" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Profile</a>
              <a href="logout.php" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Logout</a>
            </div>
          </div>
        <?php else : ?>
          <a href="../login.php" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Login</a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div class="lg:hidden px-4 pb-4 hidden" id="mobile-menu">
      <a href="headerr.php?page=home" class="block py-2 text-gray-700 hover:text-red-600">Beranda</a>
      <a href="headerr.php?page=kelas" class="block py-2 text-gray-700 hover:text-red-600">Kelas</a>
      <a href="tentangkami.php?page=tentang-kami" class="block py-2 text-gray-700 hover:text-red-600">Tentang Kami</a>
      <a href="artikel.php?page=artikel" class="block py-2 text-gray-700 hover:text-red-600">Artikel</a>
      <a href="kontak.php?page=kontak" class="block py-2 text-gray-700 hover:text-red-600">Kontak</a>
    </div>
  </nav>

  <!-- end navbar -->



  <!-- konten -->
  <div class="container md:mx-auto">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      switch ($page) {
        case 'home':
          include 'index.php';
          break;
        case 'kelas':
          include 'kelas.php';
          break;
        case 'tentang-kami':
          include 'tentangkami.php';
          break;
        case 'artikel':
          include 'artikel.php';
          break;
        case 'kontak':
          include 'kontak.php';
          break;
        default:
          echo "<center><h3>Maaf halaman tidak ditemukan!</h3></center>";
          break;
      }
    } else {
    }
    ?>
  </div>
  <!-- end konten -->



  <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script> -->
  <!-- swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>