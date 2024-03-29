<?php
// File: proses_pilih_mata_kuliah.php
require_once 'matakuliah-contr.php';

// Inisialisasi koneksi ke database (sesuaikan dengan kebutuhan Anda)
$conn = new mysqli("localhost", "username", "password", "database");

// Buat objek dari kelas MataKuliahController
$controller = new MataKuliahController($conn);

// Proses pemilihan mata kuliah
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_kelas = $_POST['mata_kuliah'];
    $controller->processPilihMataKuliah($selected_kelas);
} else {
    header("Location: pilih_mk.php"); // Redirect jika bukan request POST
}
?>
