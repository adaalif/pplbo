<?php 
$base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

class Login extends Controller{
	public function index(){
		$this->view('index');
	}
	
	public function register(){
		$this->view('register');
	}
    public function login_contr(){
		require_once 'Mahasiswa_controller.php';
		require_once '../model/connection.php';

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
			$nim = mysqli_real_escape_string($conn,$_POST["nim"]);
			$password = mysqli_real_escape_string($conn,$_POST["password"]);
		
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
				echo "<script>alert('Incorrect nim or password');</script>"; 
				echo '<meta http-equiv="refresh" content="2;url=' . htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') . '">';
				exit();
			}
			
		}
		
	
    }

	public function register_contr(){
		require_once 'Mahasiswa_controller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
	if ($password != $confirm_password) {
		echo "password tidak sama";
		$this-> view("index");
	}
	else{
		$model = new Mahasiswa_Model();
		$result = $model->registerUser($nim, $password);
		if($result){
			echo "<script>alert(' berhasil');</script>"; 
			$base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

			echo '<meta http-equiv="refresh" content="2;url=' . htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') . '">';
			exit();

		}
		
		else{
			echo "<script>alert(' gagal');</script>"; 
			$this->view('register');
		
	}
}

} else {
	$this->view('index');

    exit;
}
	}
    public function login_dosen(){
		require_once 'dosen_contr.php'; // Adjust the file path accordingly
require_once '../model/connection.php';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nip = mysqli_real_escape_string($conn,$_POST["nip"]);
			$password = mysqli_real_escape_string($conn,$_POST["password"]);
		
			$controller = new Dosen_controller();
		
			$login_result = $controller->login($nip, $password);
		
			if ($login_result === true) {
				echo "<script>alert('Login berhasil');</script>"; 
				$this->view('dashboard_dosen');

				exit();
			} else {
				echo "<script>alert('Incorrect NIP or password');</script>"; 
				$this->view('login_dosen');
			}
		}
	}
	public function dashboard(){
		$this->view('dashboard');
	}

}