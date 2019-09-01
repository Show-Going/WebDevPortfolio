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
				$officeID = $_GET['officeID'];
				require_once 'sqlRepository.php';
				$sqls = new SQL;
				$sql = "SELECT * FROM office WHERE officeID = '$officeID'";
				$result = $sqls->conn->query($sql);
				$row = $result->fetch_assoc();
				$officeID = $row['officeID'];
				$officeName = $row['officeName'];
				$officePhoneNumber = $row['officePhoneNumber'];
				$officeEmail = $row['officeEmail'];
				$officeDescription = $row['officeDescription'];
				$officeAddress = $row['officeAddress'];
				$officeCapacity = $row['maxCapacity'];
				$officeRentalFee = $row['rentalFee'];
				$officePassword = $row['officePassword'];
				$officePic = $row['officePic'];
			?>



			<div class="col-md-12">
				<br />
				<h2>
					Hello admin,
					Manage your account (<span class="text-success"><?php echo $officeName ?></span>) Info.
				</h2><br />
			</div>

		
			<div class="col-md-5 mx-auto">
				<img src="<?php echo $officePic; ?>" style="width:100%;" class="rounded">
				<center><p style="margin-top: 6px; text-align:left;"><a href="#">Change Image</a></p></center>
			</div>

			<div class="col-md-6 mx-auto">
				<form method="post" action="userAction.php">
					<div class="form-group">
						<table class="table table-borderless" style="background-color:white;">
							<tr>
								<th>Office-ID <br /><span style="font-size: 12px; color: red;">*unable to edit</span></th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officeID; ?>' name="officeID" readonly>
								</td>
							</tr>
							<tr>
								<th>Office Name</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officeName; ?>' name="changeOfficeName">
								</td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officePhoneNumber; ?>' name="changeOfficePhoneNumber">
								</td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td>
									<input type="email" class="form-control"
									value='<?php echo $officeEmail; ?>' name="changeOfficeEmail">
								</td>
							</tr>
							<tr>
								<th>Office Description</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officeDescription; ?>' name="changeOfficeDescription">
								</td>
							</tr>
							<tr>
								<th>Office Address</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officeAddress; ?>' name="changeOfficeAddress">
								</td>
							</tr>
							<tr>
								<th>Office Capacity</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officeCapacity; ?>' name="changeOfficeMaxCapacity">
								</td>
							</tr>
							<tr>
								<th>Rental Fee per day</th>
								<td>
									<input type="text" class="form-control" 
									value='<?php echo $officeRentalFee; ?>' name="changeRentalFee">
								</td>
							</tr>
							<tr>
								<th>Password</th>
								<td>
									<input type="password" class="form-control" 
									 value='<?php echo $officePassword; ?>' name="changeOfficePassword" id="password">
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
									<button class="btn btn-outline-danger" name="officeUpdateForAdmin">
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