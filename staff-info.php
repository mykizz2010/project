<?php 
session_start(); 
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = 2) {
  //
} else {
  header("Location: index.php");
}
require_once("include/dbconnection.php");

  $id = isset($_SESSION['staff_id']) ? $_SESSION['staff_id'] : '';

  $sql = "SELECT * FROM staff WHERE id='$id'";
  $result=mysqli_query($db,$sql);

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
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <div class="col-lg-12 bg-white d-flex">
              <div class="form  align-items-center">
                <div class="content">
                <section class="tables">   
                  <div class="container-fluid">
                    <div class="row"  style="padding-left: 100px;">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-header d-flex align-items-center">
                            <h3 class="h4 pull-right" >ATTENDANCE</h3>
                            <marquee behavior="scroll" scrollamount="3" width="80%">
                            <span style="color: darkblue; padding-top: 10px; font-style: italic; font-weight: 200px;">
                            WELCOME COME BACK? How re you today!!
                            </span>
                          </marquee>
                          </div>
                           <a  href="logout.php" class="btn btn-danger">Logout</a>
                          <div class="card-body">
                          <table class="table table-striped table-responsive">
                            <tbody>
                            <?php if(mysqli_num_rows($result) > 0 )
                             while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                          <tr>
                            <th scope="row"><h3 class="h4">Staff No:</h3></th>
                            <td><?php echo $row['staff_id'];?></td>
                            <th><h3 class="h4">Name:</h3></th>
                            <td colspan="3"><?php echo $row['name'];?></td>
                            <td></td>
                            <td rowspan="2"><img src="<?php echo "img/{$row['image']}";?>" width="150px" height="150px" align="right" /></td>
                          </tr>
                          <tr>
                            <td><h3 class="h4">Department:</h3></td>
                            <td><?php echo $row['department']; ?></td>
                            <th scope="row"><h3 class="h4">Date:</h3></th>
                            <td><?php echo $row['start']; ?></td><td></td>
                          </tr>
                          <tr>
                            <th scope="row"><h3 class="h4">Year:</h3></th>
                            <td><?php echo $row['sex'];?></td>
                            <th><h3 class="h4">Month:</h3></th>
                            <td><?php echo $row['sex']; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="btn btn-success" onclick="alert(new Date());"><a href="signin.php">Sign In</a></td>
                            <td class="btn btn-success"><a href="signout.php">Sign Out</a></td>
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
          <p> G2015/PGD/COMP/FT/526</p>
          </div>
          <br><br><br>
          <a  href="index.php" class="btn btn-danger">Back</a>
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
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