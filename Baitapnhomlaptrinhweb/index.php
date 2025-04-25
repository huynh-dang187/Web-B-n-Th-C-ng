<?php
require "./cauhinh/ketnoi.php";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- enbed fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/giongcho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Trang chủ</title>
    
  <style>
    .slide{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
    
    }

  

    .slide_show {
    position: relative;
    width: 100%;
    max-width: 1000px; 
    height: 600px;
    overflow: hidden;
}

.list_images {
    display: flex;
}

.list_images img {
    width: 100%;
    max-width: 1000px; 
    height: 600;
}
.ABC {
    font-size: 30px;
    color: #999;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: 0.5s;
    cursor: pointer;
    z-index: 1000;
}

.ABC.left {
    left: 20px;
}

.ABC.right {
    right: 20px;
}

.ABC:hover {
    color: #fff;
}

h1, h4, .pinput {
    font-family: 'Poppins', sans-serif; 
    color: #333; 
    margin: 0;
    padding: 0;
}

h1 {
    font-size: 40px; 
    font-weight: 600; 
    text-align: center; 
    color: #ff6347; 
    margin-bottom: 20px; 
    text-transform: uppercase; 
    letter-spacing: 2px; 
    margin-top: 50px;
    margin-bottom: 50px;
}


h4 {
    margin-top: 10px;
    font-size: 30px; 
    font-weight: 500; 
    color: #333; 
    text-align: center; 
    margin-bottom: 10px; 
    transition: color 0.3s ease; 
}

h4:hover {
    color: #ff6347; 
}

.pinput {
    font-size: 24px; 
    color: #888; 
    text-align: center; 
    margin-bottom: 20px; 
}


