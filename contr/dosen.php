<?php 

class dosen extends Controller{
	public function index(){
		$this->view('login_dosen');
	}
    public function dashboard(){
		$this->view('dashboard_dosen');
	}
	public function jadwal(){
		$this->view('jadwal_mk');
	}
	public function insert_nilai(){
		$this->view('insert_nilai');
	}
	public function nilai_mahasiswa(){
		$this->view('nilai_mahasiswa');
	}
	public function menilai_mahasiswa(){
		$this->view('menilai_mahasiswa');
	}
}