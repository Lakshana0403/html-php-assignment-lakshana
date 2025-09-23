<?php
// Advanced array of products
$products = [
    ["name" => "Espresso", "category" => "Coffee", "price" => 2.5, "stock" => 10],
    ["name" => "Cappuccino", "category" => "Coffee", "price" => 3.5, "stock" => 5],
    ["name" => "Latte", "category" => "Coffee", "price" => 3, "stock" => 8],
    ["name" => "Mocha", "category" => "Coffee", "price" => 3.75, "stock" => 4],
    ["name" => "Blueberry Muffin", "category" => "Pastry", "price" => 2, "stock" => 6],
    ["name" => "Croissant", "category" => "Pastry", "price" => 2.25, "stock" => 7],
    ["name" => "Bagel", "category" => "Pastry", "price" => 1.5, "stock" => 5]
];

// Initialize filter variables
$filter_category = $_POST['category'] ?? "";
$min_price = $_POST['min_price'] ?? "";
$max_price = $_POST['max_price'] ?? "";

// Function to filter products
function filterProducts($products, $category, $min_price, $max_price) {
    return array_filter($products, function($product) use ($category, $min_price, $max_price) {
        $match = true;
        if ($category && strtolower($product['category']) !== strtolower($category)) $match = false;
        if ($min_price !== "" && $product['price'] < floatval($min_price)) $match = false;
        if ($max_price !== "" && $product['price'] > floatval($max_price)) $match = false;
        return $match;
    });
}

// Get filtered products
$filtered_products = filterProducts($products, $filter_category, $min_price, $max_price);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Catalog</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f4ece2;
    color: #3e2c23;
    padding: 20px;
}
h1 {
    text-align: center;
    color: #6f4e37;
    margin-bottom: 20px;
}
form {
    max-width: 700px;
    margin: 0 auto 30px;
    background: #fff5e6;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}
input, select {
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #d2b48c;
    flex: 1;
    min-width: 120px;
}
button {
    padding: 10px 20px;
    background: #6f4e37;
    color: white;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}
button:hover { background: #8b5e3c; transform: translateY(-2px); }

.products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    max-width: 1000px;
    margin: auto;
}
.card {
    background: #fff5e6;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.2s;
}
.card:hover { transform: translateY(-5px); }
.card h3 { margin: 10px 0; color: #6f4e37; }
.card p { margin: 5px 0; }
</style>
</head>
<body>

<h1>☕ Product Catalog</h1>

<form method="POST">
    <select name="category">
        <option value="">All Categories</option>
        <option value="Coffee" <?= ($filter_category=="Coffee")?"selected":"" ?>>Coffee</option>
        <option value="Pastry" <?= ($filter_category=="Pastry")?"selected":"" ?>>Pastry</option>
    </select>
    <input type="number" name="min_price" placeholder="Min Price" step="0.01" value="<?= htmlspecialchars($min_price) ?>">
    <input type="number" name="max_price" placeholder="Max Price" step="0.01" value="<?= htmlspecialchars($max_price) ?>">
    <button type="submit">Filter</button>
</form>

<div class="products">
<?php if (!empty($filtered_products)): ?>
    <?php foreach($filtered_products as $product): ?>
        <div class="card">
            <h3><?= $product['name'] ?></h3>
            <p><strong>Category:</strong> <?= $product['category'] ?></p>
            <p><strong>Price:</strong> $<?= number_format($product['price'],2) ?></p>
            <p><strong>Stock:</strong> <?= $product['stock'] ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p style="grid-column:1/-1; text-align:center;">No products found.</p>
<?php endif; ?>
</div>

</body>
</html>
