<?php 
session_start(); 
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = 1) {
  //
} else {
  header("Location: index.php");
}
 require_once("include/dbconnection.php"); 

  $id = $_GET['id']; 

  $sql = "SELECT * FROM staff WHERE id='$id'";
  $result=mysqli_query($db,$sql);

  if(mysqli_num_rows($result) > 0 ){
    while($row=mysqli_fetch_assoc($result))
    {
      $name = $row["name"];
      $sex = $row["sex"];
      $phone = $row["phone"];
      $married = $row["married"];
      $address = $row["address"];
      $email = $row["email"];
      $occupation = $row["occupation"];
      $state = $row["state"];
      $country = $row["country"];
      $staff_id = $row["staff_id"];
      $department = $row["department"];
      $designation = $row["designation"];
      $start = $row["start"];
      $image = $row["image"];
    }
  }
if(isset($_POST['update']))
{
  $name = $_POST["name"];
  $sex = $_POST["sex"];
  $phone = $_POST["phone"];
  $married = $_POST["married"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $occupation = $_POST["occupation"];
  $state = $_POST["state"];
  $country = $_POST["country"];
  //$staff_id = $_POST["staff_id"];
  $department = $_POST["department"];
  $designation = $_POST["designation"];
  //$image = $_POST["image"];
  //$start = $_POST["start"];
  

$file = $_FILES['file'];
  //print_r($file);
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

if($image){
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed  = array('jpg','jpeg','gif','png','pdf');
if(in_array($fileActualExt, $allowed)){
  if($fileError == 0){
    if($fileSize < 1000000){
      $fileNameNew = uniqid('', true). ".". $fileActualExt;
      $fileDestination = 'img/'.$fileNameNew;
      unlink('img/' . $image);
      move_uploaded_file($fileTmpName, $fileDestination);

      $sql = "UPDATE staff SET
      name='$name',
      sex='$sex',
      phone = '$phone',
      married = '$married',
      address = '$address',
      email = '$email',
      occupation = '$occupation',
      state = '$state',
      country = '$country',
      department = '$department',
      department = '$department',
      image = '$fileNameNew'
      WHERE id='$id'";

      $result=mysqli_query($db,$sql);
      if($result){
        echo '<script>alert("Update Successfully!!"); location.href="staff.php";</script>';
      }else{
        echo "Error Updating User".mysql_error($db);
      }
    }
    }   
    }
  }
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S.M.S</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="admin.php" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span><strong>Staff Management System</strong></span></div>
                  <div class="brand-text brand-small"><strong>SMS</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Logout    -->
                <li class="nav-item"><a href="index.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="title">
              <h1 class="h4">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
            <li class="active"> <a href="admin.php"><i class="icon-home"></i>Home</a></li>
            <li> <a href="enrolment.php"> <i class="icon-grid"></i>Enrolment </a></li>
            <li> <a href="staff.php"> <i class="fa fa-bar-chart"></i>Staff </a></li>
            <li> <a href="attendance.php"> <i class="icon-padnote"></i>Attendance </a></li>
            <li> <a href="report.php"> <i class="icon-interface-windows"></i>Report</a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Enrolment of new sfaff</h2>
            </div>
          </header>
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                <!-- Basic Form-->

                <div class="col-lg-1">
                &nbsp;
                </div>

                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                       <h3 class="h4">PERSONAL DATA:</h3>
                    </div>

                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                         <div class="col-sm-12">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="name" placeholder="Full Name" class="form-control" value="<?php echo $name; ?>">
                              </div>
                              <div class="col-sm-6 select">
                                <select name="sex" class="form-control" value="<?php echo $sex; ?>">
                                  <option>Sex</option>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="<?php echo $phone; ?>">
                              </div>
                             <div class="col-sm-6 select">
                                <select name="married" class="form-control" value="<?php echo $married; ?>">
                                  <option>Marital Status</option>
                                  <option>Married</option>
                                  <option>Single</option>
                                  <option>Devours</option>
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="address" placeholder="Home Address" class="form-control" value="<?php echo $address; ?>">
                              </div>
                              <div class="col-md-6">
                                <input type="text" name="email" placeholder="Email Address" class="form-control" value="<?php echo $email; ?>">
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="occupation" placeholder="Occupation" class="form-control" value="<?php echo $occupation; ?>">
                              </div>
                              <div class="col-md-6">
                                <input type="text" name="state" placeholder="State Of Origin" class="form-control" value="<?php echo $state; ?>">
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="country" placeholder="Country" class="form-control" value="<?php echo $country; ?>">
                              </div>
                              <div class="col-md-6">
                                <label class="col-sm-3 form-control-label">Passport:</label>
                                <input class="col-sm-3" type="file" name="file" value="<?php echo $image; ?>">
                              </div>
                            </div><br>
                            <div class="card-header d-flex align-items-center">
                               <h3 class="h4">COMPANY INFORMATION:</h3>
                            </div><br>

                            <div class="row">
                              <div class="col-md-6">
                              <label class="form-control-label"><h3 class="h4">Staff No:</h3></label>
                                <input type="text" name="staff_id"  class="form-control" disabled="" value="<?php echo $staff_id; ?>">
                              </div>
                              <div class="col-md-6">
                              <label class="form-control-label"><h3 class="h4">Department:</h3></label>
                                <input type="text" name="department" class="form-control" value="<?php echo $department; ?>">
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-6">
                              <label class="form-control-label"><h3 class="h4">Designation:</h3></label>
                                <input type="text" name="designation" class="form-control" value="<?php echo $designation; ?>">
                              </div>
                              <div class="col-md-6">
                              <label class="form-control-label"><h3 class="h4">Appiontment Date:</h3></label>
                                <input type="date" name="start" class="form-control" placeholder="Y-M-D" disabled="" value="<?php echo $start; ?>">
                              </div>
                            </div>

                            <div class="card-header d-flex align-items-center">
                               <h3 class="h4">STAFF ACCESS LOGIN:</h3>
                            </div><br>

                            <div class="row">
                              <div class="col-md-6">
                              <label class="form-control-label"><h3 class="h4">Username:</h3></label>
                                <input type="text" name="username" id="username"  class="form-control">
                              </div>
                              <div class="col-md-6">
                              <label class="form-control-label"><h3 class="h4">Password:</h3></label>
                                <input type="password" name="password" id="password" class="form-control">
                              </div>
                            </div><br>
                            <button type="post" id="update" name="update" class="btn btn-primary pull-right">Update </button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>S.M.S &copy; 2016-2017</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Silvester Nwekpe</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>