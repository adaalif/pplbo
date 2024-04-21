<?php 

class dosen extends Controller{
	public function index(){
		$this->view('login_dosen');
	}
    public function login_contr(){
        $this->contr('login_dosen_contr');
    }
    public function dashboard(){
		$this->view('dashboard_dosen.php');
	}
}