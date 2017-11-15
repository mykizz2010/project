<?php 
session_start(); 
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = 1) {
  //
} else {
  header("Location: index.php");
}
require_once("include/dbconnection.php");

if(isset($_POST['submit']))
{
  $DailySearch = $_POST['daily'];
  $sql = "SELECT * FROM attendance WHERE date='$DailySearch'";
  $result=mysqli_query($db, $sql);
}
if(isset($_POST['post']))
{
  $joint_date = $_POST['year'] . '-' . $_POST['monthly'] . '%';
  $sql = "SELECT * FROM attendance WHERE date(date) LIKE '$joint_date'";
  $result=mysqli_query($db, $sql);
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
              <h2 class="no-margin-bottom">Daily Staff Attendance</h2>
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
                            <div class="col-sm-2 select"><h3 class="h4">Select Date:</h3></div>
                              <div class="col-sm-4 select">
                                <input type="date" class="form-control" name="daily" placeholder="YY-MM-DD">
                            </div>
                              <div class="col-md-6">
                                <button type="post" id="submit" name="submit" class="btn btn-success">Generate Daily Report</button>
                              </div>
                            </div><br>
                            <div class="card-header d-flex align-items-center">
                               <h3 class="h4">MONTHLY REPORT:</h3>
                            </div>
                            <div class="row">
                              <div class="col-md-8">
                                <br>
                                <table class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>Staff No</th>
                                    <th>Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($_POST['submit']) || isset($_POST['post']))
                                {
                                if(mysqli_num_rows($result) > 0 ){
                                 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                                  <tr>
                                    <td><?php echo $row['staff_id'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row['time_in'];?></td>
                                    <td><?php echo $row['time_out'];?></td>
                                  </tr>
                                  
                                 <?php }}} ?>
                                </tbody>
                              </table>
                              <!-- <button type="post" id="submit" name="export" class="btn btn-info pull-right">Download Report</button> -->
                                <a href="export.php" class="btn btn-info">Download Report</a>
                              </div>
                             <div class="col-sm-4 select">
                                <label class="col-sm-2 form-control-label"><h3 class="h4">DATE:</h3></label>
                                <select name="monthly" class="form-control">
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                                </select><br>
                                <label class="col-sm-2 form-control-label"><h3 class="h4">YEAR:</h3></label>
                                <select name="year" class="form-control">
                                  <option value="2017">2017</option>
                                  <option value="2016">2016</option>
                                  <option value="2015">2015</option>
                                  <option value="2014">2014</option>
                                  <option value="2013">2013</option>
                                  <option value="2012">2012</option>
                                  <option value="2011">2011</option>
                                  <option value="2010">2010</option>
                                  <option value="2009">2009</option>
                                  <option value="2008">2008</option>
                                  <option value="2007">2007</option>
                                  <option value="2006">2006</option>
                                </select><br>
                                <button type="post" id="submit" name="post" class="btn btn-success">Generate Daily Monthly</button>
                            </div>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>          <!-- Page Footer-->
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