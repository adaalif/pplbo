<?php
session_start();
require_once 'contr/register-contr.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $controller = new RegisterController();
    $result = $controller->registerUser($nim, $password, $confirm_password);
    echo "<script>alert('$result');</script>";
    echo "<script>window.location.replace('register.html');</script>";
} else {
    header("Location: register.html");
    exit;
}
?>
