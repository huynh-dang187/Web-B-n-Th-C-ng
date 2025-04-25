<?php
require "./cauhinh/ketnoi.php";

$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <style>
       .desch{
        font-size: 40px;
        margin-bottom: 50px;
       }
        .cart-container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th, .cart-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #f8f8f8;
        }

        .cart-table img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 10px;
        }

        .cart-table a {
            color: red;
            font-size: 20px;
            text-decoration: none;
            cursor: pointer;
        }

        .cart-table a:hover {
            text-decoration: underline;
        }

        .cart-total {
            text-align: right;
            margin-top: 20px;
        }

        .cart-total h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .checkout-button {
            margin-top: 30px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }

        .checkout-button:hover {
            background-color: #218838;
        }

        .empty-cart-message {
            text-align: center;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>
    
    <div class="cart-container">
        <h1 class="desch">Giỏ hàng của bạn</h1>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <table class="cart-table">
    <thead>
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng cộng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['cart'] as $product_id => $item): ?>
            <tr>
               
                <td>
                    <img src="./quantri/anh/<?php echo $item['image_url']; ?>" alt="<?php echo $item['name']; ?>" style="width: 80px; height: 80px; object-fit: cover;">
                </td>
                
             
                <td><?php echo $item['name']; ?></td>
                
               
                <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</td>
                
                
                <td>
                    <form method="post" action="update_cart.php" style="display: flex; align-items: center; justify-content: center;">
                        <button type="submit" name="action" value="decrease" >-</button>
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="text" name="quantity" value="<?php echo $item['quantity']; ?>" readonly style="width: 40px; text-align: center; margin: 0 5px;">
                        <button type="submit" name="action" value="increase" >+</button>
                    </form>
                </td>
                
                
                <td><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VNĐ</td>
                
               
                <td>
                    <a href="remove_from_cart.php?product_id=<?php echo $product_id; ?>" style="color: red; font-size: 16px; text-decoration: none;">Xóa</a>
                </td>
            </tr>
            <?php $totalPrice += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>
    </tbody>
</table>

            <div class="cart-total">
                <h3>Tổng cộng: <?php echo number_format($totalPrice, 0, ',', '.'); ?> VNĐ</h3>
                <a href="checkout.php" class="checkout-button">Thanh toán</a>
            </div>
        <?php else: ?>
            <p class="empty-cart-message">Giỏ hàng của bạn chưa có sản phẩm nào.</p>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>