.product-list {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.Xemthem {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

.Xemthem a {
    text-decoration: none;
    color: #ff6347;
    font-size: 16px;
    font-weight: 500;
    display: flex;
    align-items: center;
}

.Xemthem i {
    margin-left: 8px;
    font-size: 18px;
}


</style>
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

<body>
    <!-- header -->
    <header class="header fixed">
        <div class="main-content">
            <div class="body-header">
                <!-- logo -->
                <a href="index.php"><img src="./images/image_trangchu/logo.png" alt="Ảnh logos hop"
                        class="logo" /></a>
                <!-- nav -->
                <nav>
                    <ul class="navbar">
                        <li class="navbar_item active">
                            <a href="index.php" class="navbar_item_label">Trang chủ <i
                                    class="fas fa-caret-down"></i></a>
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
                        <span id="cart-count" class="cart-count">
                            <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    
   <div class="slide">
        <div class="slide_show">
            <div class="list_images">
            <img src="./images/slideshow/slideshow0.jpg" alt="ảnh slideshow1">
            <img src="./images/slideshow/slideshow1.jpg" alt="ảnh slideshow2">
            <img src="./images/slideshow/slideshow2.jpg" alt="ảnh slideshow3">
            <img src="./images/slideshow/slideshow3.jpg" alt="ảnh slideshow4">
            <img src="./images/slideshow/slideshow4.jpg" alt="ảnh slideshow5">
            </div>
            <div class="btns">
                <div class="ABC left"><i class="fa-solid fa-angle-left fa-2xl"></i></div>
                <div class="ABC right"><i class="fa-solid fa-angle-right fa-2xl"></i></div>
            </div>
        </div>
   </div>

   <div class="Sanphamcho">
    <div class="main-content">
        <div class="sanpham">
            <h1>Sản phẩm mới</h1>
            <div class="product-list">
                <?php

                $sqlDogs = "SELECT * FROM pets WHERE pet_type = 'Chó' ORDER BY RAND() LIMIT 6"; 
                $resultDogs = mysqli_query($conn, $sqlDogs);

                if (mysqli_num_rows($resultDogs) > 0) {
                    while ($dog = mysqli_fetch_assoc($resultDogs)) {
                        ?>
                        <div class="product-item">
                            <a href="chitietthucung.php?pet_id=<?php echo $dog['pet_id']; ?>">
                                <img src="./quantri/anh/<?php echo $dog['image_url']; ?>" alt="<?php echo $dog['pet_name']; ?>" height="200px" />
                            </a>
                            <h4><?php echo $dog['pet_name']; ?></h4>
                            <p class="pinput"><?php echo number_format($dog['price'], 0, ',', '.'); ?> VNĐ</p>
                            <button class="add-to-cart" data-product-id="<?php echo $dog['pet_id']; ?>">Thêm vào giỏ hàng</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Không có sản phẩm chó nào.</p>";
                }
                ?>
            </div>
            <div class="Xemthem"> <a href="cho.php" >Xem thêm<i class="fa-solid fa-angle-right fa-2xl"></i></a></div>
        </div>
    </div>
</div>

<div class="Sanphammeo">
    <div class="main-content">
        <div class="sanpham">
            <h1>Sản phẩm nổi bật</h1>
            <div class="product-list">
                <?php
                $sqlCats = "SELECT * FROM pets WHERE pet_type = 'Mèo' ORDER BY RAND() LIMIT 6"; 
                $resultCats = mysqli_query($conn, $sqlCats);

                if (mysqli_num_rows($resultCats) > 0) {
                    while ($cat = mysqli_fetch_assoc($resultCats)) {
                        ?>
                        <div class="product-item">
                            <a href="chitietthucung.php?pet_id=<?php echo $cat['pet_id']; ?>">
                                <img src="./quantri/anh/<?php echo $cat['image_url']; ?>" alt="<?php echo $cat['pet_name']; ?>" height="200px" />
                            </a>
                            <h4><?php echo $cat['pet_name']; ?></h4>
                            <p class="pinput"><?php echo number_format($cat['price'], 0, ',', '.'); ?> VNĐ</p>
                            <button class="add-to-cart" data-product-id="<?php echo $cat['pet_id']; ?>">Thêm vào giỏ hàng</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Không có sản phẩm mèo nào.</p>";
                }
                ?>
            </div>
            <div class="Xemthem"> <a href="cho.php" >Xem thêm<i class="fa-solid fa-angle-right fa-2xl"></i></a></div>
        </div>
    </div>
</div>

<h1 class="title title1">Quyền lợi khi mua hàng tại Petshop</h1>
        <div class="ten">
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-1.gif" width="250" height="250"
                    alt="FREE VẬN CHUYỂN" />
                <p>Miễn phí vận chuyển toàn quốc</p>
            </div>
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-3.gif" width="250" height="250"
                    alt="QUÀ TẶNG HẤP DẪN" />
                <p>Bộ quà tặng trị giá 500k</p>
            </div>
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-4.gif" width="250" height="250"
                    alt="CAM KẾT CHẤT LƯỢNG" />
                <p>Hợp đồng mua bán - Cam kết rõ ràng</p>
            </div>
            <div class="item">
                <img src="./images/image_trangchu/Midnight-Blue-Kids-Brand-Logo-2.gif" width="250" height="250"
                    alt="BẢO HÀNH SỨC KHỎE THÚ CƯNG" />
                <p>Bảo hành sức khỏe - Hỗ trợ trọn đời</p>
            </div>
        </div>
<script src="./js/slideshow.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function updatePrice(currentValue) {
    const formattedValue = new Intl.NumberFormat('vi-VN').format(currentValue) + " VNĐ";
    document.getElementById("current-price").innerText = formattedValue;
}
function applyFilter() {
    const minPrice = document.getElementById("price-range").min;
    const maxPrice = document.getElementById("price-range").value;
    window.location.href = `?start_gia=${minPrice}&end_gia=${maxPrice}`;
}
$(document).ready(function () {
    $('.add-to-cart').on('click', function () {
        const productId = $(this).data('product-id');
        $.ajax({
            url: 'add_to_cart.php', 
            method: 'POST',
            data: { product_id: productId },
            success: function (response) {
                const res = JSON.parse(response); 
                if (res.status === 'success') {
                    
                    $('#cart-count').text(res.cart_count);
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
            }
        });
    });
});
</script>

    <?php include_once('footer.php') ?>


</body>

</html>