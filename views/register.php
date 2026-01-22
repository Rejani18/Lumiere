<?php
// views/register.php

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $name = $_POST['name'] ?? 'User';

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        if (register_user($username, $password, $name)) {
            $success = "Registration successful! You can now <a href='index.php?page=login'>login</a>.";
        } else {
            $error = "Username already taken.";
        }
    }
}
?>

<section class="section-padding">
    <div class="container" style="max-width: 400px;">
        <div class="section-title">
            <h2>Create Account</h2>
        </div>
        
        <?php if ($error): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=register" style="background: var(--color-white); padding: 30px; box-shadow: var(--shadow-md);">
             <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Full Name</label>
                <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border);">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border);">
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border);">
            </div>
            
            <button type="submit" class="btn" style="width: 100%;">Register</button>
            <p style="margin-top: 15px; text-align: center; font-size: 0.9rem;">
                Already have an account? <a href="index.php?page=login" style="color: var(--color-secondary);">Login here</a>.
            </p>
        </form>
    </div>
</section>
