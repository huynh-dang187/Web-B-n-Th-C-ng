<?php
session_start();
include './cauhinh/ketnoi.php';
include './cauhinh/email.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $order_date = date("Y-m-d H:i:s");
    $status = "Đang giao hàng";


    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $sql = "INSERT INTO orders (username, email, phone, address, order_date, total_price, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $username, $email, $phone, $address, $order_date, $total_price, $status);

    if ($stmt->execute()) {
        $subject = "Thong bao dat hang";
        $message = file_get_contents('./cauhinh/dathang.html');
        $message = str_replace(
            ["customer", "email", "orderId", "total", "orderDate"],
            [$username, $email, "#123" ,$total_price, $order_date],
            $message
        );
        $toMessage_html = $message;
        if (sendEmail($email, $username, $subject, $toMessage_html)) {
            echo "Email đã được gửi thành công.";
        } else {
            echo "Không thể gửi email.";
        }

        unset($_SESSION['cart']);
        header("Location: success.php"); 
        exit();
    } else {
        echo "Lỗi khi lưu đơn hàng: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>