<?php
session_start();

class AdminController {
    public function dashboard() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: login.php");
            exit();
        }

        // You can pass data here if needed in future
        $adminName = $_SESSION['user_name'];

        include __DIR__ . '/../views/admin_dashboard_view.php';
    }
}
