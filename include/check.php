<?php require_once("include/dbconnection.php"); ?>
<?php
session_start();
$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($db,"SELECT username FROM admin WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$admin_user=$row['username'];

if(!isset($user_check))
{
header("Location: admin.php?admin_user={$admin_user}");
}
?>