<?php
require_once __DIR__ . '/../models/MealModel.php';

class MealAdminController {
    public function manageMeals() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_meal'])) {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $price = $_POST['price'];
            $category = $_POST['category'];
            $image = $_POST['image'];

            MealModel::addMeal($title, $description, $category, $price, $image);
            header("Location: manage_meals.php");
            exit;
        }

        if (isset($_GET['delete'])) {
            MealModel::deleteMeal($_GET['delete']);
            header("Location: manage_meals.php");
            exit;
        }

        $meals = MealModel::getAll();
        include __DIR__ . '/../views/manage_meals_view.php';
    }
}
