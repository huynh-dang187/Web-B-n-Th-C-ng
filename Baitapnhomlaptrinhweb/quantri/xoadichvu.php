<?php
	session_start();
	require "../cauhinh/ketnoi.php";
	if(isset($_SESSION['tk'])){
		$id_sp = $_GET['service_id'];
		$sql = "DELETE FROM spa_services WHERE service_id = $id_sp";
		$query = mysqli_query($conn, $sql);
		header('location:quantri.php?page_layout=danhsachdichvu');
	}else{
		header('location:index.php');
	}
?>