<?php
$servername = "آدرس_پایگاه_داده";
$username = "نام_کاربری_پایگاه_داده";
$password = "رمز_عبور_پایگاه_داده";
$dbname = "نام_پایگاه_داده";

// اتصال به پایگاه داده
$mysql = mysqli_connect("localhost","root","","db");

// دریافت اطلاعات از فرم
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


// تهیه عبارت SQL برای درج کاربر
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

$result = mysqli_query(@$mysql, $sql);

// قطع اتصال
mysqli_close($mysql);
?>