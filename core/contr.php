<?php
class Controller {
    public function  view($view){
		require_once '../view/' . $view . '.php';
	}
	public function model($model){
		require_once '../model/' . $model . '.php';
		return new $model;
	}
	public function logs(){
		return '..Public/index';
	}    
}

?>
