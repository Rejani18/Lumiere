<?php
// admin/layout/header.php
require_once '../config/data.php';
require_once '../includes/auth_functions.php';

require_admin(); // Protect all admin pages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?php echo $site_name; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/variables.css">
    
    <style>
        /* Admin Specific Styles */
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f6f9;
        }
        
        .sidebar {
            width: 250px;
            background-color: var(--color-dark);
            color: #fff;
            padding-top: 20px;
            flex-shrink: 0;
            position: fixed;
            height: 100%;
        }
        
        .sidebar-brand {
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 40px;
            font-family: var(--font-heading);
            letter-spacing: 2px;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 15px 25px;
            color: #b0b0b0;
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: 0.3s;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: rgba(255,255,255,0.05);
            color: #fff;
            border-left-color: var(--color-secondary);
        }
        
        .main-content {
            flex-grow: 1;
            margin-left: 250px;
            padding: 20px 40px;
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: #fff;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
        }
        
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand"><?php echo $site_name; ?></div>
    <div class="sidebar-menu">
        <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Dashboard</a>
        <a href="products.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''; ?>">Products</a>
        <a href="reports.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'reports.php' ? 'active' : ''; ?>">Sales Reports</a>
        <a href="settings.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">Payment Settings</a>
        <a href="../index.php?page=logout" style="margin-top: 50px;">Logout</a>
        <a href="../index.php" target="_blank">View Site</a>
    </div>
</div>

<div class="main-content">
    <div class="admin-header">
        <h2><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></h2>
        <div>Welcome, <strong><?php echo $_SESSION['user_name']; ?></strong></div>
    </div>
