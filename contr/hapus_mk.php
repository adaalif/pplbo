<?php
require_once 'Matakuliah_controller.php'; 
class hapus_mk{

    public function index(){
        $controller = new Matakuliah_controller();
    $controller->checkLoginSession();   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nip = $_POST["nip"];
        $password = $_POST["password"];
    
        $controller = new Dosen_controller();

        $login_result = $controller->login($nip, $password);
    
        // Proses hasil login
        if ($login_result === true) {
            echo "<script>alert('Login berhasil');</script>"; 
            header("Location: ../view/dashboard_dosen.php"); 
            exit();
        } else {
            echo "<script>alert('Incorrect NIP or password');</script>"; 
            echo "<script>window.location.href = '../view/login_dosen.php';</script>"; 
        }

}
}
}
?>
