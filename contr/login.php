<?php 

class Login extends Controller{
	public function index(){
		$this->view('login/index');
	}
    public function login_contr(){
        $this->contr('login_contr');
    }
    public function login_dosen(){
		$this->view('login/login_dosen');
	}
}