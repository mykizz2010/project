<?php 
	session_start();

	require_once("include/dbconnection.php");
	$staff_id = $_SESSION['staff_id'];

	$sql = "INSERT INTO attendance (staff_id, date, time_in) VALUES ('$staff_id', now(), now())";
	mysqli_query($db, $sql);
	session_unset();
	session_destroy();
	header("Location: index.php");
?>