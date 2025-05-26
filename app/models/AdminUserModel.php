<?php
require_once __DIR__ . '/../config/db.php';

class AdminUserModel {
    public static function getAll() {
        $conn = connectDB();
        $result = $conn->query("SELECT * FROM users ORDER BY id ASC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($id) {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function delete($id) {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function update($id, $name, $email, $role) {
        $conn = connectDB();
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $role, $id);
        return $stmt->execute();
    }
}
