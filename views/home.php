<?php
// views/home.php
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Elegance is an Attitude</h1>
            <p>Discover our new collection of ethically sourced, premium cosmetics designed to highlight your natural beauty.</p>
            <a href="index.php?page=shop" class="btn">Shop Now</a>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="section-padding">
    <div class="container">
        <div class="section-title">
            <h2>New Arrivals</h2>
            <p>The latest additions to our luxury collection</p>
        </div>

        <div class="product-grid">
            <?php 
            // Display first 3 products
            $featured_products = array_slice($products, 0, 3);
            foreach ($featured_products as $product): 
            ?>
            <div class="product-card">
                <a href="index.php?page=product&id=<?php echo $product['id']; ?>">
                    <div class="product-image">
                        <!-- Placeholder for real image, using CSS bg for now or alt -->
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
        
        <div class="text-center" style="margin-top: var(--spacing-lg);">
            <a href="index.php?page=shop" class="btn-outline" style="padding: 12px 40px;">View All Products</a>
        </div>
    </div>
</section>

<!-- Brand Story / Banner -->
<section class="section-padding" style="background-color: var(--color-light);">
    <div class="container">
        <div class="flex items-center gap-4" style="flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px;">The Golden Hour</h2>
                <p style="margin-bottom: 20px;">Our signature Gold Dust collection brings the warmth of the sunset to your skin. Experience the glow that lasts all night.</p>
                <a href="#" class="btn">Discover More</a>
            </div>
            <div style="flex: 1; min-width: 300px; height: 400px; overflow: hidden;">
                <img src="assets/images/lifestyle-gold.png" alt="Golden Hour Lifestyle" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</section>
