<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require dirname(__DIR__) . '/vendor/autoload.php';
require "ketnoi.php";

function sendEmail($toEmail,$toName , $subject, $toMessage_html){

$mail = new PHPMailer(true);

try {

    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'Email cua bạn'; // Email của bạn
    $mail->Password = 'mk của bạn'; // Mật khẩu email hoặc App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Cấu hình thông tin email
    $mail->setFrom('Email cua bạn', "PETSHOP"); // Người gửi
    $mail->addAddress($toEmail, $toName);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->msgHTML($toMessage_html) ;
    
    // Gửi email
    $mail->send();
    // echo 'Email đã được gửi thành công!';
} catch (Exception $e) {
    echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
}
}
?>
