<?php
// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Địa chỉ máy chủ MySQL, thường là localhost
$username = "root"; // Tên người dùng MySQL, mặc định là "root" cho XAMPP
$password = ""; // Mật khẩu MySQL, mặc định là trống cho XAMPP
$database = "t-vitamin"; // Tên cơ sở dữ liệu bạn muốn kết nối

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
