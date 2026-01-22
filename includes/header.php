<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . " | " . $site_name : $site_name . " - Luxury Cosmetics"; ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="logo"><?php echo $site_name; ?></a>
            
            <div class="nav-links">
                <a href="index.php?page=home">Home</a>
                <a href="index.php?page=shop">Shop</a>
                <a href="#">About</a>
                <a href="#">Journal</a>
            </div>
            
            <div class="nav-icons">
                <a href="#">Search</a>
                <a href="index.php?page=cart">Cart (0)</a>
                <?php if(is_logged_in()): ?>
                    <span style="font-size: 0.9rem; margin-left: 10px;">Hi, <?php echo $_SESSION['user_name']; ?></span>
                    <?php if(is_admin()): ?>
                         <a href="admin/index.php" style="color: var(--color-secondary);">Dashboard</a>
                    <?php endif; ?>
                    <a href="index.php?page=logout">Logout</a>
                <?php else: ?>
                    <a href="index.php?page=login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
