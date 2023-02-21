<?php
// Get the selected category from the URL, default to "T-Shirts"
$category = isset($_GET['category']) ? $_GET['category'] : 'T-Shirts';

// Get the products in the selected category from the database
$products = get_products_by_category($category);

// Display the category tabs
echo '<ul class="category-tabs">';
echo '<li><a href="?category=T-Shirts"'.($category === 'T-Shirts' ? ' class="active"' : '').'>T-Shirts</a></li>';
echo '<li><a href="?category=Hoodies"'.($category === 'Hoodies' ? ' class="active"' : '').'>Hoodies</a></li>';
echo '<li><a href="?category=Pants"'.($category === 'Pants' ? ' class="active"' : '').'>Pants</a></li>';
echo '<li><a href="?category=Shoes"'.($category === 'Shoes' ? ' class="active"' : '').'>Shoes</a></li>';
echo '</ul>';

// Display the products in the selected category
echo '<ul class="product-list">';
foreach ($products as $product) {
    echo '<li>';
    echo "<h2>{$product['name']}</h2>";
    echo "<img src=\"{$product['image']}\" alt=\"{$product['name']}\" />";
    echo "<p>{$product['description']}</p>";
    echo "<p>Price: {$product['price']}</p>";
    echo "<button>Add to Cart</button>";
    echo '</li>';
}
echo '</ul>';
?>
