<?php
require "../cauhinh/ketnoi.php";
$sql = "SELECT * FROM spa_services";
$query = mysqli_query($conn, $sql);
$error = NULL;

if (isset($_POST['submit'])) {
    // Bẫy lỗi cho các trường dữ liệu trong Form
    // Tên sản phẩm
    if ($_POST['ten_dv'] == '') {
        $error_ten_dv = '<span style="color:red;">Vui lòng nhập tên dịch vụ<span>';
    } else {
        $ten_dv = $_POST['ten_dv'];
    }
    // Giá sản phẩm
    if ($_POST['gia_dv'] == '') {
        $error_gia_dv = '<span style="color:red;">Vui lòng nhập giá dịch vụ<span>';
    } else {
        $gia_dv = $_POST['gia_dv'];
    }
    // Thời gian
    if ($_POST['thoi_gian'] == '') {
        $error_thoi_gian = '<span style="color:red;">Vui lòng nhập thời gian<span>';
    } else {
        $thoi_gian = $_POST['thoi_gian'];
    }

    // Chi tiết sản phẩm
    if ($_POST['chi_tiet_dv'] == '') {
        $error_chi_tiet_dv = '<span style="color:red;">Vui lòng nhập chi tiết dịch vụ<span>';
    } else {
        $chi_tiet_dv = $_POST['chi_tiet_dv'];
    }

    // Kiểm tra tất cả các giá trị
    if (isset($ten_dv) && isset($gia_dv) && isset($thoi_gian)  && isset($chi_tiet_dv) ) {

        move_uploaded_file($tmp_name, 'anh/' . $anh_sp);
        $sql = "INSERT INTO spa_services (service_name, price, duration, description) 
                VALUES ('$ten_dv', $gia_dv, '$thoi_gian', '$chi_tiet_dv')";

        $query = mysqli_query($conn, $sql);
        header('location:quantri.php?page_layout=danhsachdichvu');
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm mới sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Tên dịch vụ</label><br /><input type="text" name="ten_dv" /><?php if (isset($error_ten_dv)) {
                    echo $error_ten_dv;
                } ?></td>
            </tr>
            <tr>
                <td><label>Giá sản phẩm</label><br /><input type="text" name="gia_dv" /> VNĐ <?php if (isset($error_gia_sp)) {
                    echo $error_gia_dv;
                } ?></td>
            </tr>
            <tr>
                <td><label>Thời gian</label><br /><input type="text" name="thoi_gian" value="" /><?php if (isset($error_thoigian)) {
                    echo $error_thoi_gian;
                } ?></td>
            </tr>
            <tr>
                <td><label>Thông tin chi tiết dịch vụ</label><br /><textarea cols="60" rows="12"
                        name="chi_tiet_dv"></textarea>
                    <?php if (isset($error_chi_tiet_dv)) {
                        echo $error_chi_tiet_dv;
                    } ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Thêm mới" />
                    <input type="reset" name="reset" value="Làm mới" />
                </td>
            </tr>
        </table>
    </form>
</div>