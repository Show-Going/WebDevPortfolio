<?php 
  session_start();
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('https://freelance-strategy.com/wp-content/uploads/2018/06/Freelance.jpg');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}

.form-label-group , .newFormG{
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #a9a9a9;
  cursor: text;
  /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: /*transparent*/;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

  </style>

</head>
<body>

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h2 class="login-heading mb-4">Meet people all over the world!</h2>
              <form method="post" action="userAction.php">


                <div class="form-label-group">
                  <input name="officeName" type="text" id="inputOfficeName" class="form-control" placeholder="Office Name" 
                    <?php
                      if(isset($_SESSION['officeName'])){
                        echo "value='" .$_SESSION['officeName'] ."'";
                        unset($_SESSION['officeName']);
                      }else{
                        echo "autofocus";
                      }
                    ?>
                  required>
                  <label for="inputOfficeName">Office Name</label>
                </div>



                <div class="newFormG">
                  <select name="country">
                    <option value=""> -- Country --</option>
                    <?php include 'sqlRepository.php';
                      $sql = new SQL;
                      echo $sql->dbCountryName(); 
                    ?>
                  </select>
                </div>

       

                <div class="form-label-group">
                  <input name="address" type="text" id="inputAddress" class="form-control" placeholder="Address" 
                    <?php
                      if(isset($_SESSION['address'])){
                        echo "value='" .$_SESSION['address'] ."'";
                        unset($_SESSION['address']);
                      }
                    ?>
                  required>
                  <label for="inputAddress">Address</label>
                </div>


                <div class="form-label-group">
                  <input name="phoneNumber" type="tel" id="inputPhoneNumber" class="form-control" placeholder="Phone Number" 
                    <?php
                      if(isset($_SESSION['phoneNumber'])){
                        echo "value='" .$_SESSION['phoneNumber'] ."'";
                        unset($_SESSION['phoneNumber']);
                      }
                    ?>
                  required>
                  <label for="inputPhoneNumber">Phone Number</label>
                </div>


                <div class="form-label-group">
                  <input name="officeEmail" type="email" id="inputEmail" class="form-control" placeholder="Email Address" 
                    <?php
                      if(isset($_SESSION['officeEmail'])){
                        echo "value='" .$_SESSION['officeEmail'] ."'";
                        unset($_SESSION['officeEmail']);
                      }
                    ?>
                  required>
                  <label for="inputEmail">Email Address</label>
                </div>


                <div class="form-label-group">
                  <input name="officePass" type="password" id="inputOfficePass" class="form-control" placeholder="officePass" required 
                    <?php
                      if(isset($_SESSION['msg'])){
                        echo "autofocus";
                      }
                    ?>
                  >
                  <label for="inputOfficePass">Password</label>
                </div>


                <div class="form-label-group">
                  <input name="confirm" type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                  <label for="confirmPassword">Confirm Password</label>
                  <span id="msg" style="color:red;"> 
                    <?php
                      if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                      }
                    ?>
                  </span> 
                <!-- if password does not much the confirmation, then error message will be shown. -->
                </div>


                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="officeRegister">Register my office</button>
                <!-- registerボタンを押すとform actionで定義したuserAction.phpにデータを送る -->


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>


