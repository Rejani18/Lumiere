<?php
// admin/settings.php
$page_title = 'Payment Settings';
include 'layout/header.php';
?>

<div class="card" style="max-width: 600px;">
    <h3>Configure Payment Methods</h3>
    <p style="color: #666; margin-bottom: 20px;">Manage how your customers can pay.</p>
    
    <form>
        <div class="form-group">
            <label>Bank Transfer (BCA)</label>
            <input type="text" class="form-control" value="8293910022 - PT LUXURY INDONESIA">
        </div>
        
        <div class="form-group">
            <label>E-Wallet (OVO/Gopay)</label>
            <input type="text" class="form-control" value="081234567890">
        </div>
        
        <div class="form-group" style="display:flex; align-items:center; gap: 10px;">
            <input type="checkbox" id="cod" checked>
            <label for="cod" style="margin:0;">Enable Cash on Delivery (COD)</label>
        </div>
        
        <button type="submit" class="btn" style="margin-top: 10px;">Save Settings</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
