<?php
session_start();
require_once __DIR__ . '/../models/Subscription.php';
require_once __DIR__ . '/../config/db.php';

class SubscriptionController {
    public function handleRequest() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
            header("Location: login.php");
            exit();
        }

        $error = "";
        $plans = [
            'weekly' => 'Weekly - $59/week',
            'biweekly' => 'Biweekly - $109/every 2 weeks',
            'monthly' => 'Monthly - $209/month'
        ];

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["subscribe"])) {
            $user_id = $_SESSION['user_id'];
            $plan = $_POST["plan"] ?? '';

            if (array_key_exists($plan, $plans)) {
                $success = Subscription::create($user_id, $plan);
                if ($success) {
                    header("Location: view_subscriptions.php");
                    exit();
                } else {
                    $error = "Failed to subscribe.";
                }
            } else {
                $error = "Invalid plan selected.";
            }
        }

        include __DIR__ . '/../views/subscription_view.php';
    }
}
