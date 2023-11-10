<?php
// اتصال به پایگاه داده
$host = "localhost"; // هاست پایگاه داده
$username = "root"; // نام کاربری پایگاه داده
$password = ""; // رمز عبور پایگاه داده
$database = "computer"; // نام پایگاه داده

$conn = new mysqli($host, $username, $password, $database);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به پایگاه داده با مشکل مواجه شد: " . $conn->connect_error);
}

// نمایش محصولات به کاربران
$sql_user_products = "SELECT * FROM products";
$result_user_products = $conn->query($sql_user_products);

if ($result_user_products->num_rows > 0) {
    echo "<h2>محصولات برای کاربران:</h2>";
    while ($row = $result_user_products->fetch_assoc()) {
        echo "<p>{$row['product_name']} - قیمت: {$row['price']} تومان</p>";
    }
} else {
    echo "<p>هیچ محصولی برای نمایش وجود ندارد.</p>";
}

// نمایش محصولات به ادمین
$sql_admin_products = "SELECT * FROM products";
$result_admin_products = $conn->query($sql_admin_products);

if ($result_admin_products->num_rows > 0) {
    echo "<h2>محصولات برای ادمین:</h2>";
    while ($row = $result_admin_products->fetch_assoc()) {
        echo "<p>{$row['product_name']} - قیمت: {$row['price']} تومان <a href='edit_product.php?id={$row['id']}'>ویرایش</a></p>";
    }
} else {
    echo "<p>هیچ محصولی برای نمایش وجود ندارد.</p>";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
