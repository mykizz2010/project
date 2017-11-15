<?php require_once("include/dbconnection.php"); ?>
<?php
  session_start(); 
     

  //session_start();
  //include("dbconnection.php"); //Establishing connection with our database
  
  $error = ""; //Variable for storing our errors.
  if(isset($_POST["submit"]))
  {
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
      $error = "Both fields are required.";
    }else
    {
      // Define $username and $password
      $username=$_POST['username'];
      $password=$_POST['password'];
      

      // To protect from MySQL injection
      $username = stripslashes($username);
      $password = stripslashes($password);
      $username = mysqli_real_escape_string($db, $username);
      $password = mysqli_real_escape_string($db, $password);
      
      //Check username and password from database
      $sql="SELECT * FROM staff WHERE username='$username'";
      $result=mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      //If username and password exist in our database then create a session.
      //Otherwise echo error.
      
      if(mysqli_num_rows($result)== 1)
      {
        $password_hash = $row['password'];
        if(password_verify($password,$password_hash))
        $_SESSION['logged_in'] = 2;
        $_SESSION['staff_id'] = $row['id'];
        header("Location: staff-info.php"); // Redirecting To Other Page
      }else
      {
        $error = "Incorrect username or password.";
      }

    }
  }

mysqli_close($db);
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
            <!-- Logo & Information Panel-->
            <div class="col-lg-3">
                 &nbsp;
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
	            	<p style="color: #f22836; padding-top: 10px; padding-left: 120px; font-style: italic; font-weight: 200px;">STAFF LOGIN! <small>Enter username & password...</small>
	            	</p>
              <div class="info d-flex">
              	 <div class="col-lg-2">&nbsp;</div> 
              	<div class="col-lg-8" style="padding-top: 100px; padding-bottom: 50px;" >
	              	<div class="content">
                  <form id="login-form" method="post" action="">
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required="" class="input-material" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required="" class="input-material" placeholder="Password">
                    </div><button type="submit" id="login" name="submit" class="btn btn-success">Login</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><br>
                  <p style="color: #fff; font-style: italic;"> Forgot Password? "CONTACT ADMIN" </p>
                </div><br><br><br>
                <a  href="index.php" class="btn btn-danger">Back</a>
                </div>
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