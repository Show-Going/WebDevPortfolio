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
					header("refresh:0.1; url=officeLogin.php");
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
					<span style='text-align:center;'><option value='".$row["countryCode"] ."'>" .$row["countryName"] ."</option></span>
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
				// $_SESSION['loginID'] = $row['loginID'];
				// $_SESSION['userName'] = $row['userName'];
				if ($row['password'] == $pass) {
					$_SESSION['loginID'] = $row['loginID'];
					$_SESSION['userName'] = $row['userName'];
					$_SESSION['userPhoneNumber'] = $row['phoneNumber'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['userPic'] = $row['userPic'];
					$_SESSION['status'] = $row['status'];
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
				$_SESSION['officePic'] = $row['officePic'];
				$_SESSION['officeDescription'] = $row['officeDescription'];
				$_SESSION['countryCode'] = $row['countryCode'];
				$_SESSION['region'] = $row['region'];
				$_SESSION['officeAddress'] = $row['officeAddress'];
				$_SESSION['officePhoneNumber'] = $row['officePhoneNumber'];
				$_SESSION['officeEmail'] = $row['officeEmail'];
				$_SESSION['officePassword'] = $row['officePassword'];
				$_SESSION['maxCapacity'] = $row['maxCapacity'];
				$_SESSION['officeRentalFee'] = $row['rentalFee'];
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



		// returing the multi-dimensional array to index.php after serching all the office by the country code which is given by user.
		function showOfficeByCountryCode($countryByUser){
			$sql = "SELECT * FROM office WHERE countryCode = '$countryByUser'";
			$result = $this->conn->query($sql);

			if ($result->num_rows >= 1) {
				while($row = $result->fetch_assoc()) {
					$officeInfoRow[] = $row;	
				}
				return $officeInfoRow;
			}
			
			
		}
		


		// user update
		function userUpdate($newUserName, $newPhoneNumber, $newEmail, $newPassword){
			$loginID = $_SESSION['loginID'];
			$sql = "SELECT * FROM User WHERE loginID = '$loginID'";
			$result = $this->conn->query($sql);
			if ($result->num_rows == 1) {
				$sql = "UPDATE User SET 
						userName='$newUserName', 
						phoneNumber='$newPhoneNumber', 
						email='$newEmail', 
						password='$newPassword' 
						WHERE loginID=$loginID";
				$this->conn->query($sql);
				$_SESSION["userName"] = $newUserName;
				$_SESSION["userPhoneNumber"] = $newPhoneNumber;
				$_SESSION["email"] = $newEmail;
				$_SESSION["password"] = $newPassword;
				header("Location: userPage.php");
			}else{
				echo "ERROR : something went wrong.";
			}

		}



		// office update
		function officeUpdate($newOfficeName, $newOfficePhoneNumber, 
			$newOfficeEmail, $newOfficeDescription, $newOfficeAddress, 
			$newOfficeMaxCapacity, $newRentalFee, $newOfficePassword){
			$officeID = $_SESSION['officeID'];
			$sql = "SELECT * FROM office WHERE officeID = '$officeID'";
			$result = $this->conn->query($sql);
			if ($result->num_rows == 1) {
				$sql = "UPDATE office SET 
						officeName='$newOfficeName', 
						officePhoneNumber='$newOfficePhoneNumber', 
						officeEmail='$newOfficeEmail',
						officeDescription='$newOfficeDescription',
						officeAddress='$newOfficeAddress',
						maxCapacity='$newOfficeMaxCapacity',
						rentalFee='$newRentalFee', 
						officePassword='$newOfficePassword' 
						WHERE officeID=$officeID";
				$this->conn->query($sql);
				$_SESSION["officeName"] = $newOfficeName;
				$_SESSION["officePhoneNumber"] = $newOfficePhoneNumber;
				$_SESSION["officeEmail"] = $newOfficeEmail;
				$_SESSION["officeDescription"] = $newOfficeDescription;
				$_SESSION["officeAddress"] = $newOfficeAddress;
				$_SESSION["maxCapacity"] = $newOfficeMaxCapacity;
				$_SESSION["officeRentalFee"] = $newRentalFee;
				$_SESSION["officePassword"] = $newOfficePassword;
				header("Location: officePage.php");
			}else{
				echo "ERROR : something went wrong.";
			}

		}


		// admin page [userDelete]
		function userDeleteForAdmin($loginID){
			$sql = "DELETE FROM User WHERE loginID = '$loginID'";
			$result = $this->conn->query($sql);
			header("Location: adminPage.php");
		}
		// admin page [officeDelete]
		function officeDeleteForAdmin($officeID){
			$sql = "DELETE FROM office WHERE officeID = '$officeID'";
			$result = $this->conn->query($sql);
			header("Location: adminPage.php");
		}

		// admin page [userEdit]
		function userEditForAdmin($loginID, $userName, $phoneNumber, $email, $password){
			$sql = "SELECT * FROM User WHERE loginID = '$loginID'";
			$result = $this->conn->query($sql);
			if ($result->num_rows == 1) {
				$sql = "UPDATE User SET 
						userName='$userName', 
						phoneNumber='$phoneNumber', 
						email='$email', 
						password='$password' 
						WHERE loginID=$loginID";
				$this->conn->query($sql);
				header("Location: userPageForAdmin.php?loginID=$loginID");
			}else{
				echo "ERROR : something went wrong.";
			}
		}

		// admin page ['officeEdit']
		function officeEditForAdmin($officeID, $officeName, $officePhoneNumber, 
			$officeEmail, $officeDescription, $officeAddress, 
			$officeCapacity, $officeRentalFee, $officePassword){
			$sql = "SELECT * FROM office WHERE officeID = '$officeID'";
			$result = $this->conn->query($sql);
			if ($result->num_rows == 1) {
				$sql = "UPDATE office SET 
						officeName='$officeName', 
						officePhoneNumber='$officePhoneNumber', 
						officeEmail='$officeEmail',
						officeDescription='$officeDescription',
						officeAddress='$officeAddress',
						maxCapacity='$officeCapacity',
						rentalFee='$officeRentalFee', 
						officePassword='$officePassword' 
						WHERE officeID=$officeID";
				$this->conn->query($sql);
				header("Location: officePageForAdmin.php?officeID=$officeID");
			}else{
				echo "ERROR : something went wrong.";
			}

		}



		// this is to check availability by dates.
		function dateRightfulnessCheck($checkInByUser, $checkOutByUSer){
			echo "Check-in date by user : " .$checkInByUser ."<br />";
			echo "Check-out date by user : " .$checkOutByUSer ."<br /><br />";
			// this "if" will give an error message if check-in date is later than check-out date.
			if ($checkInByUser >= $checkOutByUSer) {
				$dateErrorMsgFlag = 0;
				$_SESSION['dateErrorMsgFlag'] = $dateErrorMsgFlag;
				header("Location: searchResult.php");
			}else{
				$countryByUser = $_SESSION['countryByUser'];
				$this->officeExistCheck($checkInByUser, $checkOutByUSer, $countryByUser);
			}
		}
		function officeExistCheck($checkInByUser, $checkOutByUSer, $countryByUser){
			$sql = "SELECT * FROM office WHERE countryCode = '$countryByUser'";
			$result = $this->conn->query($sql);
			// looking for offices by the country code which user has input.
			if($result->num_rows >= 1) {
				$officeByCountryCode = $result;
				$this->dateRangeCheck($checkInByUser, $checkOutByUSer, $countryByUser, $officeByCountryCode);
			}else{
				header("Location: searchResult.php");
			}
		}
		function dateRangeCheck($checkInByUser, $checkOutByUSer, $countryByUser, $officeByCountryCode){
			$checkIn = strtotime($checkInByUser);
			$checkOut = strtotime($checkOutByUSer);
			$duration = (($checkOut - $checkIn) / (60 * 60 * 24)) + 1;
			$unableOfficeArray = array($checkInByUser, $checkOutByUSer, $duration);
			
			while($row = $officeByCountryCode->fetch_assoc()) {
				$officeID = $row['officeID'];
				$sql = "SELECT * FROM bookings WHERE officeID = '$officeID'";
				$result = $this->conn->query($sql);

				if($result->num_rows >= 1) {
					while($row = $result->fetch_assoc()){
						echo "officeID : " .$row['officeID'] ."<br />";
						echo "bookingID : " .$row['bookingID'] ."<br />";
						echo "Check-in : " .$row['checkIn'] ."<br />";
						echo "Check-out : " .$row['checkOut'] ."<br />";
						$alreadyBookedFrom = $row['checkIn'];
						$alreadyBookedUntil = $row['checkOut'];

						$period = $this->getDatesFromRange($alreadyBookedFrom, $alreadyBookedUntil);
						$period2 = $this->getDatesFromRange($checkInByUser, $checkOutByUSer);

						$count = 0;
						for($i=0; $i<count($period); $i++){
						   for($j=0; $j<count($period2); $j++){
						       if($period2[$j] == $period[$i]){
						           $count++;
						       }
						   }
						}
						if($count > 0){
							echo "Conflict Schedules<br /><br />";
							$unableOfficeArray[] = $row['officeID'];
						}else{
						   echo "Go Ahead!<br /><br />";
						}
					}
				}
			}
			print_r($unableOfficeArray);
			$_SESSION['unableOfficeArray'] = $unableOfficeArray;
			header("Location: searchResult.php");
		}
		function getDatesFromRange($s1, $e1){
	        $dates = array($s1);
	        while(end($dates) < $e1){
	            $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
	        }
	        return $dates;
	    }
	      
	
	    function saveInBookingTable($loginID,$officeID,$checkIn,$checkOut){
	    	$sql = "INSERT INTO bookings(loginID, officeID, checkIn, checkOut) 
	    	VALUES('$loginID', '$officeID', '$checkIn', '$checkOut')";
	    	$result = $this->conn->query($sql);
	    	$_SESSION['bookSuccessFlag'] = 1;
	    	header("Location: searchResult.php");
	    }













	} // end fo class.

?>