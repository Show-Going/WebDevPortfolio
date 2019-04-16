<?php
  session_start();
  require 'common.php';
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BizPage Bootstrap Template</title>
 
</head>

<body>

  <!--==========================
    Header
  ============================-->

  <header id="header">


      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">BizPage</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <!-- <li><a href="#team">Team</a></li> -->
         <!--  <li class="menu-has-children"><a href="">Drop Down</a> -->
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
            <?php
              // ------- for user -------
              if (isset($_SESSION['loginID']) || !empty($_SESSION['loginID'])) {
                echo "
                  <li style='color:white;'><a href='logout.php'>Logout</a></li>
                  <li style='color:white; font-weight:bold;'>
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class='far fa-user'></i>&nbsp;&nbsp;".$_SESSION['userName']."
                  </li>
                ";

              // ------- for office -------
              }elseif (isset($_SESSION['officeID']) || !empty($_SESSION['officeID'])) {
                echo "
                  <li style='color:white;'><a href='logout.php'>Logout</a></li>
                  <li style='color:white; font-weight:bold;'>
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class='far fa-building'></i>&nbsp;&nbsp;".$_SESSION['officeName']."
                  </li>
                ";
              }else{
                echo "
                  <li>
                    <a href='#' data-toggle='modal' data-target='#myLoginModal'>
                      Login
                    </a>
                  </li>
                ";
                // ↑↑↑ this Login link is a trigger of modal.
              }
            ?>
        </ul>
      </nav><!-- #nav-menu-container -->
  
  </header><!-- #header -->

  <!-- Modal for User/Office login-->
  <div class="modal fade" id="myLoginModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <form method="post" action="userAction.php">
            
            <h4>Login as...</h4>

            <div class="row align-items-center">
              <div class="col">
                <a href="userLogin.php" class="btn btn-outline-primary" style="width: 100%; font-weight: bold;">User</a>
              </div>
              <div class="col">
                <a href="officeLogin.php" class="btn btn-outline-primary" style="width: 100%; font-weight: bold;">Office admin</a>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col">
                <div style="text-align: center; text-decoration: underline;">
                  <a href="userRegistration.php">Create user account</a>
                </div>
              </div>

              <div class="col">
                <div style="text-align: center; text-decoration: underline;">
                  <a href="officeRegistration.php">Register my office</a>
                </div>
              </div>
            </div>
          
          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>