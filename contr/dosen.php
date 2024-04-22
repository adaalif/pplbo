<?php 

class dosen extends Controller{
	public function index(){
		$this->view('login_dosen');
	}
    public function dashboard(){
		$this->view('dashboard_dosen.php');
	}
}