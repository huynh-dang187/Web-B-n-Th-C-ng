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
        .success-container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        
        }
        .success-container h1 {
            font-size: 24px;
            color: #4caf50;
            margin-bottom: 10px;
        }
        .back-home {
            width: 200px;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            
        }
        
        .backhome3{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .back-home:hover {
            background-color: #45a049;
        }
        
    </style>

<body>
<?php include_once('header.php'); ?>
    <div class="success-container">
        <h1>Thanh toán thành công!</h1>
        <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
       <div class="backhome3"> <a href="index.php" class="back-home">Quay lại trang chủ</a></div>
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>
