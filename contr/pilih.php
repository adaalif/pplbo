<?php 

class pilih extends Controller{
    public function index(){
        $this->view('mata_kuliah');
    }
    public function pilih_contr(){
        $this->contr('pilih_contr');
    }
}