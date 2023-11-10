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

// درخواست برای دریافت محصولات
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// نمایش محصولات و جزئیات به کاربران
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>{$row['product_name']}</h2>";
        echo "<p>قیمت: {$row['price']} تومان</p>";
        echo "<p>توضیحات: {$row['description']}</p>";

        // بررسی نقش کاربر
        if ($_SESSION['role'] == 'admin') {
            echo "<p><a href='edit_product.php?id={$row['id']}'>ویرایش</a> | <a href='delete_product.php?id={$row['id']}'>حذف</a></p>";
        } else {
            echo "<p><a href='buy.php?id={$row['id']}'>خرید</a></p>";
        }

        echo "<hr>";
    }
} else {
    echo "<p>هیچ محصولی برای نمایش وجود ندارد.</p>";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
