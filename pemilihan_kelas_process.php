<?php
session_start(); // Mulai sesi
require 'model/connection.php';

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION["nim"])) {
    header("Location: index.html"); // Redirect ke halaman login jika belum login
    exit();
}

// Mengambil nim dan nama mahasiswa dari sesi
$nim = $_SESSION["nim"];

// Query untuk memeriksa kecocokan nim dan nama mahasiswa
$sql = "SELECT nim FROM mahasiswa WHERE nim = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nim, $nama_mahasiswa);
$stmt->execute();
$result = $stmt->get_result();

// Memeriksa apakah pengguna memiliki kredensial yang valid
if ($result->num_rows != 1) {
    header("Location: login.php"); // Redirect ke halaman login jika kredensial tidak valid
    exit();
}

// Query untuk mendapatkan data kelas
$sql_kelas = "SELECT kode_kelas, mata_kuliah, dosen_pengampu, waktu FROM kelas_teknik_informatika";
$result_kelas = $conn->query($sql_kelas);

// Menginisialisasi variabel untuk menampung hasil query kelas
$kelas = [];

// Jika data ditemukan, simpan dalam array
if ($result_kelas->num_rows > 0) {
    while($row_kelas = $result_kelas->fetch_assoc()) {
        $kelas[] = $row_kelas;
    }
}

$conn->close();
?>
