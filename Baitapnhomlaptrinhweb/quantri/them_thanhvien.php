<?php
require "../cauhinh/ketnoi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mat_khau = $_POST['mat_khau'];

    $sql = "INSERT INTO thanhvien (email,name, mat_khau) VALUES ('$email', '$name','$mat_khau')";
    mysqli_query($conn, $sql);
    header("Location: quantri.php?page_layout=thanhvien");
    exit();
}
?>
<link rel="stylesheet" type="text/css" href="css/them_sua_tv.css" />
<form method="POST" action="them_thanhvien.php">
    <label>Tên thành viên:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <!-- <input type="password" name="mat_khau" required> -->
    <input type="text" name="mat_khau" required>
    <button type="submit">Thêm thành viên</button>
</form>