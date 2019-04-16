<?php

	require_once 'database.php';

	class SQL extends Database{



		// user registration
		function insertValue($userName, $email, $pass, $confirm){
			// if password does not much confirmation, shows error message and back to the same page.
			if ($_POST['pass'] == $_POST['confirm']) {
				$sql = "SELECT * from User WHERE email = '$email'";
				$result = $this->conn->query($sql);
				$row = $result->num_rows;
				if ($row == 0) {
					$sql = "INSERT INTO User(userName, email, password, status) VALUES('$userName', '$email', '$pass', 'U')";
					$this->conn->query($sql);
					?>
						<script>alert("Your registration successfuly done.");</script>
					<?php
					// header("Location: userLogin.php");
					//header("refresh:0.1; url=userLogin.php");
				}else{
					?>
						<script>alert("Email Address already exists.");</script>
					<?php
					// header("Location: userLogin.php");
					header("refresh:0.1; url=userRegistration.php");
				}
			}else{
				$_SESSION['msg'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password does not much Confirmation.";
				$_SESSION['userName'] = $_POST['userName'];
				$_SESSION['email'] = $_POST['email'];
				header("Location:userRegistration.php");
			}
		}



		// office registration
		function insertOfficeValue($officeName, $countryCode, $address, 
			$phoneNumber, $officeEmail, $officePass, $confirm){
			// if password does not much confirmation, shows error message and back to the same page.
			if ($_POST['officePass'] == $_POST['confirm']) {
				$sql = "SELECT * from office WHERE officeEmail = '$officeEmail'";
				$result = $this->conn->query($sql);
				$row = $result->num_rows;
				if ($row == 0) {
					$sql = "INSERT INTO office(officeName, countryCode, officeAddress, officePhoneNumber, officeEmail, officePassword) VALUES('$officeName', '$countryCode', '$address', '$phoneNumber', '$officeEmail', '$officePass')";
					$this->conn->query($sql);
					?>
						<script>alert("Your registration successfuly done.");</script>
					<?php
					header("refresh:0.1; url=userLogin.php");
				}else{
					?>
						<script>alert("Email Address already exists.");</script>
					<?php
					header("refresh:0.1; url=officeRegistration.php");
				}
			}else{
				$_SESSION['msg'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password does not much Confirmation.";
				$_SESSION['officeName'] = $_POST['officeName'];
				$_SESSION['officeEmail'] = $_POST['officeEmail'];
				$_SESSION['address'] = $_POST['address'];
				$_SESSION['phoneNumber'] = $_POST['phoneNumber'];
				header("Location:officeRegistration.php");
			}

		}
		// this is to show country names from DB(countryName) 
		// *it will automatically move when to show the office registration page and country search modal.
		function dbCountryName(){
			$sql = "SELECT * FROM country";
			$result = $this->conn->query($sql);
			$row = array();
			while($row = $result->fetch_assoc()){
				$countryCode = $row['countryCode'];
				echo "
					<option value='".$row["countryCode"] ."'>" .$row["countryName"] ."</option>
				";
			}
			
		}




		// user login
		function userLoginJudge($email, $pass){
			$sql = "SELECT * FROM User WHERE email = '$email'";
			$result = $this->conn->query($sql);
			$row = $result->num_rows;
			if ($row == 1) {
				$row = $result->fetch_assoc();
				$_SESSION['loginID'] = $row['loginID'];
				$_SESSION['userName'] = $row['userName'];
				if ($row['password'] == $pass) {
					header("Location: index.php");
				}else{
					?>
						<script>
							alert("Invalid Password.");
						</script>
					<?php
					header("refresh:0.1; url=userLogin.php");
				}
			}else{
					?>
						<script>
							alert("Email Address does NOT exists.");
						</script>
					<?php
					header("refresh:0.1; url=userLogin.php");
			}
		}



		// office login
		function officeLoginJudge($officeEmail, $officePass){
			$sql = "SELECT * FROM office WHERE officeEmail = '$officeEmail'";
			echo $officeEmail;
			$result = $this->conn->query($sql);
			$row = $result->num_rows;
			if ($row == 1) {
				$row = $result->fetch_assoc();
				$_SESSION['officeID'] = $row['officeID'];
				$_SESSION['officeName'] = $row['officeName'];
				if ($row['officePassword'] == $officePass) {
					header("Location: index.php");
				}else{
					?>
						<script>
							alert("Invalid Password.");
						</script>
					<?php
					header("refresh:0.1; url=officeLogin.php");
				}
			}else{
					?>
						<script>
							alert("Email Address does NOT exists.");
						</script>
					<?php
					header("refresh:0.1; url=officeLogin.php");
			}
		}



		// search sql by user location from modal.
		function locationSearch($userLocation){
			$userLocation = $_POST['userLocation'];
			$sql = "SELECT * from country WHERE countryCode = '$userLocation'";
			$result = $this->conn->query($sql);
			if($result->num_rows >= 1){
				$rows = $result->fetch_assoc();
				$_SESSION['countryByUser'] = $rows['countryCode'];
				header("Location: searchResult.php");
			}
		}


		// function showOfficesByCountryCode()
			







	} // end fo class.

?>