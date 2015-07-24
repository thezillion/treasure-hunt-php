<?php
	
	require '../../modules/req.php';

	if ($userModule->active == "false"){
		$username = $_POST['usrnme'];
		$password = $_POST['psswrd'];
		if ($username !== '' && $password !== ''){
			$q0 = mysqldb::query(array(
				"action" => "select",
				"table" => "userBase",
				"limits" => array(
					"username" => $username
				)
			));
			// die(mysql_error());
			if (dbnumrows($q0) > 0){
				$dbusername = dbfresult($q0, 'username');
				$dbpassword = dbfresult($q0, 'password');
				if ($password == $dbpassword){
					$_SESSION['cyq'] = $dbusername;
					$msgType = "success";
					$msg = "Login successful. Redirecting..";
				}
				else{
					$msgType = "error";
					$msg = "Invalid password.";
				}
			}
			else{
				$msgType = "error";
				$msg = "Invalid username.";
			}
		} else{
			$msgType = "error";
			$msg = "Please fill out both the fields.";
		}
	} else {
		$msgType = "success";
		$msg = "Logged in already.";
	}

	die('{ "msgType": "'.$msgType.'", "msg": "'.$msg.'" }');

?>