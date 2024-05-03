<?php 
require_once '../model/mahasiswa_model.php';

class Mahasiswa_controller extends Controller {

    public function index() {
        $this->view('nilai');
    }

    public function checkNim($nim) {
        $model = new Mahasiswa_Model(); // Buat objek model
        return $model->checkNim($nim); // Panggil fungsi dari model
    }

    public function registerUser($nim, $password) {
        $model = new Mahasiswa_Model(); // Buat objek model
        return $model->registerUser($nim, $password); // Panggil fungsi dari model
    }

    public function validateStudent($nim) {
        $model = new Mahasiswa_Model(); // Buat objek model
        return $model->validateStudent($nim); // Panggil fungsi dari model
    }

    public function login($nim,$password){
        $model = new Mahasiswa_Model(); // Buat objek model
        return $model->login($nim, $password); // Panggil fungsi dari model
    }
    public function data() {
        $this->view('data');
    }
    public function getAllMahasiswa($nim) {
        // Buat objek model
        $model = new Mahasiswa_model();

        return  $model->getAllMahasiswa($nim);

        // Jika berhasil me
    }
    public function checkLoginSession(){
        $model = new Mahasiswa_model();
        return $model->checkLoginSession();
    }
    public function edit (){
        $this->view('edit');
    }
    public function updateMahasiswa() {
        // Periksa apakah data telah dikirim melalui metode POST
        $model = new Mahasiswa_model();
        $model->checkLoginSession();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve data from the form
            $nim = $_SESSION['nim'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
    
            // Call the updateMahasiswa function
            $result = $model->updateMahasiswa($nim, $tempat_lahir, $tanggal_lahir, $alamat);
            
            if ($result) {
                http_response_code(200);
                echo "Perubahan berhasil disimpan ke database!";
            } else {
                http_response_code(500);
                echo "Gagal menyimpan perubahan data mahasiswa.";
            }
        } else {
            // Kirim respons ke klien jika terjadi kesalahan
            http_response_code(400);
            echo "Permintaan tidak valid.";
        }
    }
    
    }
?>
