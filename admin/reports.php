<?php
// admin/reports.php
$page_title = 'Sales Reports';
include 'layout/header.php';
?>

<div class="card">
    <h3>Monthly Sales Performance</h3>
    <p class="text-secondary">Data for January 2026</p>
    
    <div style="height: 300px; display: flex; align-items: flex-end; gap: 20px; padding: 40px 0; border-bottom: 1px solid #eee;">
        <!-- Simple CSS Bar Chart -->
        <div style="flex:1; background: #e0e0e0; height: 100%; position: relative;">
            <div style="position: absolute; bottom: 0; width: 100%; height: 40%; background: var(--color-primary-light);"></div>
            <div style="position: absolute; bottom: -25px; width: 100%; text-align: center;">Week 1</div>
        </div>
        <div style="flex:1; background: #e0e0e0; height: 100%; position: relative;">
            <div style="position: absolute; bottom: 0; width: 100%; height: 60%; background: var(--color-primary-light);"></div>
            <div style="position: absolute; bottom: -25px; width: 100%; text-align: center;">Week 2</div>
        </div>
        <div style="flex:1; background: #e0e0e0; height: 100%; position: relative;">
            <div style="position: absolute; bottom: 0; width: 100%; height: 75%; background: var(--color-secondary);"></div>
             <div style="position: absolute; bottom: -25px; width: 100%; text-align: center;">Week 3</div>
        </div>
        <div style="flex:1; background: #e0e0e0; height: 100%; position: relative;">
            <div style="position: absolute; bottom: 0; width: 100%; height: 30%; background: var(--color-primary-light);"></div>
             <div style="position: absolute; bottom: -25px; width: 100%; text-align: center;">Week 4</div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
