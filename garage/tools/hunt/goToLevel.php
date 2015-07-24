<?php

	require '../../modules/req.php';

	$userDetails = $userModule->details();

	if ($userModule->active == "true") {

		if ($userDetails["admin_rights"] == "1") {

			$newlevel = $_GET['lvl'];

			$checkLevelExists = mysqldb::query(array(
				"action" => "select",
				"table" => "questionBank",
				"limits" => array(
					"qno" => $newlevel
				)
			));

			if (dbrowexists($checkLevelExists)) {
				mysqldb::query(array(
					"action" => "update",
					"table" => "userPerformance",
					"set" => array(
						"level" => $newlevel
					)
				));
			}

		}

		go("../../../letsplay.php");

	}

?>