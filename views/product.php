<?php
// views/product.php

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = null;

foreach ($products as $p) {
    if ($p['id'] === $id) {
        $product = $p;
        break;
    }
}

if (!$product) {
    echo "<div class='container section-padding text-center'><h2>Product not found.</h2></div>";
    return; // Stop loading this view
}
?>

<section class="section-padding">
    <div class="container">
        <div class="flex gap-4" style="flex-wrap: wrap; align-items: flex-start;">
            <!-- Product Image -->
            <div style="flex: 1; min-width: 300px;">
                <div style="background-color: var(--color-light); height: 500px; width: 100%; display:flex; align-items:center; justify-content:center;">
                     <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="max-height: 100%;" onerror="this.style.display='none';">
                </div>
            </div>

            <!-- Product Details -->
            <div style="flex: 1; min-width: 300px; padding-left: var(--spacing-md);">
                <div style="color: var(--color-secondary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">
                    <?php echo $product['category']; ?>
                </div>
                <h1 style="font-size: 2.5rem; margin-bottom: 20px;"><?php echo $product['name']; ?></h1>
                <p style="font-size: 1.5rem; font-weight: 700; margin-bottom: 20px;">
                    Rp <?php echo number_format($product['price'], 0, ',', '.'); ?>
                </p>
                
                <p style="margin-bottom: 30px; color: var(--color-text-light);">
                    <?php echo $product['description']; ?>
                </p>

                <form action="index.php?page=cart&action=add" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <div style="display: flex; gap: 10px; margin-bottom: 30px;">
                        <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 10px; border: 1px solid var(--color-border); text-align: center;">
                        <button type="submit" class="btn" style="flex-grow: 1;">Add to Cart</button>
                    </div>
                </form>

                <div style="border-top: 1px solid var(--color-border); padding-top: 20px; font-size: 0.9rem;">
                    <p><strong>Free Shipping</strong> on orders over Rp 1.000.000</p>
                    <p><strong>Returns:</strong> 30-day money back guarantee.</p>
                </div>
            </div>
        </div>
    </div>
</section>
