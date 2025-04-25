<?php
    require "../cauhinh/ketnoi.php";

    // // Handle status update
    // if (isset($_POST['update_status'])) {
    //     $id_sp = $_POST['id_sp'];
    //     $trang_thai = $_POST['trang_thai'];
        
    //     // Update query
    //     $update_sql = "UPDATE spa_services SET trang_thai = '$trang_thai' WHERE id_sp = $id_sp";
    //     mysqli_query($conn, $update_sql);
    // }

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowsPerPage = 40;
    $perRow = $page * $rowsPerPage - $rowsPerPage;
    $sql = "SELECT * FROM spa_services ";
    $query = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<h2>Quản lý dịch vụ</h2>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themdichvu"><span>Thêm dịch vụ mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="10%">Tên dịch vụ</td>
            <td width="15%">Mô tả</td>
            <td width="5%">Giá</td>
            <td width="3%">Thời gian</td>
            <td width="2%">Sửa</td>
            <td width="2%">Xóa</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <form method="post">
                <td><span><?php echo $row['service_id']; ?></span></td>
                <td class="l5"><?php echo $row['service_name']; ?></td>
                <td class="l5"><?php echo $row['description'] ?></td>
                <td class="l5"><span class="price"><?php echo $row['price']; ?> VNĐ</span></td>
                <td><span><?php echo $row['duration']; ?></span></td>
                <td><a href="quantri.php?page_layout=suadichvu&service_id=<?php echo $row['service_id']; ?>"><span>Sửa</span></a></td>
                <td><a href="xoadichvu.php?service_id=<?php echo  $row['service_id']; ?> " onclick="return checkDelete();"><span>Xóa</span></a></td>
                
            </form>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM spa_services"));
    $totalPage = ceil($totalRows / $rowsPerPage);
    $listPage = '';
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($i == $page) {
            $listPage .= " <span>" . $i . "</span> ";
        } else {
            $listPage .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page_layout=danhsachdichvu&page=' . $i . '">' . $i . '</a> ';
        }
    }
    ?>
    <p id="pagination"><?php echo $listPage; ?></p>
</div>

<script type="text/javascript">
        function checkDelete() {
            return confirm("Bạn có muốn xóa sản phẩm này không?");
        }
</script>
