<?php
require "../cauhinh/ketnoi.php";

// Handle status update
if (isset($_POST['update_status'])) {
    $id_sp = $_POST['id_sp'];
    $trang_thai = $_POST['trang_thai'];
    
    // Update query
    $update_sql = "UPDATE pets SET status = '$trang_thai' WHERE pet_id = $id_sp";
    mysqli_query($conn, $update_sql);
}

// Pagination setup
$rowsPerPage = 40;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $rowsPerPage;

// Fetch data with limit
$sql = "SELECT * FROM pets LIMIT $offset, $rowsPerPage";
$query = mysqli_query($conn, $sql);

// Total rows for pagination
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pets"));
$totalPage = ceil($totalRows / $rowsPerPage);
?>
<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<h2>Quản lý thú cưng</h2>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themthucung"><span>Thêm thú cưng mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="10%">Loài</td>
            <td width="15%">Tên thú cưng</td>
            <td width="20%">Giống</td>
            <td width="15%">Giá</td>
            <td width="10%">Ảnh mô tả</td>
            <td width="15%">Tình trạng</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <form method="post">
                <td><span><?php echo $row['pet_id']; ?></span></td>
                <td><span><?php echo $row['pet_type']; ?></span></td>
                <td class="l5"><?php echo $row['pet_name']; ?></td>
                <td class="l5"><span class="price"><?php echo $row['breed']; ?></span></td>
                <td class="l5"><?php echo $row['price'] ?></td>
                <td><span class="thumb"><img width="60" src="anh/<?php echo $row['image_url']; ?>" /></span></td>
                
                <td>
                    <select name="trang_thai">
                        <option value="Còn hàng" <?php if ($row['status'] == 'Còn hàng') echo 'selected'; ?>>Còn hàng</option>
                        <option value="Hết hàng" <?php if ($row['status'] == 'Hết hàng') echo 'selected'; ?>>Hết hàng</option>
                    </select>
                    <input type="hidden" name="id_sp" value="<?php echo $row['pet_id']; ?>" />
                </td>
                <td><a href="quantri.php?page_layout=suathucung&pet_id=<?php echo $row['pet_id']; ?>"><span>Sửa</span></a></td>
                <td><a href="xoathucung.php?pet_id=<?php echo $row['pet_id']; ?>" onclick="return checkDelete();"><span>Xóa</span></a></td>
            </form>
        </tr>
        <?php
        }
        ?>
    </table>
    <p id="pagination">
        <?php
        if ($page > 1) {
            echo '<a href="' . $_SERVER['PHP_SELF'] . '?page_layout=danhsachthucung&page=' . ($page - 1) . '">Trước</a>';
        }

        for ($i = 1; $i <= $totalPage; $i++) {
            if ($i == $page) {
                echo " <span>" . $i . "</span> ";
            } else {
                echo ' <a href="' . $_SERVER['PHP_SELF'] . '?page_layout=danhsachthucung&page=' . $i . '">' . $i . '</a> ';
            }
        }

        if ($page < $totalPage) {
            echo '<a href="' . $_SERVER['PHP_SELF'] . '?page_layout=danhsachthucung&page=' . ($page + 1) . '">Sau</a>';
        }
        ?>
    </p>
    <p>Tổng số thú cưng: <?php echo $totalRows; ?> | Trang: <?php echo $page; ?> / <?php echo $totalPage; ?></p>
</div>

<script type="text/javascript">
    function checkDelete() {
        return confirm("Bạn có muốn xóa sản phẩm này không?");
    }
</script>
