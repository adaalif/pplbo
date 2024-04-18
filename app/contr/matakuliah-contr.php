<?php
require_once 'model/matakuliah-model.php';
require_once 'model/connection.php';
class MataKuliahController {
   
    private $model;

    public function __construct() {
        $this->model = new matakuliah();
    }

    public function checkLoginSession(){
        session_start();
        if(!isset($_SESSION["nim"])) {
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


    public function processPilihMataKuliah($selected_kelas) {
        // Lakukan operasi lain sesuai kebutuhan, seperti menyimpan pilihan mata kuliah ke database
        // Disini hanya contoh sederhana
        echo "Anda memilih kelas dengan kode: " . $selected_kelas;
    }
    public function insertMataKuliah($nim, $nama, $kode_kelas) {
        try {
            $connection = new Connection();
            $conn = $connection->getConnection();
            $stmt = $conn->prepare("INSERT INTO data_kelas_mahasiswa (nim, nama, kode_kelas) VALUES (?,?,?)");
            $stmt->bind_param("sss", $nim, $nama, $kode_kelas);
            // Eksekusi perintah SQL
            $stmt->execute();
            // Periksa apakah penyisipan berhasil
            if ($stmt->affected_rows > 0) {
                // Penyisipan berhasil
                return true;
            } else {
                // Tidak ada baris yang terpengaruh, penyisipan gagal
                return false;
            }
        } catch(mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getName($nim){
        return $this -> model ->getName($nim)
    ;
    }
}
?>