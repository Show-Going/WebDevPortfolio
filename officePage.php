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
					Hello <span class="text-success"><?php echo $_SESSION['officeName']; ?></span>,
					Manage your property profile.
				</h2><br />
			</div>

		
			<div class="col-md-5 mx-auto">
				<img src="<?php echo $_SESSION['officePic']; ?>" style="width:100%;" class="rounded">
				<center><p style="margin-top: 6px; text-align:left;"><a href="#">Change Image</a></p></center>
			</div>

			<div class="col-md-6 mx-auto">
				<form method="post" action="userAction.php">
					<div class="form-group">
						<table class="table table-borderless" style="background-color:white;">
							<tr>
								<th>Office Name</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["officeName"]; ?>' name="changeOfficeName">
								</td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["officePhoneNumber"]; ?>' name="changeOfficePhoneNumber">
								</td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td>
									<input type="email" class="form-control"
									value='<?php echo $_SESSION["officeEmail"]; ?>' name="changeOfficeEmail">
								</td>
							</tr>
							<tr>
								<th>Office Description</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["officeDescription"]; ?>' name="changeOfficeDescription">
								</td>
							</tr>
							<tr>
								<th>Office Address</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["officeAddress"]; ?>' name="changeOfficeAddress">
								</td>
							</tr>
							<tr>
								<th>Office Capacity</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION["maxCapacity"]; ?>' name="changeOfficeMaxCapacity">
								</td>
							</tr>
							<tr>
								<th>Rental Fee per day</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $_SESSION['officeRentalFee']; ?>' name="changeRentalFee">
								</td>
							</tr>
							<tr>
								<th>Password</th>
								<td>
									<input type="password" class="form-control" 
									 value='<?php echo $_SESSION["officePassword"]; ?>' name="changeOfficePassword" id="password">
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
									<button class="btn btn-outline-danger" name="officeUpdate">
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