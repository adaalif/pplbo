<?php
require_once '../core/Database.php'; 

class Dosen_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($nip, $password) {
        $query = "SELECT nip, password FROM user_dosen WHERE nip = ?";
        $this->db->query($query);
        $this->db->bind(1, $nip);

        $result = $this->db->single();

        if ($result) {
            if ($password === $result['password']) {
                session_start();
                $_SESSION["nip"] = $result['nip'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkNip($nip) {
        $this->db->query("SELECT nip FROM dosen WHERE nip = :nip");
        $this->db->bind(':nip', $nip);
        $this->db->execute();
        $result = $this->db->resultSet();
        return count($result) == 1;
    }

    public function registerDosen($nip, $password) {
        $nip = htmlspecialchars(strip_tags($nip));
        $password = htmlspecialchars(strip_tags($password));

        $checkQuery = "SELECT * FROM dosen WHERE nip=:nip";
        $this->db->query($checkQuery);
        $this->db->bind(':nip', $nip);
        $result = $this->db->single();

        if (!$result) {
            return "NIP tidak ditemukan dalam database";
        }

        $insertQuery = "INSERT INTO dosen (nip, password) VALUES (:nip, :password)";
        $this->db->query($insertQuery);
        $this->db->bind(':nip', $nip);
        $this->db->bind(':password', $password);

        if ($this->db->execute()) {
            return "Berhasil registrasi";
        } else {
            return "Error: " . $this->db->rowCount();
        }
    }

    public function validateDosen($nip) {
        $this->db->query("SELECT nip FROM dosen WHERE nip = :nip");
        $this->db->bind(':nip', $nip);
        $this->db->execute();
        $result = $this->db->resultSet();
        return count($result) == 1;
    }
    public function getAllKelasbyNIP($nip){
        $this->db->query('SELECT waktu, kode_kelas, ruangan, mata_kuliah from kelas
                          WHERE nip = :nip');
        $this->db->bind(':nip', $nip);
        return $this->db->resultSet();
    }
    public function checkLoginSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['nip'])) {
            header("Location: login.php");
            exit();
        }
    }
    public function insertNilai($nim, $kode_kelas, $nilai){
        $this->db->query('INSERT INTO nilai (nilai) VALUES (nilai) where nim = :nim and kode_kelas = :kode_kelas');
        $this->db->bind(':nim', $nim);
        $this->db->bind(':kode_kelas', $kode_kelas);
        $this->db->bind(':nilai', $nilai);

        if($this->db->execute()){
            return true; 
        } else {
            return false; 
        }
    }
    public function getAllStudentsByKodeKelas($kode_kelas) {
        $this->db->query('SELECT nim, nama, nilai FROM nilai WHERE kode_kelas = :kode_kelas');
        $this->db->bind(':kode_kelas', $kode_kelas);
        return $this->db->resultSet();
    }
      
    public function getStudentDataWithNilai() {
        $query = "SELECT d.nim, d.nama, n.nilai 
                  FROM data_kelas_mahasiswa d 
                  LEFT JOIN nilai n ON d.nim = n.nim";
        
        $this->db->query($query);
        
        return $this->db->resultSet();
    }    
    public function getAndUpdateStudentsAndGrades($kode_kelas, $updateData = null) {
        if ($updateData) {
            foreach ($updateData as $nim => $nilai) {
                $this->db->query('UPDATE nilai SET nilai = :nilai WHERE nim = :nim AND kode_kelas = :kode_kelas');
                $this->db->bind(':nim', $nim);
                $this->db->bind(':nilai', $nilai);
                $this->db->bind(':kode_kelas', $kode_kelas);
                $this->db->execute();
            }
        }

        $this->db->query('SELECT nim, nama, nilai FROM nilai WHERE kode_kelas = :kode_kelas');
        $this->db->bind(':kode_kelas', $kode_kelas);
        return $this->db->resultSet();
    }
}
?>