<?php 

class Login extends Controller{
	public function index(){
		$this->view('index');
	}
    public function login_contr(){
		require_once 'mahasiswa_contr.php';

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Ambil data dari form
			$nim = $_POST["nim"];
			$password = $_POST["password"];
		
			// Buat objek model
			$controller = new Mahasiswa_controller();
		
			// Panggil fungsi login dari model
			$login_result = $controller->login($nim, $password);
		
			// Proses hasil login
			if ($login_result === true) {
				echo "<script>alert('Login berhasil');</script>"; 
				$this->view('dashboard');
				exit();
			} else {
				// Tampilkan pesan kesalahan jika login gagal
				echo "<script>alert('Incorrect nim or password');</script>"; 
				$this->view('index');
			}
		}
		
		
    }
    public function login_dosen(){

	}
	public function dashboard(){
		$this->view('dashboard');
	}

}