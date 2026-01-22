<?php
// admin/products.php
$page_title = 'Products';
include 'layout/header.php';

// Handle Actions (Delete)
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    delete_product($_GET['id']);
    echo "<script>window.location.href='products.php';</script>";
}

// Handle Form Submission (Add/Edit)
$edit_product = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $edit_product = get_product_by_id($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image_path = $_POST['existing_image'] ?? '';

    // Handle Image Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../assets/images/uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        
        $filename = uniqid() . '_' . basename($_FILES['image']['name']);
        $target_file = $upload_dir . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = 'assets/images/uploads/' . $filename;
        }
    }

    $product_data = [
        'name' => $name,
        'price' => (int)$price,
        'category' => $category,
        'description' => $description,
        'image' => $image_path
    ];

    if ($id) {
        update_product($id, $product_data);
    } else {
        // Validation: Image is required for new products if not provided
        if (empty($image_path)) {
             // Use placeholder if no image
             $product_data['image'] = 'assets/images/product-1.jpg'; 
        }
        add_product($product_data);
    }
     echo "<script>window.location.href='products.php';</script>";
}
?>

<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
        <h3>Product List</h3>
        <button onclick="document.getElementById('productForm').scrollIntoView({behavior: 'smooth'}); resetForm();" class="btn" style="padding: 10px 15px; font-size: 0.8rem;">+ Add New</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (get_products() as $p): ?>
            <tr>
                <td><?php echo $p['id']; ?></td>
                <td><img src="../<?php echo $p['image']; ?>" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.style.display='none'"></td>
                <td><?php echo $p['name']; ?></td>
                <td><?php echo $p['category']; ?></td>
                <td>Rp <?php echo number_format($p['price'], 0, ',', '.'); ?></td>
                <td>
                    <a href="products.php?action=edit&id=<?php echo $p['id']; ?>" style="color: blue; margin-right: 10px;">Edit</a>
                    <a href="products.php?action=delete&id=<?php echo $p['id']; ?>" style="color: red;" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="card" id="productForm" style="margin-top: 30px;">
    <h3><?php echo $edit_product ? 'Edit Product' : 'Add New Product'; ?></h3>
    <form method="POST" enctype="multipart/form-data">
        <?php if ($edit_product): ?>
            <input type="hidden" name="id" value="<?php echo $edit_product['id']; ?>">
            <input type="hidden" name="existing_image" value="<?php echo $edit_product['image']; ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" required value="<?php echo $edit_product['name'] ?? ''; ?>">
        </div>

        <div style="display: flex; gap: 20px;">
            <div class="form-group" style="flex: 1;">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="Lips" <?php echo ($edit_product['category'] ?? '') == 'Lips' ? 'selected' : ''; ?>>Lips</option>
                    <option value="Face" <?php echo ($edit_product['category'] ?? '') == 'Face' ? 'selected' : ''; ?>>Face</option>
                    <option value="Eyes" <?php echo ($edit_product['category'] ?? '') == 'Eyes' ? 'selected' : ''; ?>>Eyes</option>
                    <option value="Tools" <?php echo ($edit_product['category'] ?? '') == 'Tools' ? 'selected' : ''; ?>>Tools</option>
                </select>
            </div>
            <div class="form-group" style="flex: 1;">
                <label>Price (Rp)</label>
                <input type="number" name="price" class="form-control" required value="<?php echo $edit_product['price'] ?? ''; ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4"><?php echo $edit_product['description'] ?? ''; ?></textarea>
        </div>

        <div class="form-group">
            <label>Product Image</label>
            <?php if ($edit_product): ?>
                <div style="margin-bottom: 10px;">
                    <img src="../<?php echo $edit_product['image']; ?>" style="height: 100px;">
                    <p style="font-size: 0.8rem; color: #666;">Current Image</p>
                </div>
            <?php endif; ?>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn"><?php echo $edit_product ? 'Update Product' : 'Add Product'; ?></button>
        <?php if ($edit_product): ?>
            <a href="products.php" class="btn-outline" style="display:inline-block; padding: 12px 30px; margin-left: 10px; text-decoration: none;">Cancel</a>
        <?php endif; ?>
    </form>
</div>

<script>
function resetForm() {
    // Only reset if we are not in edit mode (simple check)
    if (!window.location.search.includes('action=edit')) {
        document.querySelector('form').reset();
    }
}
</script>

<?php include 'layout/footer.php'; ?>
