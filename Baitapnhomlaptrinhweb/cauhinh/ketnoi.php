<?php
	$dbHost = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	// $dbName = 'trangsucshop';
	$dbName = 'thucungshop';

	$conn = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName,'3306');
	if ($conn){
          $setLang=mysqli_query($conn, "SET NAMES 'utf8'");
		//   echo " Kết nối thành công " ;
	}
	else {
		die ('Kết nối thất bại!'.mysqli_connect_error());
	}

?>