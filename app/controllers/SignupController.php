<?php
require_once __DIR__ . '/../models/User.php';

class SignupController {
    protected $conn;

    // Constructor to receive DB connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function showSignup() {
        $success = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Check if email already exists
            if (User::emailExists($this->conn, $email)) {
                $error = "Email already exists.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Create user
                if (User::create($this->conn, $name, $email, $hashedPassword)) {
                    $success = "Account created successfully!";
                } else {
                    $error = "Error occurred while registering.";
                }
            }
        }

        // Pass $success and $error to the view (you may want to adjust how you handle this)
        include __DIR__ . '/../views/signup_view.php';
    }
}
