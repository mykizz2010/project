<?php
header('content-type: text/csv; charset=utf-8');
header('content-disposition: attachment; filename=report.csv');
require_once("include/dbconnection.php");
  $output = fopen("php://output", "w");
  fputcsv($output, array('staff_id','date','time_in','time_out'));
  $sql = "SELECT * FROM attendance ORDER BY id DESC";
  $result=mysqli_query($db, $sql);
  WHILE($row = mysqli_fetch_assoc($result))
  {
    $data = [$row['staff_id'], $row['date'], $row['time_in'], $row['time_out']];
    fputcsv($output, $data);
  }
  fclose($output);
  exit();

 ?>