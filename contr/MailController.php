<?php
require_once '../model/MailModel.php';

class MailController {
    private $mailModel;

    public function __construct() {
        $this->mailModel = new MailModel();
    }

    public function handleRequest() {
        $recipient = "vainqueursa@gmail.com";
        $sender = "From: vainqueursa@gmail.com";
        $message = "";

        if (isset($_POST['send'])) {
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            if (empty($subject) || empty($message)) {
                $message = '<div class="alert alert-danger text-center">All inputs are required!</div>';
            } else {
                $resultMessage = $this->mailModel->sendMail($recipient, $subject, $message, $sender);
                $message = '<div class="alert alert-success text-center">' . $resultMessage . '</div>';
            }
        }

        include '../view/mailForm.php';
    }
}
?>
