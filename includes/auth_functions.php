<?php
// includes/auth_functions.php

session_start();

function login($username, $password) {
    global $users_file;
    $user = get_user_by_username($username);
    
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = $user['name'];
        return true;
    }
    return false;
}

function logout() {
    session_unset();
    session_destroy();
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin() {
    return is_logged_in() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function require_login() {
    if (!is_logged_in()) {
        header("Location: index.php?page=login");
        exit;
    }
}

function require_admin() {
    require_login();
    if (!is_admin()) {
        die("Access Denied: You do not have permission to view this page.");
    }
}
?>
