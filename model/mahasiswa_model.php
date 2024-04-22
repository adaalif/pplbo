<?php

class Mahasiswa_Model extends Database {
    public function login($nim, $password) {
        // Prepare query
        $query = "SELECT nim, password FROM user WHERE nim = ?";
        $this->query($query);
        $this->bind(1, $nim);

        // Execute query
        $result = $this->single();

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
        $this->query("SELECT nim FROM mahasiswa WHERE nim = :nim");
        $this->bind(':nim', $nim);
        $this->execute();
        $result = $this->resultSet();
        return count($result) == 1;
    }

    public function registerUser($nim, $password) {
        $nim = htmlspecialchars(strip_tags($nim));
        $password = htmlspecialchars(strip_tags($password));

        $checkQuery = "SELECT * FROM mahasiswa WHERE nim=:nim";
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
            return "Error: " . $this->rowCount();
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
        return $result['nama_mahasiswa'];
    }
    
}
?>
