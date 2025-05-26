<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/UserManageModel.php';


class AdminUserController {
    public function manageUsers() {
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: login.php");
            exit();
        }

        if (isset($_GET['delete'])) {
            UserManageModel::delete((int)$_GET['delete']);
            header("Location: manage_users.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_user'])) {
            UserManageModel::update(
                $_POST['user_id'],
                $_POST['name'],
                $_POST['email'],
                $_POST['role']
            );
            header("Location: manage_users.php");
            exit();
        }

        $users = UserManageModel::getAll();
        $editUser = null;

        if (isset($_GET['edit'])) {
            $editUser = UserManageModel::getById((int)$_GET['edit']);
        }

        include __DIR__ . '/../views/manage_users_view.php';
    }
}
