<?php
// auth.php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

function isLoggedIn() {
  return isset($_SESSION['user_id']);
}

function isAdmin() {
  return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function isCustomer() {
  return isset($_SESSION['role']) && $_SESSION['role'] === 'customer';
}

function requireLogin($role = null) {
  if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
  }

  if ($role === 'admin' && !isAdmin()) {
    header("Location: customer_dashboard.php");
    exit();
  }

  if ($role === 'customer' && !isCustomer()) {
    header("Location: admin_dashboard.php");
    exit();
  }
}
