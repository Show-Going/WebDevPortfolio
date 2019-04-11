<?php

	require_once 'database.php';

	class SQL extends Database{



		// registration sql
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
					// header("Location: login.php");
					header("refresh:0.1; url=login.php");
				}else{
					?>
						<script>alert("Email Address already exists.");</script>
					<?php
					// header("Location: login.php");
					header("refresh:0.1; url=registeration.php");
				}
			}else{
				$_SESSION['msg'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password does not much Confirmation.";
				$_SESSION['userName'] = $_POST['userName'];
				$_SESSION['email'] = $_POST['email'];
				header("Location:registeration.php");
			}
		}



		// login sql
		function loginJudge($email, $pass){
			$sql = "SELECT * FROM User WHERE email = '$email'";
			$result = $this->conn->query($sql);
			$row = $result->num_rows;
			if ($row == 1) {
				$row = $result->fetch_assoc();
				$_SESSION['loginID'] = $row['loginID'];
				if ($row['password'] == $pass) {
					header("Location: index.php");
				}else{
					?>
						<script>
							alert("Invalid Password.");
						</script>
					<?php
					header("refresh:0.1; url=login.php");
				}
			}else{
					?>
						<script>
							alert("Email Address does NOT exists.");
						</script>
					<?php
					header("refresh:0.1; url=login.php");
			}
		}







	}

?>