<?php
// index.php

require_once 'config/data.php';
require_once 'includes/auth_functions.php';

// Simple Router
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Handle Logout
if ($page === 'logout') {
    logout();
    header("Location: index.php");
    exit;
}

// Valid pages map
$routes = [
    'home' => 'views/home.php',
    'shop' => 'views/shop.php',
    'product' => 'views/product.php',
    'cart' => 'views/cart.php',
    'login' => 'views/login.php',
    'register' => 'views/register.php'
];

// Include Header
include 'includes/header.php';

// Include View
if (array_key_exists($page, $routes)) {
    if (file_exists($routes[$page])) {
        include $routes[$page];
    } else {
        echo "<div style='text-align:center; padding: 50px;'><h2>404 - View Not Found</h2><p>The file implementation for <strong>$page</strong> is missing.</p></div>";
    }
} else {
    echo "<div style='text-align:center; padding: 50px;'><h2>404 - Page Not Found</h2></div>";
}

// Include Footer
include 'includes/footer.php';
?>
