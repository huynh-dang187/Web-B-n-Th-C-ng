<?php
ob_start();
require "../cauhinh/ketnoi.php";
$pet_id = $_GET['pet_id'];
$sql = "SELECT * FROM pets WHERE pet_id = $pet_id";
$query = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($query);
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Sửa thông tin sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <label>Tên thú cưng</label><br />
                    <input type="text" name="pet_name"
                        value="<?php echo isset($_POST['pet_name']) ? $_POST['pet_name'] : $arr['pet_name']; ?>" />
                    <?php if (isset($error_pet_name)) {
                        echo $error_pet_name;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Ảnh mô tả</label><br />
                    <input type="file" name="image_url" />
                    <input type="text" disabled value="<?php echo $arr['image_url']; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giá thú cưng</label><br />
                    <input type="text" name="price"
                        value="<?php echo isset($_POST['price']) ? $_POST['price'] : $arr['price']; ?>" />
                    <?php if (isset($error_price)) {
                        echo $error_price;
                    } ?> VNĐ
                </td>
            </tr>
            <tr>

                <td>
                    <label>Loài</label><br />
                    <select name="pet_type">
                        <option value="Chó" <?php if ($arr['pet_type'] == "Chó") {
                            echo "selected";
                        } ?>>Chó</option>
                        <option value="Mèo" <?php if ($arr['pet_type'] == "Mèo") {
                            echo "selected";
                        } ?>>Mèo</option>
                    </select>
                    <?php if (isset($error_pet_type)) {
                        echo $error_pet_type;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giống</label><br />
                    <input type="text" name="breed"
                        value="<?php echo isset($_POST['breed']) ? $_POST['breed'] : $arr['breed']; ?>" />
                    <?php if (isset($error_breed)) {
                        echo $error_breed;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giới tính</label><br />
                    <select name="gender">
                        <option value="Đực" <?php if ($arr['gender'] == "Đực") {
                            echo "selected";
                        } ?>>Đực</option>
                        <option value="Cái" <?php if ($arr['gender'] == "Cái") {
                            echo "selected";
                        } ?>>Cái</option>
                    </select>
                    <?php if (isset($error_gender)) {
                        echo $error_gender;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tuổi</label><br />
                    <input type="text" name="age"
                        value="<?php echo isset($_POST['age']) ? $_POST['age'] : $arr['age']; ?>" />
                    <?php if (isset($error_age)) {
                        echo $error_age;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Trạng thái</label><br />
                    <input type="text" name="status" readonly value="<?php
                    if ($arr['quantity'] >= 1) {
                        echo "Còn hàng";
                    } else {
                        echo "Hết hàng";
                    }
                    ?>" />
                    <?php if (isset($error_status)) {
                        echo $error_status;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số lượng </label><br />
                    <input type="text" name="quantity"
                        value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : $arr['quantity']; ?>" />
                    <?php if (isset($error_quantity)) {
                        echo $error_quantity;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Thông tin chi tiết thú cưng</label><br />
                    <textarea cols="60" rows="12"
                        name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $arr['description']; ?></textarea>
                    <?php if (isset($error_description)) {
                        echo $error_description;
                    } ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset"
                        value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $error = false;

    // Tên sản phẩm
    if (empty($_POST['pet_name'])) {
        $error_pet_name = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $pet_name = $_POST['pet_name'];
    }

    // Giá sản phẩm
    if (empty($_POST['price'])) {
        $error_price = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $price = $_POST['price'];
    }

    // loài
    if (empty($_POST['pet_type'])) {
        $error_pet_type = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $pet_type = $_POST['pet_type'];
    }
    // Giống thú cưng
    if (empty($_POST['breed'])) {
        $error_breed = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $breed = $_POST['breed'];
    }
    // Giới tính
    if (empty($_POST['gender'])) {
        $error_gender = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $gender = $_POST['gender'];
    }
    // Tuổi
    if (empty($_POST['age'])) {
        $error_age = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $age = $_POST['age'];
    }

    // Trạng thái
    if (empty($_POST['status'])) {
        $error_status = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $status = $_POST['status'];
    }

    // Số lượng sản phẩm
    if (empty($_POST['quantity']) || !is_numeric($_POST['quantity']) || $_POST['quantity'] < 0) {
        $error_quantity = '<span style="color:red;">Vui lòng nhập số lượng sản phẩm hợp lệ</span>';
        $error = true;
    } else {
        $quantity = $_POST['quantity'];
    }

    // Chi tiết sản phẩm
    if (empty($_POST['description'])) {
        $error_description = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $description = $_POST['description'];
    }

    // Ảnh mô tả sản phẩm
    if (empty($_FILES['image_url']['name'])) {
        $image_url = $arr['image_url'];
    } else {
        $image_url = $_FILES['image_url']['name'];
        $tmp = $_FILES['image_url']['tmp_name'];
        move_uploaded_file($tmp, 'anh/' . $image_url);
    }

    // Xử lý cập nhật thông tin sản phẩm
    if (!$error) {
        $sqlUpdate = "UPDATE pets SET 
                      pet_name = '$pet_name', 
                      image_url = '$image_url', 
                      price = $price, 
                      pet_type = '$pet_type', 
                      breed = '$breed', 
                      age = '$age', 
                      status = '$status', 
                      quantity = $quantity, 
                      gender = '$gender', 
                      description = '$description' 
                      WHERE pet_id = $pet_id";

        $queryUpdate = mysqli_query($conn, $sqlUpdate);
        header('location:quantri.php?page_layout=danhsachthucung');
    }
}

ob_end_flush();
?>