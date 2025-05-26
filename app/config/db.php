<?php
function connectDB() {
    $host = "localhost";
    $username = "root";
    $password = ""; // default XAMPP password
    $dbname = "heathymeals"; // 🔁 CHANGE THIS

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
