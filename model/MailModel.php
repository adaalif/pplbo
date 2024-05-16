<?php
class MailModel {
    public function sendMail($recipient, $subject, $message, $sender) {
        if (mail($recipient, $subject, $message, $sender)) {
            return "Pesan sudah dikirim ke admin";
        } else {
            return "Mengirim pesan gagal!";
        }
    }
}
?>
