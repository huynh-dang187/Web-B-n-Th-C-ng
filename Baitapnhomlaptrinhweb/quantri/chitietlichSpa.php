<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/lichsudonhang.css" />
</head>
<body>
    <div class="order-details">
        <?php
        if (isset($_GET['id_donhang'])) {
            $id_booking = $_GET['id_donhang'];
            // Kết nối đến cơ sở dữ liệu
            require "../cauhinh/ketnoi.php";

            if (!$conn) {
                die("Kết nối không thành công: " . mysqli_connect_error());
            }

            // Truy vấn để lấy thông tin chi tiết đơn hàng
            $sql_details = "SELECT * FROM spa_booking WHERE booking_id = $id_booking";
            $result_details = mysqli_query($conn, $sql_details);

            if (mysqli_num_rows($result_details) > 0) {
                echo "<h4>Chi Tiết Lịch Spa</h4>";
                echo "<table>
                        <tr>
                            <th>Tên Khách hàng</th>
                            <th>Tên dịch vụ</th>
                            <th>Loại thú cưng</th>
                            <th>Giá</th>
                            <th>Thời gian</th>
                        </tr>";
                while ($detail = mysqli_fetch_assoc($result_details)) {
                    $id_service = $detail['service_id'];
                    $serivce_check = mysqli_query($conn,"SELECT * FROM spa_services WHERE service_id = $id_service");
                    $serivce_check = mysqli_fetch_assoc($serivce_check);
                    echo "<tr>
                            <td>" . $detail['username'] . "</td>
                            <td>" . $serivce_check['service_name'] . "</td>
                            <td>" . $detail['pet_type'] . "</td>
                            <td>" . number_format($serivce_check['price'], 0, ',', '.') . "₫</td>
                            <td>" . $serivce_check['duration'] . "</td>
        
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Không có chi tiết đơn hàng.</p>";
            }

            mysqli_close($conn);
        }else {
            echo "<p>Không có ID đơn hàng để hiển thị chi tiết.</p>";
        }
        ?>
    </div>

    <!-- Back to Homepage Button -->
    <a href="quantri.php?page_layout=quanlydonhang" class="back-to-homepage">Quay lại</a>
</body>
</html>
