<?php

class Mahasiswa_Model extends Database {
    public function login($nim, $password) {
        $query = "SELECT nim, password FROM user WHERE nim = ?";
        $this->query($query);
        $this->bind(1, $nim);

        $result = $this->single();

        if ($result) {
            if ($password === $result['password']) {
                session_start();
                $_SESSION["nim"] = $result['nim'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkNim($nim) {
        $this->query("SELECT nim FROM nim WHERE nim = :nim");
        $this->bind(':nim', $nim);
        $this->execute();
        $result = $this->resultSet();
        return count($result) == 1;
    }
    public function checkUserNim($nim) {
        $this->query("SELECT nim FROM user WHERE nim = :nim");
        $this->bind(':nim', $nim);
        $this->execute();
        $result = $this->resultSet();
        return count($result) > 0;
    }    

    public function registerUser($nim, $password) {
        // Sanitize input
        $nim = htmlspecialchars(strip_tags($nim));
        $password = htmlspecialchars(strip_tags($password));
    
        // Check if NIM exists in the mahasiswa table
        if (!$this->checkNim($nim)) {
            return "NIM tidak ditemukan dalam database";
        }
    
        // Check if NIM already exists in the user table
        if ($this->checkUserNim($nim)) {
            return "NIM sudah terdaftar";
        }
    
        // If NIM found in mahasiswa and not in user, proceed with registration
        $insertQuery = "INSERT INTO user (nim, password) VALUES (:nim, :password)";
        $this->query($insertQuery);
        $this->bind(':nim', $nim);
        $this->bind(':password', $password); // Always hash passwords!
    
        if ($this->execute()) {
            return "Berhasil registrasi";
        } else {
            return "Gagal registrasi";
        }
    }
    


    public function validateStudent($nim) {
        $this->query("SELECT nim FROM mahasiswa WHERE nim = :nim");
        $this->bind(':nim', $nim);
        $this->execute();
        $result = $this->resultSet();
        return count($result) == 1;
    }
    public function getNama($nim){
        $this->query('SELECT nama FROM nim WHERE nim=:nim');
        $this->bind(':nim', $nim);
        $result = $this->single();
        return $result['nama'];
    }
    public function getAllMahasiswa($nim) {
        $this->query('SELECT * FROM data_mahasiswa WHERE nim = :nim');
        $this->bind(':nim', $nim); 
        return $this->resultSet();
    }
    
    public function checkLoginSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['nim'])) {
            header("Location: login.php");
            exit();
        }
    }
    public function updateMahasiswa($nim, $tempat_lahir, $tanggal_lahir, $alamat) {
        $this->query('UPDATE data_mahasiswa SET tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir, alamat = :alamat WHERE nim = :nim');
    
        $this->bind(':nim', $nim);
        $this->bind(':tempat_lahir', $tempat_lahir);
        $this->bind(':tanggal_lahir', $tanggal_lahir);
        $this->bind(':alamat', $alamat);
    
        if ($this->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    
    
    
}
?>