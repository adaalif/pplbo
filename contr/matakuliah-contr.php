<?php
require_once 'model/matakuliah-model.php';

class MataKuliahController {
    private $model;

    public function __construct() {
        $this->model = new matakuliah();
    }

    public function checkLoginSession() {
        session_start();
        if (!isset($_SESSION["nim"])) {
            header("Location: index.html");
            exit();
        }
    }

    public function validateStudent() {
        $nim = $_SESSION["nim"];
        return $this->model->validateStudent($nim);
    }

    public function getClassData() {
        return $this->model->getMataKuliah();
    }

    public function showPilihMataKuliah() {
        $mata_kuliah = $this->model->getMataKuliah();
        include 'pilih_mata_kuliah.php'; // Tampilan pemilihan mata kuliah
    }

    // Memproses pemilihan mata kuliah
    public function processPilihMataKuliah($selected_kelas) {
        // Lakukan operasi lain sesuai kebutuhan, seperti menyimpan pilihan mata kuliah ke database
        // Disini hanya contoh sederhana
        echo "Anda memilih kelas dengan kode: " . $selected_kelas;
    }
}
?>
