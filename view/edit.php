<?php
// Panggil file controller
require_once '../contr/Mahasiswa_controller.php';

// Buat objek dari kelas Mahasiswa_controller
$controller = new Mahasiswa_controller();

// Cek session login
$controller->checkLoginSession();

// Jika tidak ada parameter nim yang diberikan, kembalikan ke halaman sebelumnya

// Ambil NIM dari parameter nim
$nim = $_SESSION['nim'];

// Ambil data mahasiswa berdasarkan NIM
$mahasiswa = $controller->getAllMahasiswa($nim);

// Handle form submission for updating student's information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated values from the form
    $newAlamat = $_POST['alamat'];
    $newTempatLahir = $_POST['tempat_lahir'];
    $newTanggalLahir = $_POST['tanggal_lahir'];

    // Update the student's information
    $controller->updateMahasiswa($nim, $newAlamat, $newTempatLahir, $newTanggalLahir);

    // Redirect back to the previous page after updating
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="POST">
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="<?= $mahasiswa['alamat'] ?>"><br>
    
    <label for="tempat_lahir">Tempat Lahir:</label><br>
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $mahasiswa['tempat_lahir'] ?>"><br>
    
    <label for="tanggal_lahir">Tanggal Lahir:</label><br>
    <input type="datetime-local" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('Y-m-d\TH:i', strtotime($mahasiswa['tanggal_lahir'])) ?>"><br><br>
    
    <button type="submit">Update</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
