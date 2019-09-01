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


			<?php
				$loginID = $_GET['loginID'];
				require_once 'sqlRepository.php';
				$sqls = new SQL;
				$sql = "SELECT * FROM User WHERE loginID = '$loginID'";
				$result = $sqls->conn->query($sql);
				$row = $result->fetch_assoc();
				$loginID = $row['loginID'];
				$userName = $row['userName'];
				$phoneNumber = $row['phoneNumber'];
				$email = $row['email'];
				$password = $row['password'];
				$userPic = $row['userPic'];
			?>



			<div class="col-md-12">
				<br />
				<h2>
					Hello admin,
					Manage your account (<span class="text-success"><?php echo $userName ?></span>) Info.
				</h2><br />
			</div>

		
			<div class="col-md-3 mx-auto">
				<img src="<?php echo $userPic; ?>" style="width:100%;" class="rounded">
				<center><p style="margin-top: 6px; text-align:left;"><a href="#">Change Image</a></p></center>
			</div>

			<div class="col-md-6 mx-auto">
				<form method="post" action="userAction.php">
					<div class="form-group">
						<table class="table table-borderless" style="background-color:white;">
							<tr>
								<th>Login-ID <br /><span style="font-size: 12px; color: red;">*unable to edit</span></th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $loginID; ?>' name="loginID" readonly>
								</td>
							</tr>
							<tr>
								<th>User Name</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $userName; ?>' name="changeUserName">
								</td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $phoneNumber; ?>' name="changeUserPhoneNumber">
								</td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td>
									<input type="email" class="form-control"
									value='<?php echo $email; ?>' name="changeEmail">
								</td>
							</tr>
							<tr>
								<th>Password</th>
								<td>
									<input type="password" class="form-control" 
									 value='<?php echo $password; ?>' name="changePassword" id="password">
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
									<button class="btn btn-outline-danger" name="userUpdateForAdmin">
										Update
									</button>
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>









		</div>
	</div>

	<br />
	<?php include 'footer.php'; ?>
</body>
</html>