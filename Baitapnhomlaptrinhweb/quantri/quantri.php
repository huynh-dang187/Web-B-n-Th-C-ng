<?php
session_start();
require "../cauhinh/ketnoi.php";
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Quản lí thú cưng Shop</title>
    <link rel="stylesheet" type="text/css" href="css/quantri1.css" />
    <script type="text/javascript">
        function confirmLogout() {
            return confirm("Bạn có muốn đăng xuất không?");
        }
    </script>
</head>

<body>
    <div id="header">
        <a href="#"><img src="./anh/logo.png" /></a>
        <div id="navbar">
            <ul>
                <li id="admin-home"><a href="quantri.php?page_layout=quanlydonhang">Trang chủ</a></li>
                <li><a href="quantri.php?page_layout=thanhvien">Thành viên</a></li>
                <li><a href="quantri.php?page_layout=danhsachthucung">Thú Cưng</a></li>
                <li><a href="quantri.php?page_layout=danhsachdichvu">Dịch vụ Spa</a></li>
                <li><a href="quantri.php?page_layout=quanlydonhang">Quản lý đơn hàng</a></li>
                <li><a href="quantri.php?page_layout=quanlylichSpa">Quản lý Lịch Spa</a></li>
            </ul>
            <div id="user-info">
                <p><span><?php echo $_SESSION['tk']; ?></span></p>
                <p><a href="dangxuat.php" onclick="return confirmLogout();">Đăng xuất</a></p>
            </div>
        </div>
    </div>
    <div id="body">
        <?php
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'danhsachthucung':
                    include_once('danhsachthucung.php');
                    break;
                case 'themthucung':
                    include_once('themthucung.php');
                    break;
                case 'suathucung':
                    include_once('suathucung.php');
                    break;
                case 'chitietthucung':
                    include_once('chitietthucung.php');
                    break;
                case 'danhsachdichvu':
                    include_once('danhsachdichvu.php');
                    break;
                case 'themdichvu':
                    include_once('themdichvu.php');
                    break;
                case 'suadichvu':
                    include_once('suadichvu.php');
                    break;
                case 'quanlydonhang':
                    include_once('quanlydonhang.php');
                    break;
                case 'chitietdonhang':
                    include_once('chitietdonhang.php');
                    break;
                case 'quanlylichSpa':
                    include_once('quanlylichSpa.php');
                    break;
                case 'chitietlichSpa':
                    include_once('chitietlichSpa.php');
                    break;
                case 'thanhvien':
                    include_once('thanhvien.php');
                    break;
                case 'them_thanhvien':
                    include_once('them_thanhvien.php');
                    break;
                case 'sua_thanhvien':
                    include_once('sua_thanhvien.php');
                    break;
            }
        } else {
            include_once('quanlydonhang.php');
        }
        ?>

    </div>
    
</body>

</html>