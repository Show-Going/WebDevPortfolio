<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>
		input{

		}
	</style>
</head>
<body style="background-color: #F7F7F7;">
	<?php include 'menu.php'; ?>
	<br /><br /><br /><br /><br />

	<div class="container">
		<div class="row rounded" style="background-color: white;">



			<div class="col-md-12">
				<br />
				<h2>
					Hello <span class="text-success"><?php echo $_SESSION['userName']; ?></span>,
					Manage your account profile.
				</h2><br />
			</div>

		
			<div class="col-md-3 mx-auto">
				<img src="<?php echo $_SESSION['userPic']; ?>" style="width:100%;" class="rounded">
				<center><p style="margin-top: 6px; text-align:left;"><a href="#">Change Image</a></p></center>
			</div>


			<div class="col-md-6 mx-auto">
				<form method="post" action="userAction.php">
					<div class="form-group">
						<table class="table table-borderless" style="background-color:white;">
							<tr>
								<th>User Name</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["userName"]; ?>' name="changeUserName">
								</td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["userPhoneNumber"]; ?>' name="changeUserPhoneNumber">
								</td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td>
									<input type="email" class="form-control"
									value='<?php echo $_SESSION["email"]; ?>' name="changeEmail">
								</td>
							</tr>
							<tr>
								<th>Password</th>
								<td>
									<input type="password" class="form-control" 
									 value='<?php echo $_SESSION["password"]; ?>' name="changePassword" id="password">
									 <input type="checkbox" id="password-check" />&nbsp;Display password
									 <script>
									 	var pw = document.getElementById('password');
										var pwCheck = document.getElementById('password-check');
										pwCheck.addEventListener('change', function() {
											if(pwCheck.checked) {
												pw.setAttribute('type', 'text');
											} else {
												pw.setAttribute('type', 'password');
											}
										}, false);
									 </script>
								</td>
							</tr>
							<tr style="text-align: right">
								<td colspan="2">
									<button class="btn btn-outline-danger" name="userUpdate">
										Update
									</button>
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>


		</div><!-- end of the row -->


		<div class="row" style="background-color: white;">
			<div class="col-md-10 mx-auto">
				<h4 class="text-success" style="font-weight: bold; text-align: center; margin-bottom: 10px;">Your Booking-overview</h4>
				<?php
					require_once 'sqlRepository.php';
					$sqlRepository = new SQL;
					$loginID = $_SESSION['loginID'];

					$sql ="SELECT * FROM bookings WHERE loginID ='$loginID'";
					$result = $sqlRepository->conn->query($sql);
					if($result->num_rows >= 1){
						$counter = 1;
						while($row = $result->fetch_assoc()){
							$officeID = $row['officeID'];
							$sql2 = "SELECT * FROM office WHERE officeID = '$officeID'";
							$result2 = $sqlRepository->conn->query($sql2);
							$row2 = $result2->fetch_assoc();

							echo "
								<table class='table' >
									<tr><th>".$counter."</th><td style='width:50%;'>".$row2['officeName']."</td><td style='width:20%;'>".$row['checkIn']."</td><td style='width:20%;'>".$row['checkOut']."</td></tr>
								</table>
							";
							$counter++;
						}
					}
				?>
			</div>
		</div>


	</div>

	<br />
	<?php include 'footer.php'; ?>
</body>
</html>