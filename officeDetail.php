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

			<h1>tsf</h1>



		</div>
	</div>

	<br />
	<?php include 'footer.php'; ?>
</body>
</html>