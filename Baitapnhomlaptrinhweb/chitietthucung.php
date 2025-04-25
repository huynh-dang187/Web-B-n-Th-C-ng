<?php
session_start();
require "./cauhinh/ketnoi.php";


if (isset($_GET['pet_id'])) {
    $pet_id = $_GET['pet_id'];
} else {
    die("Pet ID not provided!");
}


$sql = "SELECT * FROM pets WHERE pet_id = $pet_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$rowsPerPage = 4;
$offset = 2;

$sql1 = "SELECT * FROM pets WHERE breed = '{$row['breed']}' LIMIT $offset, $rowsPerPage ";
$result1 = mysqli_query($conn, $sql1);
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
    <link rel="stylesheet" href="./css/giongcho.css" />
    <link rel="stylesheet" href="./css/giongmeo.css" />
    <script src="./js/Giongmeo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang chủ</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.add-to-cartt').on('click', function () {
                const productId = $(this).data('product-id');
                $.ajax({
                    url: 'add_to_cart.php', // File PHP xử lý
                    method: 'POST',
                    data: { product_id: productId },
                    success: function (response) {
                        const res = JSON.parse(response); // Parse dữ liệu JSON từ server
                        if (res.status === 'success') {
                            // Cập nhật số lượng giỏ hàng
                            $('#cart-count').text(res.cart_count);
                        } else {
                            alert(res.message); // Hiển thị lỗi nếu có
                        }
                    },
                    error: function () {
                        alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
                    }
                });
            });
        });
    </script>
</head>

