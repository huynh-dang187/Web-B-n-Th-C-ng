<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/lichsudonhang.css" />
    <link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
</head>
<body>
    <div class="order-details">
        <?php
        if (isset($_GET['order_id'])) {
            $id_donhang = $_GET['order_id'];
            $username = $_GET['username'];

            // Kết nối đến cơ sở dữ liệu
            require "../cauhinh/ketnoi.php";

            if (!$conn) {
                die("Kết nối không thành công: " . mysqli_connect_error());
            }

            // Truy vấn để lấy thông tin chi tiết đơn hàng
            $sql_details = "SELECT * FROM order_items WHERE order_id = $id_donhang";
            $result_details = mysqli_query($conn, $sql_details);

            if (mysqli_num_rows($result_details) > 0) {
                echo "<h4>Chi Tiết Đơn Hàng của khách hàng : ". $username ."</h4>";
                echo "<table>
                        <tr>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh mô tả</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>";
                while ($detail = mysqli_fetch_assoc($result_details)) {
                    $petID= $detail["pet_id"];
                    $check_product = mysqli_query($conn,"SELECT * FROM pets WHERE pet_id = $petID");
                    $detail_product = mysqli_fetch_assoc($check_product) ;
                    $tongtien = $detail['price'] * $detail['quantity'];
                    echo "<tr>
                            <td>" . $detail_product['pet_name'] . "</td>
                            <td><span class=\"thumb\" ><img style=\"width:60px;\" src=\"anh/". $detail_product['image_url'] ."\" /></span></td>
                            <td>" . number_format($detail['price'], 0, ',', '.') . "₫</td>
                            <td>" . $detail['quantity'] . "</td>
                            <td>" . number_format($tongtien, 0, ',', '.') . "₫</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Không có chi tiết đơn hàng.</p>";
            }

            mysqli_close($conn);
        } else {
            echo "<p>Không có ID đơn hàng để hiển thị chi tiết.</p>";
        }
        ?>
    </div>

    <!-- Back to Homepage Button -->
    <a href="quantri.php?page_layout=quanlydonhang" class="back-to-homepage">Quay lại</a>
</body>
</html>
