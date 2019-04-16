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


	



?>