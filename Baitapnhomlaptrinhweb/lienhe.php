<?php

include './cauhinh/ketnoi.php';
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
    <link rel="stylesheet" href="./css/lienhe.css">
    <link rel="stylesheet" href="./css/datlich.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Giới Thiệu PetShop</title>
    <script src="./js/datlich.js"></script>
</head>

<body style="height: 100000px">
    <!-- header -->
    <?php include_once('header.php') ?>
    <article
        style="
          background-image: url(https://petnow.com.vn/wp-content/uploads/2023/08/bg-featured-title.jpg);margin-bottom: 100px;">
        <div class="overlay-text">
            <h1><b>Liên hệ</b></h1>
            <p><a href="#!">HOME</a> / Liên hệ</p>
        </div>
    </article>
    <main>
        <!--  Đăt lịch Spa cho thú cưng -->

        <div class="DatLich">
            <div class="main-content">
                <form action="process_booking.php" method="post">
                    <div class="datlichhen">
                        <div class="tieude">
                            <h2>Đặt lịch hẹn Spa cho thú cưng</h2>
                        </div>
                        <div class="colums">
                            <!-- left -->
                            <div class="left-colums">
                                <div class="thongtin">
                                    <div class="name namethu">
                                        <h3>Loại thú cưng</h3>
                                        <select name="pet-type" id="pet-type">
                                            <option value="dog">Chó</option>
                                            <option value="cat">Mèo</option>
                                        </select>
                                    </div>
                                    <div class="name namecoso">
                                        <h3>Chọn cơ sở</h3>
                                        <select name="coso-type" id="coso-type">
                                            <option value="CS1">Cơ sở 1</option>
                                            <option value="CS2">Cơ sở 2</option>
                                            <option value="CS3">Cơ sở 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="loaihinhdichvu">
                                    <h3>Chọn loại hình dịch vụ Spa</h3>
                                    <div class="checkbox-group">
                                        <?php
                                        $sql = "SELECT * FROM spa_services";
                                        $result = mysqli_query($conn, $sql);
                                        ?>
                                        <select name="dichvu" id="">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $row['service_id']; ?>">
                                                    <?php echo $row['service_name'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <!-- right -->
                            <div class="right-colums">
                                <div class="thongtin">
                                    <div class="name namethoigian">
                                        <div class="Ngaygio">
                                            <div class="Ngay">
                                                <h2>Chọn Ngày</h2>
                                                <input name="ngay" type="date" id="appointment-date" min="" />
                                            </div>
                                            <div class="Gio">
                                                <h2>Chọn Giờ</h2>
                                                <select name="gio" >
                                                    <option value="8:00">8:00 AM</option>
                                                    <option value="9:00">9:00 AM</option>
                                                    <option value="10:00">10:00 AM</option>
                                                    <option value="11:00">11:00 AM</option>
                                                    <option value="12:00">12:00 PM</option>
                                                    <option value="13:00">1:00 PM</option>
                                                    <option value="14:00">2:00 PM</option>
                                                    <option value="15:00">3:00 PM</option>
                                                    <option value="16:00">4:00 PM</option>
                                                    <option value="17:00">5:00 PM</option>
                                                    <option value="18:00">6:00 PM</option>
                                                    <option value="19:00">7:00 PM</option>
                                                    <option value="20:00">8:00 PM</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="name namelienhe">
                                            <h2>Thông Tin Liên Hệ</h2>
                                            <input name="username" type="text" placeholder="Tên của bạn"
                                                id="customer-name" class="input-text" />
                                            <input name="email" type="email" placeholder="Email" id="customer-name" />
                                            <input name="phone" type="tel" placeholder="Số điện thoại"
                                                id="customer-phone" />
                                            <textarea placeholder="Mô tả yêu cầu đặc biệt (nếu có)" id="description"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submmit" class="submit-button">Xác Nhận Đặt Lịch</button>
                    </div>
                </form>
            </div>
        </div>


    </main>

    <!-- footer -->
    <?php include_once('footer.php') ?>
    <script src="./js/gioithieu.js"></script>
    <script>
        $(document).ready(function () {

            $(".content_title").hide();
            $(".content_title mot").show();
            $(".arow_master").click(function () {
                $(".content_title").not($(this).next()).slideUp(500);
                $(this).next().slideToggle(500);

                // Chuyển đổi trạng thái của mũi tên
                $(".arow_master").not(this).removeClass("expanded");
                $(this).toggleClass("expanded");
            });
        });

    </script>
</body>

</html>