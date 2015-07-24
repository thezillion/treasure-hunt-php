<?php

	/* DEPRECATED FILE */

	/*
	
	require '../../modules/req.php';

	if (!$sessionActive) {

		$n1 = $_POST['nme1'];
		$n2 = $_POST['nme2'];
		$i = $_POST['instit'];
		$u = $_POST['usrnme'];
		$p = $_POST['psswrd'];
		$e = $_POST['eml'];
		if ($n1 === '' || $n2 === '' || $i === '' || $u === '' || $p === '' || $e === ''){
			d('error:Please fill out all the fields.');
		}
		else{
		// checks and validations

			// check char lengths
			if (strlen($u) > 20){d('error:The username can be max 20 characters long.');}
			if (strlen($u) < 5){d('error:The username should be min 5 characters long.');}
			if (dbNumRows(dbQuery("SELECT * FROM userBase WHERE username='$u'")) > 0){d('error:The username is already taken. Please try a different, unique one.');}
			if (strlen($p) > 20){d('error:The password can be max 20 characters long.');}
			if (strlen($p) < 5){d('error:The password should be min 5 characters long.');}

			// reserved terms validation
			// reservedTerms = array('admin');
			// for ($i = 0; $i < (count($reservedTerms)); $i++){
			// 	if (strpos($reservedTerms[$i], $username)){
			// 		d('error:The username is not available. Please try a different, unique one.');
			// 	}
			// }

			// check char types
			if (!ctype_alpha(replace($n1, ' ', ''))){d('error:Invalid name. It can only contain alphabets.');}
			if (!ctype_alpha(replace($n2, ' ', ''))){d('error:Invalid name. It can only contain alphabets.');}
			if (!ctype_alnum($u)){d('error:Invalid username. It can only contain alphabets and numbers.');}

			// email validation
			if (!filter_var($e, FILTER_VALIDATE_EMAIL)){d('error:Invalid Email ID.');}
			if (dbNumRows(dbQuery("SELECT * FROM userBase WHERE email='$e'")) > 0){d('error:This Email address is already associated with an account. Please use a different one.');}

		// end checks and validations

			// $p = md5($p);
			$t = time();
			$q0 = dbQuery("INSERT INTO userBase (username, password, instit, email, name1, name2, time) VALUES ('$u', '$p', '$i', '$e', '$n1', '$n2', '$t')");
			// , username, password, instit, email, name1, name2, time .. , '$u', '$p', '$i', '$e', '$n1', '$n2', '$t'
			if ($q0) $q1 = dbQuery("INSERT INTO userPerformance (username) VALUES ('$u')");
			
			if ($q0 && $q1){
				d('success:Registration successful. Redirecting..');
			}
			else{
				d("error:I'm busy. Please try again.");
			}
		}
	} */


?>