<?php 
session_start(); 
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = 1) {
  //
} else {
  header("Location: index.php");
}
require_once("include/dbconnection.php");

if(isset($_POST['search']))
{
  $ValueSearch = $_POST['values'];
  $sql = "SELECT * FROM staff WHERE name LIKE '%$ValueSearch%' OR state LIKE '%$ValueSearch%' OR country LIKE '%$ValueSearch%' OR sex LIKE '%$ValueSearch%' OR married LIKE '%$ValueSearch%'";
  $result=mysqli_query($db,$sql);
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
              <h2 class="no-margin-bottom">Staff Area</h2>
            </div>
          </header>
        <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                <form method="post" action="">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="values" class="form-control" placeholder="Search For Staff"/><span class="input-group-btn">
                        <button type="submit" name="search" class="btn btn-primary">Go!</button></span>
                    </div>
                  </div>
                </form>
                </div>
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"> Staffs Basic Info </h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th>Staff Name</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Address</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                          <tr>
                            <td><?php echo $row['staff_id'];?></td>
                            <td><?php echo $row['sex']; ?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['state'];?></td>
                            <td><?php echo $row['country'];?></td>
                            <td><?php echo $row['married'];?></td>
                            <td><?php echo $row['department'];?></td>
                            <td><?php echo $row['address'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
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