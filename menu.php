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

  <header id="header" style="background-color: #131313;">


      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">BizPage</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
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
                  <li><a href='logout.php'>Logout</a></li>";
                  if($_SESSION['status'] == 'U'){
                    echo "
                      <li>
                        <a href='userPage.php' style='text-transform:none; font-size:95%;'>
                          <i class='fas fa-user'></i>&nbsp;".$_SESSION['userName']."
                        </a>
                      </li>
                    ";
                  }else{
                    echo "
                      <li>
                        <a href='adminPage.php' style='text-transform:none; font-size:95%;'>
                          <i class='fas fa-user-cog'></i>&nbsp;".$_SESSION['userName']."
                        </a>
                      </li>
                    ";
                  }
                 
              // ------- for office -------
              }elseif (isset($_SESSION['officeID'])) {
                echo "
                  <li><a href='logout.php'>Logout</a></li>
                  <li>
                    <a href='officePage.php' style='text-transform:none; font-size:95%;'>
                      <i class='far fa-building'></i>&nbsp;".$_SESSION['officeName']."
                    </a>
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
                <a href="userLogin.php" class="btn btn-outline-success" style="width: 100%; font-weight: bold;">User</a>
              </div>
              <div class="col">
                <a href="officeLogin.php" class="btn btn-outline-success" style="width: 100%; font-weight: bold;">Officeadmin</a>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col">
                <div style="text-align: center; font-size:13px; margin-top:7px;">
                  <a href="userRegistration.php" class="text-primary">Create user account</a>
                </div>
              </div>

              <div class="col">
                <div style="text-align: center; font-size:13px; margin-top:7px;">
                  <a href="officeRegistration.php" class="text-primary">Register my office</a>
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