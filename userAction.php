<?php

	session_start();

	require_once 'sqlRepository.php';
	$sqls = new SQL;


	// passing the values of register form to user insertValue.
	if (isset($_POST['userRegister'])) {
		$userName = $_POST['userName'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$confirm = $_POST['confirm'];

		$sqls->insertValue($userName, $email, $pass, $confirm);
	}


	// passing the values of register form to office insertValue.
	if (isset($_POST['officeRegister'])) {
		$officeName = $_POST['officeName'];
		$countryCode = $_POST['country'];
		$address = $_POST['address'];
		$phoneNumber = $_POST['phoneNumber'];
		$officeEmail = $_POST['officeEmail'];
		$officePass = $_POST['officePass'];
		$confirm  = $_POST['confirm'];

		$sqls->insertOfficeValue($officeName, $countryCode, $address, 
			$phoneNumber, $officeEmail, $officePass, $confirm);
	}


	// user login judge.
	if (isset($_POST['userLogin'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$sqls->userLoginJudge($email, $pass);
	}


	// office login judge.
	if (isset($_POST['officeLogin'])) {
		$officeEmail = $_POST['officeEmail'];
		$officePass = $_POST['officePass'];

		$sqls->officeLoginJudge($officeEmail, $officePass);
	}


	// searching sql by user location from modal.
	if (isset($_POST['search'])){
		$userLocation = $_POST['userLocation'];
		$sqls->locationSearch($userLocation);
	}

	// update for user account
	if (isset($_POST['userUpdate'])) {
		$newUserName = $_POST['changeUserName'];
		$newPhoneNumber = $_POST['changeUserPhoneNumber'];
		$newEmail = $_POST['changeEmail'];
		$newPassword = $_POST['changePassword'];

		$sqls->userUpdate($newUserName, $newPhoneNumber, $newEmail, $newPassword);
	}

	// update for office account
	if (isset($_POST['officeUpdate'])) {
		$newOfficeName = $_POST['changeOfficeName'];
		$newOfficePhoneNumber = $_POST['changeOfficePhoneNumber'];
		$newOfficeEmail = $_POST['changeOfficeEmail'];
		$newOfficeDescription = $_POST['changeOfficeDescription'];
		$newOfficeAddress = $_POST['changeOfficeAddress'];
		$newOfficeMaxCapacity = $_POST['changeOfficeMaxCapacity'];
		$newRentalFee = $_POST['changeRentalFee'];
		$newOfficePassword = $_POST['changeOfficePassword'];

		$sqls->officeUpdate($newOfficeName, $newOfficePhoneNumber, $newOfficeEmail, $newOfficeDescription, $newOfficeAddress, $newOfficeMaxCapacity, $newRentalFee, $newOfficePassword);
	}

	// admin page [userEdit]
	if (isset($_POST['userUpdateForAdmin'])) {
		$loginID = $_POST['loginID'];
		$userName = $_POST['changeUserName'];
		$phoneNumber = $_POST['changeUserPhoneNumber'];
		$email = $_POST['changeEmail'];
		$password = $_POST['changePassword'];
		$sqls->userEditForAdmin($loginID, $userName, $phoneNumber, $email, $password);
	}
	// admin page [officeEdit]
	if (isset($_POST['officeUpdateForAdmin'])) {
		$officeID = $_POST['officeID'];
		$officeName = $_POST['changeOfficeName'];
		$officePhoneNumber = $_POST['changeOfficePhoneNumber'];
		$officeEmail = $_POST['changeOfficeEmail'];
		$officeDescription = $_POST['changeOfficeDescription'];
		$officeAddress = $_POST['changeOfficeAddress'];
		$officeCapacity = $_POST['changeOfficeMaxCapacity'];
		$officeRentalFee = $_POST['changeRentalFee'];
		$officePassword = $_POST['changeOfficePassword'];
		$sqls->officeEditForAdmin($officeID, $officeName, $officePhoneNumber, $officeEmail, $officeDescription, $officeAddress, $officeCapacity, $officeRentalFee, $officePassword);
	}

	// admin page [userDelete]
	if (isset($_POST['userDelete'])) {
		$loginID = $_POST['loginID'];
		$sqls->userDeleteForAdmin($loginID);
	}
	// admin page [officeDelete]
	if (isset($_POST['officeDelete'])) {
		$officeID = $_POST['officeID'];
		$sqls->officeDeleteForAdmin($officeID);
	}
	
	// sort by dates.
	if (isset($_POST['sortByDate'])) {
		$checkInByUser = $_POST['checkIn'];
		$checkOutByuse = $_POST['checkOut'];
		$sqls->dateRightfulnessCheck($checkInByUser, $checkOutByuse);

	}

	if (isset($_POST['confirmBook'])) {
		if($_SESSION['loginID']){
			$loginID = $_SESSION['loginID'];
			$officeID = $_POST['officeID'];
			$officeCapacity = $_POST['officeCapacity'];
			$checkIn = $_POST['checkIn'];
			$checkOut = $_POST['checkOut'];
			$sqls->saveInBookingTable($loginID,$officeID,$checkIn,$checkOut);
		}else{
			header("Location: userLogin.php");
		}
	}
















?>