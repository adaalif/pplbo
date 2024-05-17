<?php 
require_once '../model/mahasiswa_model.php';

class Mahasiswa_controller extends Controller {

    public function index() {
        $this->view('nilai');
    }

    public function checkNim($nim) {
        $model = new Mahasiswa_Model(); 
        return $model->checkNim($nim); 
    }

    public function registerUser($nim, $password) {
        $model = new Mahasiswa_Model(); 
        return $model->registerUser($nim, $password); 
    }

    public function validateStudent($nim) {
        $model = new Mahasiswa_Model(); 
        return $model->validateStudent($nim); 
    }

    public function login($nim,$password){
        $model = new Mahasiswa_Model(); 
        return $model->login($nim, $password); 
    }
    public function data() {
        $this->view('data');
    }
    public function getAllMahasiswa($nim) {
    
        $model = new Mahasiswa_model();

        return  $model->getAllMahasiswa($nim);

 
    }
    public function checkLoginSession(){
        $model = new Mahasiswa_model();
        return $model->checkLoginSession();
    }
    public function edit (){
        $this->view('edit');
    }
    public function updateMahasiswa() {
        $model = new Mahasiswa_model();
        $model->checkLoginSession();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_SESSION['nim'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];

            $result = $model->updateMahasiswa($nim, $tempat_lahir, $tanggal_lahir, $alamat);
    
            if ($result) {
                echo '<script>alert("Data berhasil diperbarui.");</script>';
                http_response_code(200);
            } else {
                echo '<script>alert("Gagal memperbarui data. Silakan coba lagi.");</script>';
                http_response_code(500);
            }
    
            $this->view('data');
        } else {
            http_response_code(400);
            echo "Permintaan tidak valid.";
        }
    }
}    
?>
