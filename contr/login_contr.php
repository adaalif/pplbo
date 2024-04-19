<?php
require_once '../model/mahasiswa_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nim = $_POST["nim"];
    $password = $_POST["password"];

    // Buat objek model
    $model = new Mahasiswa_Model();

    // Panggil fungsi login dari model
    $login_result = $model->login($nim, $password);

    // Proses hasil login
    if ($login_result === true) {
        // Redirect ke halaman dashboard jika login berhasil
        header("Location: ../view/dashboard.html");
        exit();
    } else {
        // Tampilkan pesan kesalahan jika login gagal
        echo "<script>alert('Incorrect nim or password');</script>"; 
        echo "<script>window.location.href = 'index.html';</script>"; 
    }
}
?>
