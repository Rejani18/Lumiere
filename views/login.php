<?php
// views/login.php

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($username, $password)) {
        if (is_admin()) {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<section class="section-padding">
    <div class="container" style="max-width: 400px;">
        <div class="section-title">
            <h2>Sign In</h2>
        </div>
        
        <?php if ($error): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=login" style="background: var(--color-white); padding: 30px; box-shadow: var(--shadow-md);">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border);">
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border);">
            </div>
            
            <button type="submit" class="btn" style="width: 100%;">Login</button>
            <p style="margin-top: 15px; text-align: center; font-size: 0.9rem;">
                Don't have an account? <a href="index.php?page=register" style="color: var(--color-secondary);">Register here</a>.
            </p>
        </form>
    </div>
</section>
