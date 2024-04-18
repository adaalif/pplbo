<?php
require 'Mahasiswa_model.php'; // Masukkan file model

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = new Mahasiswa_model(); // Buat objek model

    $nim = $_POST["nim"];
    $password = $_POST["password"];

    $user = $model->getUserByNim($nim,$password);

    if ($user) {
        if ($password === $user->Password) {
            session_start();
            $_SESSION["nim"] = $nim;
            
            echo "<script>alert('Login Berhasil');</script>"; 
            header("Location: mahasiswa/dashboard.html");
            exit();
        } else {
            // Incorrect password
            $error = "Incorrect password";
            echo "Incorrect password";
        }
    } else {
        // User not found
        $error = "User not found";
    }
}
?>
