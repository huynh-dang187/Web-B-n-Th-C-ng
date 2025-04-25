<?php
	session_start();
	require "../cauhinh/ketnoi.php";
	if(isset($_SESSION['tk'])){
		$pet_id = $_GET['pet_id'];
		$sql = "DELETE FROM pets WHERE pet_id = $pet_id";
		$query = mysqli_query($conn, $sql);
		header('location:quantri.php?page_layout=danhsachthucung');
	}else{
		header('location:index.php');
	}
?>