<?php
ob_start();
require "../cauhinh/ketnoi.php";
$service_id = $_GET['service_id'];
$sql = "SELECT * FROM spa_services WHERE service_id = $service_id";
$query = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($query);
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Sửa thông tin sản phẩm</h2>
<div id="main">
    <form method="post" >
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <label>Tên dịch vụ</label><br />
                    <input type="text" name="ten_dv" value="<?php echo isset($_POST['ten_dv']) ? $_POST['ten_dv'] : $arr['service_name']; ?>" />
                    <?php if (isset($error_ten_dv)) { echo $error_ten_dv; } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giá dịch vụ</label><br />
                    <input type="text" name="gia_dv" value="<?php echo isset($_POST['gia_dv']) ? $_POST['gia_dv'] : $arr['price']; ?>" />
                    <?php if (isset($error_gia_dv)) { echo $error_gia_dv; } ?> VNĐ
                </td>
            </tr>
           
            <tr>
                <td>
                    <label>Thời gian</label><br />
                    <input type="text" name="thoi_gian" value="<?php echo isset($_POST['thoi_gian']) ? $_POST['thoi_gian'] : $arr['duration']; ?>" />
                    <?php if (isset($error_thoi_gian)) { echo $error_thoi_gian; } ?>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Thông tin chi tiết sản phẩm</label><br />
                    <textarea type="text" cols="60" rows="12" name="chi_tiet_dv"><?php echo isset($_POST['chi_tiet_dv']) ? $_POST['chi_tiet_dv'] : $arr['description']; ?></textarea>
                    <?php if (isset($error_chi_tiet_dv)) { echo $error_chi_tiet_dv; } ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $error = false;

    // Tên dịch vụ
    if (empty($_POST['ten_dv'])) {
        $error_ten_dv = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $ten_dv = $_POST['ten_dv'];
    }
    
    // Giá dịch vụ
    if (empty($_POST['gia_dv'])) {
        $error_gia_dv = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $gia_dv = $_POST['gia_dv'];
    }
    
    // Thời gian
    if (empty($_POST['thoi_gian'])) {
        $error_thoi_gian = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $thoi_gian = $_POST['thoi_gian'];
        
    }
    
    // Chi tiết dịch vụ
    if (empty($_POST['chi_tiet_dv'])) {
        $error_chi_tiet_sp = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $chi_tiet_dv = $_POST['chi_tiet_dv'];
    }
    
    // Xử lý cập nhật thông tin sản phẩm
    if (!$error) {
        $sqlUpdate = "UPDATE spa_services SET 
                      service_name = '$ten_dv',  
                      price = '$gia_dv', 
                      duration = '$thoi_gian',  
                      description = '$chi_tiet_dv' 
                      WHERE service_id = $service_id";
        
        $queryUpdate = mysqli_query($conn, $sqlUpdate);
        header('location:quantri.php?page_layout=danhsachdichvu');
    }
}

ob_end_flush();
?>
