<?php
class Controller {
    public function  view($view){
		require_once '../view/' . $view . '.php';
	}
	public function model($model){
		require_once '../model/' . $model . '.php';
		return new $model;
	}
	public function contr($controller){
		require_once '../contr/' . $controller . '.php';
		return new $controller;
	}

    
}

?>
