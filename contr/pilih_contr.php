<?php
session_start(); // Mulai sesi

require_once '../model/matakuliah-model.php';
$controller = new Mahasiswa_Model(); // Sesuaikan dengan nama controller Anda

$controller->checkLoginSession();

if(isset($_POST['submit']) && isset($_POST['pilihan_kelas'])) {
    $selected_kelas = $_POST['pilihan_kelas'];

    $nim = $_SESSION['nim'];
    foreach ($selected_kelas as $kode_kelas) {
        foreach ($selected_kelas as $kode_kelas) {
            if($controller->cekPilihanMataKuliah($kode_kelas, $nim)){
                echo "<script>alert('Anda sudah memilih mata kuliah ini');</script>";
                echo "<script>window.location.replace('../view/pilih_mk.php');</script>";
            } else {
                $controller->pilihMataKuliah($kode_kelas, $nim);
                echo "<script>alert('Pemilihan kelas berhasil');</script>";
                echo "<script>window.location.replace('../view/pilih_mk.php');</script>";
            }
        }
        
    }

    
    exit();
} else {
    header("Location: mata_kuliah.php");
    exit();
}
?>
