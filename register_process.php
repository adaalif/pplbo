<?php
session_start();
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if nim already exists
    $check_query = "SELECT * FROM nim WHERE list_nim='$nim'";
    $check_akunlain = "SELECT * FROM user WHERE nim='$nim'";
    $result = mysqli_query($conn, $check_query);
    $result_check_akun = mysqli_query($conn, $check_akunlain);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $num_rows = mysqli_num_rows($result);
    $num_rows_akun = mysqli_num_rows($result_check_akun);
    if ($num_rows == 0) {
        echo "<script>alert('nim tidak dalam database');</script>";
        echo "<script>window.location.replace('register.html');</script>";
        exit;
    }
    if ($num_rows_akun > 0) {
        echo "<script>alert('nim sudah terdaftar');</script>";
        echo "<script>window.location.replace('register.html');</script>";
        exit;}
    // Insert user into database
    // Note: Make sure to use a secure hashing algorithm like bcrypt for password hashing
    $insert_query = "INSERT INTO user (nim, password) VALUES ('$nim', '$password')";
    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('berhasil registrasi');</script>";
        echo "<script>window.location.replace('index.html');</script>";
        exit;
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect to register.php if it's not a POST request
    header("Location: register.html");
    exit;
}

mysqli_close($conn);
?>