<body>
    <!-- header -->
    <header class="header fixed">
        <div class="main-content">
            <div class="body-header">
                <!-- logo -->
                <a href="trangchu.php"><img src="./images/image_trangchu/logo.png" alt="Ảnh logos hop"
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
    <article style="
          background-image: url(https://petnow.com.vn/wp-content/uploads/2023/08/bg-featured-title.jpg);
        ">
        <div class="overlay-text">
            <h1><b>Dịch vụ Spa thú cưng</b></h1>
            <p><a href="#!">HOME</a> / DỊCH VỤ SPA THÚ CƯNG</p>
        </div>
    </article>
    <main>

        <!-- Product detail content -->
        <div class="container_detail">
            <div class="product-image">
                <img src="./quantri/anh/<?php echo $row['image_url']; ?>" alt=" ">
            </div>
            <div class="product-info">
                <h1 class="title_product"><?php echo $row['pet_name']; ?></h1>
                <p class="price"><?php echo number_format($row['price'], 0, ',', '.'); ?> VND</p></br>
                <hr color="#ece7e2" width="100%" size="0px" noshade="noshade" />
                <div class="details">
                    <p><strong>Tên:</strong> <?php echo $row['pet_name']; ?><br>
                        <strong>Chó/mèo:</strong> <?php echo $row['pet_type']; ?><br>
                        <strong>Chủng loại:</strong> <?php echo $row['breed']; ?><br>
                        <strong>Tuổi:&nbsp;</strong><?php echo $row['age']; ?><br>
                        <strong>Giới tính:</strong>&nbsp;<?php echo $row['gender']; ?><br>
                        <strong>Đặc điểm:&nbsp;</strong><?php echo $row['description']; ?><br>
                        <strong>Số lượng:&nbsp;</strong><?php echo $row['quantity']; ?><br>
                        <strong>Tình trạng:&nbsp;</strong><?php echo $row['status']; ?><br>
                        <strong>Ngày bán:</strong><?php echo $row['created_at']; ?>
                    </p>
                    <br>
                    <p class="available"><small><?php
                    if ($row['quantity'] > 0) {
                        echo "Có sẵn tại cửa hàng";
                    } else {
                        echo "<a href=\" \">Liên hệ với chúng tôi</a>";
                    }
                    ?></small></p>
                    <a href=""></a>
                </div>
                <div class="quantity-container">
                    <label for="quantity">Chọn số lượng</label>
                    <div class="quantity-controls">
                        <button type="button" class="decrease">-</button>
                        <input type="number" id="quantity" value="1" min="1" />
                        <button type="button" class="increase">+</button>
                    </div>
                </div>
                <button class="add-to-cartt" data-product-id="<?php echo $row['pet_id']; ?>">Thêm vào giỏ hàng</button>

                <div class="category_by">
                    <p><strong>Category:</strong><?php if ($row['pet_type'] == "Chó") { ?>
                            <a href="cho.php?giong=<?php echo $row['breed']; ?>"><?php echo $row['breed']; ?></a>
                            <?php
                    } else { ?>
                            <a href="meo.php?giong=<?php echo $row['breed']; ?>"><?php echo $row['breed']; ?></a>
                            <?php
                    } ?>
                </div>
            </div>
        </div>
        <div id="wrapper">
            <div class="tabs">
                <ul class="nav-tabs">
                    <li class="active"><a href="#tabs-describe">Mô tả</a></li>
                    <li><a href="#tabs-review">Đánh giá</a></li>
                </ul>
                <div class="tabs-content">
                    <div id="tabs-describe" class="tabs-content-item">
                        <p class="p">
                            Mèo Anh lông ngắn màu xám xanh mã AN30842.
                            Bé có bộ lông ngắn và đặc trưng màu xám xanh
                            đẹp mắt, trở thành biểu tượng của sự sang
                            trọng và đẳng cấp. Với vẻ ngoài đẹp mắt,
                            bé còn được biết đến với tính cách đáng yêu
                            và thân thiện, đặc biệt là với trẻ em,
                            đôi mắt tròn xoe, thân hình chắc chắn, cân đối.
                            Lớp lông dày, mượt màu xám xanh đẹp mắt, sang trọng.
                            Tính cách thân thiện, gần gũi, đáng yêu, thông minh
                            chắc chắn sẽ khiến bạn hài lòng, yêu mến khi đưa bé
                            về chung nhà
                        </p>
                    </div>
                    <div id="tabs-review" class="tabs-content-item">
                        <div class="box-review">
                            <p class="no-review">There are no reviews yet.</p>
                            <h2 class="review-title">Review “Mèo Anh lông ngắn màu xám xanh mã AN30842”</h2>
                            <label class="checkbox-label">
                                <input type="checkbox"> Lưu tên của tôi, email, và trang web trong trình duyệt này cho
                                lần
                                bình
                                luận kế tiếp của tôi.
                            </label>
                            <div class="form-group">
                                <input type="text" placeholder="Name" class="form-input">
                                <input type="email" placeholder="Email" class="form-input">
                            </div>
                            <div class="rating-section">
                                <label>Your rating:</label>
                                <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="star-5" type="radio" name="star" />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star" />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star" />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star" />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star" />
                                        <label class="star star-1" for="star-1"></label>
                                    </form>
                                </div>
                            </div>
                            <textarea placeholder="Your review..." class="review-textarea"></textarea>
                            <button class="submit-btn">Submit Review</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-product-same">
            <section class="product-same">
                <h2>Sản phẩm tương tự</h2>
                <ul class="product-same-c4">
                    <?php
                    while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                        <li class="product-same-content">
                            <div class="inner" href="chitietthucung.php?pet_id=<?php echo $row1['pet_id']; ?>">
                                <div class="product-same-c4-thumbnail">
                                    <a class="pic-product-same-c4"
                                        href="chitietthucung.php?pet_id=<?php echo $row1['pet_id']; ?>">
                                        <img src="./quantri/anh/<?php echo $row1['image_url']; ?>"
                                            style="width:200px;height:200px;">
                                        <button class="add-cart-product-same-c4-button"
                                            data-product-id="<?php echo $row['pet_id']; ?>">Xem thêm</button>
                                    </a>
                                </div>
                                <div class="product-same-c4-infor">
                                    <a href="#">
                                        <h4 class="title_product"><?php
                                        echo $row1['pet_name']; ?></h4>
                                        <p class="price"><?php echo number_format($row['price'], 0, ',', '.'); ?> vnđ</p>
                                        </br>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </section>
        </div>


        <!-- end product detail content -->
        <div class="icons">
            <a href="#">
                <img src="./images/image_trangchu/icon-zalo.svg" width="60" height="60" alt="Zalo icon" />
            </a>
            <a href="#">
                <img src="./images/image_trangchu/icon-messenger.svg" height="60" width="60" alt="Messenger icon" />
            </a>
        </div>
        <!-- các thẻ -->
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

    </main>



    <?php include_once('footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/Giongmeo.js"></script>
    <script>
        $(document).ready(function () {
            $('.tabs-content-item').hide();
            $('.tabs-content-item:first-child').fadeIn();
            $('.nav-tabs li').click(function () {
                //active nav-tabs
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');

                //show tab-content item
                let id_tab_content = $(this).children('a').attr('href');
                $('.tabs-content-item').hide();
                $(id_tab_content).fadeIn();
                return false;
            });
        })
    </script>
</body>

</html>