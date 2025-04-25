<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tên Trang</title>
    <style>
        .cart {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -20px;
            background-color: #ff0000;
            color: #ffffff;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
</head>

<header class="header fixed">
    <div class="main-content">
        <div class="body-header">
            <!-- logo -->
            <a href="index.php"><img src="./images/image_trangchu/logo.png" alt="Ảnh logos hop" class="logo" /></a>
            <!-- nav -->
            <nav>
                <ul class="navbar">
                    <li class="navbar_item active">
                        <a href="index.php" class="navbar_item_label">Trang chủ <i class="fas fa-caret-down"></i></a>
                        <ul class="navbar_item_dropdown">
                            <li class="dropdown_item">
                                <a href="gioithieu.php">Giới thiệu</a>
                            </li>
                            <li class="dropdown_item">
                                <a href="tintuc.php">Tin tức</a>
                            </li>
                            <li class="dropdown_item">
                                <a href="lienhe.php">Liên hệ</a>
                            </li>
                        </ul>
                    </li>
                    <li class="navbar_item">
                        <a href="thucung.php" class="navbar_item_label">
                            Thú cưng <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="navbar_item_dropdown">
                            <li class="dropdown_item">
                                <a href="cho.php">Giống chó</a>
                            </li>
                            <li class="dropdown_item">
                                <a href="meo.php    ">Giống mèo</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="navbar_item">
                        <a href="#!" class="navbar_item_label">Phụ kiện</a>
                    </li> -->
                    <li class="navbar_item">
                        <a href="dichvu.php" class="navbar_item_label">Dịch vụ thú cưng <i
                                class="fas fa-caret-down"></i></a>
                        <ul class="navbar_item_dropdown">
                            <li class="dropdown_item">
                                <a href="dichvu_spa.php">Spa-Tạo kiểu</a>
                            </li>
                            <li class="dropdown_item">
                                <a href="dichvu_khachsan.php">Khách sạn-Lưu trữ</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- thanh tìm kiếm -->
            <div class="search-bar">
                <form action="search.php" method="post">
                    <input type="text" name="timkiem" placeholder="Tìm kiếm..." class="search-input" />
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <!-- btn actioj -->
            <div class="action">
                <a href="tel:0393048626" class="btn btn-sign-up">
                    <div class="iconphone">
                        <i class="fas fa-phone-alt" style="color: #77e23a; font-size: 16px"></i>
                    </div>
                    <p>0393048626</p>
                </a>
            </div>
            <div class="cart">
                <a href="./cart.php" class="cart-shopping">
                    <i class="fas fa-cart-plus" style="font-size: 24px"></i>
                    <?php if (isset($_SESSION['cart'])): ?>
                        <span class="cart-count">
                            <?php echo count($_SESSION['cart']); ?>
                        </span>
                    <?php else: ?>
                        <span class="cart-count">0</span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</header>