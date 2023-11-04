<?php
// اطلاعات اتصال به پایگاه داده
$host = 'localhost';  // میزبان دیتابیس
$username = 'root';
$password = '';
$database = 'computer';

// اتصال به پایگاه داده
$conn = mysqli_connect($host, $username, $password, $database);

// بررسی اتصال
if (!$conn) {
    die("اتصال به پایگاه داده ناموفق بود: " . mysqli_connect_error());
}

// اطلاعات محصول جدید
$codeproduct = "1";
$price =  50000000 ;  // قیمت محصول
$nameproduct = "Cpu";
$Type = "Hardware";
$Productinventory = 60;
$Brand = "Asus";

// استفاده از پرس و جوی SQL برای افزودن محصول به جدول محصولات
$sql = "INSERT INTO products (product_name, product_price, product_description) VALUES ('$codeproduct', $price, '$nameproduct','$Type','$Productinventory','$Brand')";

if (mysqli_query($conn, $sql)) {
    echo "محصول با موفقیت اضافه شد.";
} else {
    echo "خطا: " . $sql . "<br>" . mysqli_error($conn);
}

// بستن اتصال به پایگاه داده
mysqli_close($conn);
?>
