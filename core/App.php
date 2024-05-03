<?php

class App {
	protected $controller = 'login';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();
        $controllerPath = '../contr/' . $url[0] . '.php';

        // Check if the controller file exists
        if (file_exists($controllerPath)) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Require the controller file
        require_once $controllerPath;
        
        // Instantiate the controller
        $this->controller = new $this->controller;

        // Check for the method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Set params
        $this->params = $url ? array_values($url) : [];

        // Call the controller method with params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }	
    public function parseURL(){
        if( isset($_GET['url']) ){
            $url = rtrim( $_GET['url'], '/' );
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            // If no URL is provided, set default controller and method
            return ['login', 'index'];
        }
    }
    

}