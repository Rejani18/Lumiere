<?php
// config/data.php

$site_name = "LUMIÈRE";

// Database Connection
$host = 'localhost';
$dbname = 'lumiere_makeup';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage() . "<br>Please import database.sql into phpMyAdmin.");
}

// --- Product Functions ---

function get_products() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll();
}

function get_product_by_id($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_product($new_product) {
    global $pdo;
    $sql = "INSERT INTO products (name, price, category, description, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $new_product['name'],
        $new_product['price'],
        $new_product['category'],
        $new_product['description'],
        $new_product['image']
    ]);
    return $pdo->lastInsertId();
}

function update_product($id, $updated_data) {
    global $pdo;
    // We only update fields that are present in updated_data for flexibility, 
    // but typically we'd update specific columns.
    // For simplicity in this migration, we assume full update or we build query dynamically
    
    // Safer approach: explicitly map fields
    $sql = "UPDATE products SET name=?, price=?, category=?, description=?, image=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    
    // Fetch current to merge if data is partial (optional but good for safety)
    $current = get_product_by_id($id);
    if (!$current) return false;
    
    $name = $updated_data['name'] ?? $current['name'];
    $price = $updated_data['price'] ?? $current['price'];
    $category = $updated_data['category'] ?? $current['category'];
    $description = $updated_data['description'] ?? $current['description'];
    $image = $updated_data['image'] ?? $current['image'];
    
    return $stmt->execute([$name, $price, $category, $description, $image, $id]);
}

function delete_product($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    return $stmt->execute([$id]);
}

// --- User Functions ---

function get_user_by_username($username) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    return $stmt->fetch();
}

function register_user($username, $password, $name = "User") {
    global $pdo;
    
    // DB enforces unique username, but we catch it gracefully
    $check = get_user_by_username($username);
    if ($check) return false;

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user'; // Default role
    
    $sql = "INSERT INTO users (username, password_hash, role, name) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $password_hash, $role, $name]);
}

// Initialize Global Products Variable for legacy support in views (mostly read-only views)
$products = get_products();
?>
