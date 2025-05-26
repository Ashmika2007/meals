<?php
require_once __DIR__ . '/../models/UserManageModel.php';
require_once __DIR__ . '/../config/db.php';

class AuthController {
    public function login() {
        session_start();

        $error = null;  // To pass error messages to the view if needed

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = UserManageModel::findByEmail($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['role'] = $user['role'];

                    if ($user['role'] === 'admin') {
                        header("Location: admin_dashboard.php");
                    } else {
                        header("Location: customer_dashboard.php");
                    }
                    exit;
                } else {
                    $error = "Incorrect password.";
                }
            } else {
                $error = "User not found.";
            }
        }

        // Pass error to the login view (adjust your view code accordingly)
        include __DIR__ . '/../views/login_view.php';
    }
}
