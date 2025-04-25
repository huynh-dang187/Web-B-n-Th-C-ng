<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/lichsudonhang.css" />
</head>
<body>
    <div class="order-details">
        <?php
        if (isset($_GET['pet_id'])) {
            $pet_id = $_GET['pet_id'];

            // Kết nối đến cơ sở dữ liệu
            require "../cauhinh/ketnoi.php";

            if (!$conn) {
                die("Kết nối không thành công: " . mysqli_connect_error());
            }

            // Truy vấn để lấy thông tin chi tiết đơn hàng
            $sql_details = "SELECT * FROM pets WHERE pet_id = $pet_id";
            $result_details = mysqli_query($conn, $sql_details);

            if (mysqli_num_rows($result_details) > 0) {
                echo "<h4>Chi Tiết thú cưng</h4>";
                
                while ($detail = mysqli_fetch_assoc($result_details)) {
                    echo "<p><b>ID</b>: ". $detail['pet_id']  ." </p>";
                    echo "<p><b>Tên thú cưng</b>: ". $detail['pet_name']  ." </p>";
                    echo "<p><b>Loài</b>: ". $detail['pet_type']  ." </p>";
                    echo "<p><b>Giống</b>: ". $detail['breed']  ." </p>";
                    echo "<p><b>Tuổi</b>: ". $detail['age']  ." </p>";
                    echo "<p><b>Giới tính</b>: ". $detail['gender']  ." </p>";
                    echo "<p><b>Giá</b>: ". $detail['price']  ." </p>";
                    echo "<p><b>Số lượng</b>: ". $detail['quantity']  ." </p>";
                    echo "<p><b>Trạng thái</b>: ". $detail['status']  ." </p>";
                    echo "<p><b>Mô tả</b>: ". $detail['description']  ." </p>";
                    echo "<img style="."width:50px;height:50px;"." src=/anh/".$detail['image_url'] ." alt=". "".">";
                }
                
            } else {
                echo "<p>Không có chi tiết thú cưng.</p>";
            }

            mysqli_close($conn);
        } else {
            echo "<p>Không có ID thú cưng để hiển thị chi tiết.</p>";
        }
        ?>
    </div>
    <b></b>
    <!-- Back to Homepage Button -->
    <a href="quantri.php?page_layout=danhsachthucung" class="back-to-homepage">Quay lại</a>
</body>
</html>
