<?php
require_once 'dosen_contr.php';
require_once '../model/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = mysqli_real_escape_string($conn,$_POST["nip"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

    $controller = new Dosen_controller();

    $login_result = $controller->login($nip, $password);

    if ($login_result === true) {
        echo "<script>alert('Login berhasil');</script>"; 
        header("Location: ../view/dashboard_dosen.php"); 
        exit();
    } else {
        echo "<script>alert('Incorrect NIP or password');</script>"; 
        echo "<script>window.location.href = '../view/login_dosen.php';</script>"; 
    }
}
?>
