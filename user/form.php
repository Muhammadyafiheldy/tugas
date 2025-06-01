<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// session_start();

include 'headerr.php';
require '../koneksi.php';
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

?>
     <!-- Main Content -->
  <main class="p-8">
    <section class="container mx-auto px-4">
      <h1 class="text-3xl font-bold text-center mb-8">Membership Registration</h1>
      <form class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto"  method="post">
      <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" />
        <div class="mb-4">
          <label for="name" class="block text-gray-700">Nama lengkap:</label>
          <input type="text" id="nama_lengkap" class="w-full p-2 border border-gray-300 rounded-lg" name="nama_lengkap">
        </div>

        <div class="mb-4">
          <label for="phone" class="block text-gray-700">Phone Number:</label>
          <input type="text" id="phone" class="w-full p-2 border border-gray-300 rounded-lg" name="no_hp">
        </div>

        <div class="mb-4">
          <label for="address" class="block text-gray-700">Address:</label>
          <textarea id="address" class="w-full p-2 border border-gray-300 rounded-lg" name="alamat"></textarea>
        </div>

        <button type="submit" class="bg-blue-900 hover:bg-blue-700 text-white py-2 px-4 rounded">Submit</button>
      </form>
    </section>
  </main>


  <?php
include 'footer.php';
  ?>
</body>
</html>