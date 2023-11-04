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
 $codeproduct = "1"; // شناسه محصولی که می‌خواهید ویرایش کنید
 $price =  90000000 ; // قیمت جدید محصول
 $nameproduct = "Ram" // نام جدید محصول  
 $Type = "Hardware";   // نوع جدید محصول
 $Productinventory = 150;  // تعداد جدید محصول
$Brand = "Nvidia"; // برند جدید محصول


// استفاده از پرس و جوی SQL برای ویرایش محصول در جدول محصولات
$sql = "UPDATE products SET product_name = Cpu  WHERE product_id = 1"; 

if (mysqli_query($conn, $sql)) {
    echo "محصول با موفقیت ویرایش شد.";
} else {
    echo "خطا: " . $sql . "<br>" . mysqli_error($conn);
}

// بستن اتصال به پایگاه داده
mysqli_close($conn);
?>
