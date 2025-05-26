<?php
require_once __DIR__ . '/../models/Meal.php';

class MealController {
    public function index() {
        session_start();
        include __DIR__ . '/../../db.php';

        $category = $_GET['category'] ?? 'all';
        $meals = Meal::getMeals($conn, $category);

        include __DIR__ . '/../views/meals_view.php';
    }
}
