<?php

class Subscriber {
    public static function save($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $file = fopen(__DIR__ . '/../../subscribed_emails.txt', 'a');
        
        if ($file) {
            fwrite($file, $email . PHP_EOL);
            fclose($file);
            return true;
        }

        return false;
    }
}
