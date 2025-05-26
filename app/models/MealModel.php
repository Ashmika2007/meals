<?php
require_once __DIR__ . '/../config/db.php';

class MealModel {
    public static function getAll() {
        $conn = connectDB();
        $result = $conn->query("SELECT * FROM meals ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function addMeal($title, $description, $category, $price, $image) {
        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO meals (title, description, category, price, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssds", $title, $description, $category, $price, $image);
        return $stmt->execute();
    }

    public static function deleteMeal($id) {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM meals WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
