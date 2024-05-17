<?php 
require_once '../model/matakuliah-model.php';

class Matakuliah_controller extends Controller{
    private $model;

    public function __construct() {
        $this->model = new Matakuliah_model();
    }
    public function index() {
        $this->view('mata_kuliah');
    }
    public function pilih_mk() {
        $this->view('pilih_mk');
    }
    public function pilih_mk_contr(){
        require_once '../model/matakuliah-model.php';
        require_once '../model/mahasiswa_model.php';
    $controller = new Matakuliah_model(); 
    $mahasiswa = new Mahasiswa_model();
    $controller->checkLoginSession();

    if(isset($_POST['submit']) && isset($_POST['pilihan_kelas'])) {
        $selected_kelas = $_POST['pilihan_kelas'];

        $nim = $_SESSION['nim'];
        foreach ($selected_kelas as $kode_kelas) {
        
                if($controller->cekPilihanMataKuliah($kode_kelas, $nim)){
                    echo "<script>alert('Anda sudah memilih mata kuliah ini');</script>";
                    $this-> view('pilih_mk');
                } else {
                    $controller->pilihMataKuliah($kode_kelas, $nim);
                    $nama = $mahasiswa -> getNama($nim);
                    $controller->insertMahasiswa($nama,$nim,$kode_kelas);
                    echo "<script>alert('Pemilihan kelas berhasil');</script>";
                    $this-> view('pilih_mk');
                
            }
           
            
        }
    } else {
        $this->view('pilih_mk');
    }
    }
    public function hapus_mk(){
            $controller = new Matakuliah_model();
        $controller->checkLoginSession();
            
            // Buat objek model
            $model = new Matakuliah_model();
            if(isset($_POST['submit']) && isset($_POST['kode_kelas']) && !empty($_POST['kode_kelas'])){
                $kode_kelas_terpilih = $_POST['kode_kelas'];
                $nim = $_SESSION['nim'];
                
                foreach($kode_kelas_terpilih as $kode_kelas){
                    $model->hapusMataKuliah($kode_kelas, $nim);
                        
                }
                
                $this->view('mata_kuliah');
            } else {
                $this->view('mata_kuliah');            }
        }
    public function getAllKelas() {
        return $this->model->getAllKelas();
    }
    public function getAllKelasbyNIM($nim) {
        return $this->model->getAllKelasbyNIM($nim);
    }

    public function getKelasByKodeKelas($kode_kelas) {
        return $this->model->getKelasByKodeKelas($kode_kelas);
    }
    public function getUniqueTipes(){
        return $this->model->getUniqueTipes();
    }

}
?>
