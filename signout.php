<?php 
	session_start();

	require_once("include/dbconnection.php");
	$staff_id = $_SESSION['staff_id'];
	$date = date('Y-m-d');

	$sql = "SELECT id from attendance WHERE staff_id = '$staff_id' AND date='$date'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	$id = $row['id'];

	$sql = "UPDATE  attendance SET time_out = now() WHERE id='$id'";
	mysqli_query($db, $sql);
	session_unset();
	session_destroy();
	header("Location: index.php");
?>