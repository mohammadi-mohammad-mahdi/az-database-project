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

// درخواست برای دریافت کاربران
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// نمایش تمامی کاربران
if ($result->num_rows > 0) {
    echo "<h2>تمامی کاربران:</h2>";
    echo "<table border='1'>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>هیچ کاربری برای نمایش وجود ندارد.</p>";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
