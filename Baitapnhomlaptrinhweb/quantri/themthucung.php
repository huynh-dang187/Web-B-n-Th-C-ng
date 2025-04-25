<?php
require "../cauhinh/ketnoi.php";
$sql = "SELECT * FROM pets";
$query = mysqli_query($conn, $sql);
$error = NULL;

if (isset($_POST['submit'])) {
    // Bẫy lỗi cho các trường dữ liệu trong Form
    // Tên sản phẩm
    if ($_POST['pet_name'] == '') {
        $error_pet_name = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $pet_name = $_POST['pet_name'];
        
    }

    // Giá sản phẩm
    if ($_POST['price'] == '') {
        $error_price = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $price = $_POST['price'];
        
    }

    // loài
    if ($_POST['pet_type'] == '') {
        $error_pet_type = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $pet_type = $_POST['pet_type'];
        
    }
    // Giống thú cưng
    if ($_POST['breed'] == '') {
        $error_breed = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $breed = $_POST['breed'];
        
    }
    // Giới tính
    if ($_POST['gender'] == '') {
        $error_gender = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $gender = $_POST['gender'];
        
    }
    // Tuổi
    if ($_POST['age'] == '') {
        $error_age = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $age = $_POST['age'];
        
    }
    // Số lượng sản phẩm
    if ($_POST['quantity'] == '') {
        $error_quantity = '<span style="color:red;">Vui lòng nhập số lượng sản phẩm hợp lệ</span>';
        $error = true;
    } else {
        $quantity = $_POST['quantity'];
        
    }

    // Chi tiết sản phẩm
    if ($_POST['description'] == '') {
        $error_description = '<span style="color:red;">(*)</span>';
        $error = true;
    } else {
        $description = $_POST['description'];
        
    }

    // Ảnh mô tả sản phẩm
    if ($_FILES['image_url']['name'] == '') {
        $error_image_url = '<span style="color:red;">(*)<span>';
    } else {
        $image_url = $_FILES['image_url']['name'];
        $tmp = $_FILES['image_url']['tmp_name'];
    }


    // Kiểm tra tất cả các giá trị
    if (isset($pet_name) && isset($price) && isset($breed) && isset($age) && isset($description) && isset($image_url) && isset($quantity) && isset($gender) && isset($pet_type)) {

        move_uploaded_file($tmp, 'anh/' . $image_url);
        $sql = "INSERT INTO Pets (pet_name, pet_type, breed, age, gender, description, price, quantity, status, image_url) 
                VALUES ('$pet_name', '$pet_type', '$breed', $age, '$gender', '$description', $price, $quantity,'Còn hàng' ,'$image_url')";

        $query = mysqli_query($conn, $sql);
        header('location:quantri.php?page_layout=danhsachthucung');
    }
    
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm mới sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <label>Tên thú cưng</label><br />
                    <input type="text" name="pet_name" />
                    <?php if (isset($error_pet_name)) {
                        echo $error_pet_name;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Ảnh mô tả</label><br />
                    <input type="file" name="image_url" />
                    <!-- <input type="text" disabled value="<?php echo $arr['image_url']; ?>" /> -->
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giá thú cưng</label><br />
                    <input type="text" name="price" />
                    <?php if (isset($error_price)) {
                        echo $error_price;
                    } ?> VNĐ
                </td>
            </tr>
            <tr>

                <td>
                    <label>Loài</label><br />
                    <select name="pet_type">
                        <option value="Chó">Chó</option>
                        <option value="Mèo">Mèo</option>
                    </select>
                    <?php if (isset($error_pet_type)) {
                        echo $error_pet_type;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giống</label><br />
                    <input type="text" name="breed" />
                    <?php if (isset($error_breed)) {
                        echo $error_breed;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giới tính</label><br />
                    <select name="gender">
                        <option value="Đực">Đực</option>
                        <option value="Cái">Cái</option>
                    </select>
                    <?php if (isset($error_gender)) {
                        echo $error_gender;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tuổi</label><br />
                    <input type="text" name="age"  />
                    <?php if (isset($error_age)) {
                        echo $error_age;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số lượng </label><br />
                    <input type="text" name="quantity" />
                    <?php if (isset($error_quantity)) {
                        echo $error_quantity;
                    } ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Thông tin chi tiết thú cưng</label><br />
                    <textarea cols="60" rows="12" name="description"></textarea>
                    <?php if (isset($error_description)) {
                        echo $error_description;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Lưu" />
                    <input type="reset" name="reset" value="Làm mới" />
                </td>
            </tr>
        </table>
    </form>
</div>