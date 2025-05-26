<?php
class Subscription {
    public static function create($user_id, $plan) {
        require __DIR__ . '/../config/db.php';
        $stmt = $conn->prepare("INSERT INTO subscriptions (user_id, plan_type, status) VALUES (?, ?, 'active')");
        $stmt->bind_param("is", $user_id, $plan);
        return $stmt->execute();
    }
}
