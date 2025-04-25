<?php
	session_start();
	require "../cauhinh/ketnoi.php";
	if(isset($_SESSION['tk'])){
		$product_id = $_GET['product_id'];
		// Delete related rows in order_items first
		$sql_delete_order_items = "DELETE FROM order_items WHERE product_id = $product_id";
		mysqli_query($conn, $sql_delete_order_items);
		$sql = "DELETE FROM products WHERE product_id = $product_id";
		$query = mysqli_query($conn, $sql);
		header('location:quantri.php?page_layout=danhsachsp');
	}else{
		header('location:index.php');
	}

?>