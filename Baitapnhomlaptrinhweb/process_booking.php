<?php
session_start();
include './cauhinh/ketnoi.php';
include './cauhinh/email.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gio = $_POST['gio'];
    $ngay = $_POST['ngay'];
    $pet_type = $_POST['pet-type'];
    $service_id = $_POST['dichvu']; // Lấy giá trị service_id từ form
    $booking_date = $ngay;
    $time_slot = $gio;
    $status = "Đã đặt";

    // Chèn dữ liệu vào bảng spa_booking
    $sql = "INSERT INTO spa_booking (username, email, phone, pet_type, service_id, booking_date, time_slot, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $username, $email, $phone, $pet_type, $service_id, $booking_date, $time_slot, $status);

    // Lấy thông tin dịch vụ từ spa_services
    $service_query = "SELECT * FROM spa_services WHERE service_id = ?";
    $service_stmt = $conn->prepare($service_query);
    $service_stmt->bind_param("s", $service_id);
    $service_stmt->execute();
    $service_result = $service_stmt->get_result();
    $row = $service_result->fetch_assoc();

    if ($stmt->execute()) {
        // Gửi email thông báo
        $subject = "Thong bao dat lich";
        $message = file_get_contents('./cauhinh/datlich.html');
        $message = str_replace(
            ["customer", "email", "date", "appointmentTime", "service"],
            [$username, $email, $booking_date, $time_slot, $row['service_name']],
            $message
        );

        if (sendEmail($email, $username, $subject, $message)) {
            echo "Email đã được gửi thành công.";
        } else {
            echo "Không thể gửi email.";
        }

        // Xóa giỏ hàng và chuyển hướng
        unset($_SESSION['cart']);
        header("Location: success_dl.php"); 
        exit();
    } else {
        echo "Lỗi khi lưu đơn hàng: " . $conn->error;
    }

    $stmt->close();
    $service_stmt->close();
}

$conn->close();
?>
