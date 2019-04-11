<?php

	session_start();

	require_once 'sqlRepository.php';
	$sqls = new SQL;


	// passing the values of register form to insertValue.
	if (isset($_POST['register'])) {
			$userName = $_POST['userName'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$confirm = $_POST['confirm'];

			$sqls->insertValue($userName, $email, $pass, $confirm);
	}


	// passing the values of login form to login judge.
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$sqls->loginJudge($email, $pass);
	}





?>