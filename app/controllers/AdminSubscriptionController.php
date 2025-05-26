<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/SubscriptionModel.php';

class AdminSubscriptionController {
    public function manage() {
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: login.php");
            exit();
        }

        if (isset($_GET['delete'])) {
            SubscriptionModel::delete((int)$_GET['delete']);
            header("Location: view_subscriptions.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            SubscriptionModel::update(
                $_POST['id'],
                $_POST['plan_type'],
                $_POST['status']
            );
            header("Location: view_subscriptions.php");
            exit();
        }

        $result = SubscriptionModel::getAllWithUsers();
        include __DIR__ . '/../views/admin_subscriptions_view.php';
    }
}
