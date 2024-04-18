<?php
session_start(); // Mulai sesi

require '../contr/matakuliah-contr.php';

$controller = new MataKuliahController();

// Periksa apakah nim telah diset dalam sesi
if (!isset($_SESSION['nim'])) {
    // Jika tidak, alihkan pengguna ke halaman index.html
    header("Location: index.html");
    exit(); // Hentikan eksekusi skrip
}

$nim = $_SESSION['nim'];

// Periksa apakah data yang diperlukan telah dipost
if (isset($_POST['submit']) && isset($_POST['pilihan_kelas'])) {
    // Tangkap data yang dipost
    $selected_kelas = $_POST['pilihan_kelas'];

    // Dapatkan nama mahasiswa
    $nama = $controller->getName($nim);

    // Loop melalui setiap kelas yang dipilih
    foreach ($selected_kelas as $kode_kelas) {
        // Masukkan mata kuliah untuk mahasiswa
        $controller->insertMataKuliah($nim, $nama, $kode_kelas);
    }

echo "<script>alert('Berhasil memilih mata kuliah'); window.location.href = 'dashboard.html';</script>"; 
exit(); 

} else {
    header("Location: mata_kuliah.php");
    exit();
}
?>
