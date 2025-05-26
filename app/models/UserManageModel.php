<?php
require_once __DIR__ . '/../config/db.php';

class UserManageModel {
    // Find user by email - returns assoc array or null
    public static function findByEmail($email) {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();  // returns user data array or null if not found
    }

    // Other methods (optional)
    public static function getAll() {
        $conn = connectDB();
        return $conn->query("SELECT * FROM users ORDER BY id ASC");
    }

    public static function getById($id) {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function update($id, $name, $email, $role) {
        $conn = connectDB();
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $role, $id);
        $stmt->execute();
    }

    public static function delete($id) {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
