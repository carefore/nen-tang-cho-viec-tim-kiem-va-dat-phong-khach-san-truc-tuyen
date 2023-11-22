<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ten_csdl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

// Chuẩn bị và thực thi truy vấn SQL để lưu thông tin vào cơ sở dữ liệu
$sql = "INSERT INTO bookings (name, email, phone, checkin, checkout)
        VALUES ('$name', '$email', '$phone', '$checkin', '$checkout')";

if ($conn->query($sql) === TRUE) {
    echo "Đặt phòng thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
