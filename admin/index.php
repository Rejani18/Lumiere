<?php
// admin/index.php
$page_title = 'Overview';
include 'layout/header.php';

// Mock Stats
$total_products = count(get_products());
$total_sales = "Rp 12.500.000"; // Mock
$pending_orders = 3;
?>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
    <div class="card" style="border-left: 4px solid var(--color-primary);">
        <h3 style="color: #666; font-size: 0.9rem; text-transform: uppercase;">Total Sales</h3>
        <p style="font-size: 1.8rem; font-weight: 700; margin-top: 10px;"><?php echo $total_sales; ?></p>
    </div>
    
    <div class="card" style="border-left: 4px solid var(--color-secondary);">
        <h3 style="color: #666; font-size: 0.9rem; text-transform: uppercase;">Total Products</h3>
        <p style="font-size: 1.8rem; font-weight: 700; margin-top: 10px;"><?php echo $total_products; ?></p>
    </div>
    
    <div class="card" style="border-left: 4px solid #4caf50;">
        <h3 style="color: #666; font-size: 0.9rem; text-transform: uppercase;">Pending Orders</h3>
        <p style="font-size: 1.8rem; font-weight: 700; margin-top: 10px;"><?php echo $pending_orders; ?></p>
    </div>
</div>

<div class="card">
    <h3>Recent Activity</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#1024</td>
                <td>Sarah Jenkins</td>
                <td><span style="background: #e8f5e9; color: #2e7d32; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;">Completed</span></td>
                <td>Rp 850.000</td>
            </tr>
            <tr>
                <td>#1023</td>
                <td>Michael Chen</td>
                <td><span style="background: #fff3e0; color: #ef6c00; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;">Pending</span></td>
                <td>Rp 1.200.000</td>
            </tr>
             <tr>
                <td>#1022</td>
                <td>Emma Watson</td>
                <td><span style="background: #e8f5e9; color: #2e7d32; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;">Completed</span></td>
                <td>Rp 450.000</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>
