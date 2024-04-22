<?php
require_once 'Matakuliah_controller.php'; // Adjust the file path accordingly
class hapus_mk{

    public function index(){
        $controller = new Matakuliah_controller();
    $controller->checkLoginSession();   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nip = $_POST["nip"];
        $password = $_POST["password"];
    
        // Buat objek controller
        $controller = new Dosen_controller();
    
        // Panggil fungsi login dari controller
        $login_result = $controller->login($nip, $password);
    
        // Proses hasil login
        if ($login_result === true) {
            echo "<script>alert('Login berhasil');</script>"; 
            header("Location: ../view/dashboard_dosen.php"); // Redirect to the dashboard for Dosen
            exit();
        } else {
            // Tampilkan pesan kesalahan jika login gagal
            echo "<script>alert('Incorrect NIP or password');</script>"; 
            echo "<script>window.location.href = '../view/login_dosen.php';</script>"; 
        }

}
}
}
?>
