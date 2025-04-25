<?php
session_start();
require "./cauhinh/ketnoi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy ID sản phẩm từ yêu cầu AJAX
    $pet_id = $_POST['product_id'];

    // Khởi tạo giỏ hàng nếu chưa có
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $sql = "SELECT * FROM pets WHERE pet_id = $pet_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        $product_id = $product['pet_id'];
        $product_name = $product['pet_name'];
        $price = $product['price'];
        $image_url = $product['image_url'];

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product_name,
                'price' => $price,
                'image_url' => $image_url,
                'quantity' => 1
            ];
        }
    }

    $cartCount = count($_SESSION['cart']);
    echo json_encode([
        'status' => 'success',
        'cart_count' => $cartCount,
        'message' => 'Sản phẩm đã được thêm vào giỏ hàng'
    ]);
    exit;
}
echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
exit;
?>
