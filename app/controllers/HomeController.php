<?php
require_once __DIR__ . '/../models/Subscriber.php';


class HomeController {
    public function index() {
        $success = false;

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
            $email = trim($_POST['email']);
            $success = Subscriber::save($email);
        }

        // Load the home view
        include __DIR__ . '/../views/home.php';
    }
}
