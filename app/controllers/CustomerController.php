<?php
session_start();

class CustomerController {
    public function dashboard() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
            header("Location: login.php");
            exit();
        }

        $customerName = $_SESSION['user_name'];
        include __DIR__ . '/../views/customer_dashboard_view.php';
    }
}
