<?php
session_start();
require_once '../core/contr.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);

    $controller = new RegisterController();
    $result = $controller->registerUser($nim, $password, $confirm_password);
    echo "<script>alert('$result');</script>";
    echo "<script>window.location.replace('register.html');</script>";
} else {
    // Redirect to register.php if it's not a POST request
    header("Location: register.html");
    exit;
}
?>
