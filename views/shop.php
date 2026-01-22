<?php
// views/shop.php
?>

<section class="section-padding" style="padding-top: var(--spacing-lg);">
    <div class="container">
        <div class="section-title">
            <h1>Shop All</h1>
            <p>Explore our complete collection of luxury cosmetics</p>
        </div>

        <!-- Filters could go here -->
        
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <a href="index.php?page=product&id=<?php echo $product['id']; ?>">
                    <div class="product-image">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" onerror="this.style.display='none'; this.parentNode.style.backgroundColor='#F0F0F0';">
                    </div>
                </a>
                <div class="product-info">
                    <div class="product-category"><?php echo $product['category']; ?></div>
                    <h3 class="product-title">
                        <a href="index.php?page=product&id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                    </h3>
                    <div class="product-price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
