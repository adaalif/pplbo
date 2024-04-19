<?php
class RegisterController {
    private $model;


    public function registerUser($nim, $password, $confirm_password) {
        if ($password != $confirm_password) {
            return "password tidak sama";
            echo "<script>window.location.replace('register.html');</script>";
        }

        return $this->model->registerUser($nim, $password);
    }
}
?>
