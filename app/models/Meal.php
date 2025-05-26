<?php

class Meal {
    public static function getMeals($conn, $category) {
        if ($category === 'all') {
            $stmt = $conn->prepare("SELECT * FROM meals ORDER BY id DESC");
        } else {
            $stmt = $conn->prepare("SELECT * FROM meals WHERE category = ? ORDER BY id DESC");
            $stmt->bind_param("s", $category);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $meals = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $meals;
    }
}
