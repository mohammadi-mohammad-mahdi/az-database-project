<?php
$servername = "آدرس_پایگاه_داده";
$username = "نام_کاربری_پایگاه_داده";
$password = "رمز_عبور_پایگاه_داده";
$dbname = "نام_پایگاه_داده";

// اتصال به پایگاه داده با MySQLi
$mysql = mysqli_connect("localhost","root","","db");

// دریافت اطلاعات از فرم
$username = $_POST['username'];
$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];

// تهیه عبارت SQL برای درج پیام
$sql = "INSERT INTO messages (username , email , title , content) VALUES (?, ?, ?, ?)";

$result = mysqli_query(@$mysql, $sql);
   

// بستن اتصال
mysqli_close($mysql);
?>