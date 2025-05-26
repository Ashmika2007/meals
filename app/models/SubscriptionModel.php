<?php
require_once __DIR__ . '/../config/db.php';

class SubscriptionModel {
    public static function getAllWithUsers() {
        $conn = connectDB();
        $sql = "SELECT subscriptions.*, users.name, users.email
                FROM subscriptions 
                JOIN users ON subscriptions.user_id = users.id 
                ORDER BY subscriptions.start_date DESC";
        return $conn->query($sql);
    }

    public static function delete($id) {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM subscriptions WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public static function update($id, $plan_type, $status) {
        $conn = connectDB();
        $stmt = $conn->prepare("UPDATE subscriptions SET plan_type = ?, status = ? WHERE id = ?");
        $stmt->bind_param("ssi", $plan_type, $status, $id);
        $stmt->execute();
    }
}
