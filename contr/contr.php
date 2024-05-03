<?php
class RegisterController {
    private $model;


    public function registerUser($nim, $password, $confirm_password) {
        if ($password != $confirm_password) {
            return "password tidak sama";
        }

        return $this->model->registerUser($nim, $password);
    }
}
?>
