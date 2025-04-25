<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thanh toán</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<style>
    .checkout-container {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
        font-family: 'Arial', sans-serif;
    }

    .checkout-container h1 {
        font-size: 32px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 40px;
        color: #4caf50;
    }
    .checkout-summary,
    .checkout-form {
        background-color: #f8f8f8;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    .checkout-summary table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .checkout-summary th,
    .checkout-summary td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .checkout-summary th {
        background-color: #f1f1f1;
        font-weight: bold;
    }

    .checkout-total {
        text-align: right;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }
    .checkout-form h1 {
        font-size: 28px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
        color: #4caf50;
    }
    .columns {
        display: flex;
        gap: 30px;
        margin-bottom: 20px;
    }

    .left-column,
    .right-column {
        flex: 1;
    }

    label {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #333;
    }

    input[id="username"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        background-color: #fff;
    }

    textarea {
        resize: vertical;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .button-container button {
        padding: 15px 20px;
        background-color: #4caf50;
        color: white;
        font-size: 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        width: 220px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .button-container button:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    .button-container button:active {
        transform: scale(1);
    }

    .checkout-summary td[colspan="4"] {
        text-align: center;
        font-size: 18px;
        color: #888;
    }
</style>

<body>
    <?php include_once('header.php'); ?>

    <div class="checkout-container">
        <h1>Thanh toán</h1>

        <div class="checkout-summary">
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;

                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item):
                            $itemTotal = $item['price'] * $item['quantity'];
                            $totalPrice += $itemTotal;
                    ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo number_format($itemTotal, 0, ',', '.'); ?> VNĐ</td>
                            </tr>
                    <?php
                        endforeach;
                    } else {
                    ?>
                        <tr>
                            <td colspan="4">Giỏ hàng của bạn hiện đang trống.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php if ($totalPrice > 0): ?>
                <div class="checkout-total">
                    <h3>Tổng cộng: <?php echo number_format($totalPrice, 0, ',', '.'); ?> VNĐ</h3>
                </div>
            <?php endif; ?>
        </div>

        <form action="process_checkout.php" method="POST">
            <h1>Thông tin thanh toán</h1>
            <div class="columns">
                <div class="left-column">
                    <label for="username">Họ và tên:</label>
                    <input type="text" id="username" name="username" placeholder="Nhập họ và tên" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email" required>
                </div>

                <div class="right-column">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>

                    <label for="payment_method">Hình thức thanh toán:</label>
                    <select name="payment_method" id="payment_method" required>
                        <option value="PayPal">PayPal</option>
                        <option value="Thetindung">Thẻ tín dụng</option>
                        <option value="COD">COD</option>
                    </select>
                </div>
            </div>

            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" placeholder="Nhập địa chỉ giao hàng" rows="4" required></textarea>

            <div class="button-container">
                <button type="submit">Hoàn tất thanh toán</button>
            </div>
        </form>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>
