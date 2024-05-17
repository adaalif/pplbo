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
        $this->query("SELECT nim FROM mahasiswa WHERE nim = :nim");
        $this->bind(':nim', $nim);
        $this->execute();
        $result = $this->resultSet();
        return count($result) == 1;
    }

    public function registerUser($nim, $password) {
    $nim = htmlspecialchars(strip_tags($nim));
    $password = htmlspecialchars(strip_tags($password));

    $checkQuery = "SELECT * FROM nim WHERE nim=:nim";
    $this->query($checkQuery);
    $this->bind(':nim', $nim);
    $result = $this->single();

    if (!$result) {
        return "NIM tidak ditemukan dalam database";
    }

    $insertQuery = "INSERT INTO user (nim, password) VALUES (:nim, :password)";
    $this->query($insertQuery);
    $this->bind(':nim', $nim);
    $this->bind(':password', $password);

    if ($this->execute()) {
        return "Berhasil registrasi";
    } else {
        return true;
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