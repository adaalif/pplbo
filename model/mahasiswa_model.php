<?php
require_once '../core/Database.php'; // Menggunakan nama file yang sesuai

class Mahasiswa_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function login($nim, $password) {
        // Prepare query
        $query = "SELECT nim, password FROM user WHERE nim = ?";
        $this->db->query($query);
        $this->db->bind(1, $nim);

        // Execute query
        $result = $this->db->single();

        // Check if user exists
        if ($result) {
            // Verify password
            if ($password === $result['password']) {
                // Password is correct
                session_start();
                $_SESSION["nim"] = $result['nim'];
                return true;
            } else {
                // Incorrect password
                return false;
            }
        } else {
            // User not found
            return false;
        }
    }

    public function checkNim($nim) {
        $this->db->query("SELECT nim FROM mahasiswa WHERE nim = :nim");
        $this->db->bind(':nim', $nim);
        $this->db->execute();
        $result = $this->db->resultSet();
        return count($result) == 1;
    }

    public function registerUser($nim, $password) {
        $nim = htmlspecialchars(strip_tags($nim));
        $password = htmlspecialchars(strip_tags($password));

        $checkQuery = "SELECT * FROM mahasiswa WHERE nim=:nim";
        $result = $this->db->single();

        if (!$result) {
            return "NIM tidak ditemukan dalam database";
        }

        $insertQuery = "INSERT INTO user (nim, password) VALUES (:nim, :password)";
        $this->db->query($insertQuery);
        $this->db->bind(':nim', $nim);
        $this->db->bind(':password', $password);

        if ($this->db->execute()) {
            return "Berhasil registrasi";
        } else {
            return "Error: " . $this->db->rowCount();
        }
    }

    public function validateStudent($nim) {
        $this->db->query("SELECT nim FROM mahasiswa WHERE nim = :nim");
        $this->db->bind(':nim', $nim);
        $this->db->execute();
        $result = $this->db->resultSet();
        return count($result) == 1;
    }
    public function getNama($nim){
        $this->db->query('SELECT nama FROM nim WHERE nim=:nim');
        $this->db->bind(':nim', $nim);
        $result = $this->db->single();
        return $result['nama_mahasiswa'];
    }
    
}
?>
