<?php

require "./cauhinh/ketnoi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $timkiem = $_POST["timkiem"];
}

$sql = "SELECT * FROM pets WHERE breed LIKE '%$timkiem%'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if ($data) {
    $data_type = $data['pet_type'];
    if ($data_type == 'Chó') {
        header('Location: cho.php?giong=' . urlencode($data['breed']));
    } else if ($data_type == 'Mèo') {
        header('Location: meo.php?giong=' . urlencode($data['breed']));
    } else {
        // Điều hướng khác nếu cần
        echo "Loài vật không xác định!";
    }
} else {
    echo "Không tìm thấy kết quả!";
}

?>