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

// درخواست برای دریافت پیام‌ها
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

// نمایش پیام‌ها به ادمین
if ($result->num_rows > 0) {
    echo "<h2>پیام‌ها به ادمین:</h2>";
    echo "<table border='1'>
            <tr>
                <th>شناسه</th>
                <th>نام فرستنده</th>
                <th>ایمیل فرستنده</th>
                <th>موضوع</th>
                <th>متن پیام</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['sender_name']}</td>
                <td>{$row['sender_email']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['message']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>هیچ پیامی برای نمایش وجود ندارد.</p>";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
