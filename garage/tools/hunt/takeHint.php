<?php

	require '../../modules/req.php';

	$userDetails = $userModule->details();

	if ($userModule->active == "true") {

		$hint_taken = $userDetails["hint_taken"];
		$userScore = $userDetails["score"];

		if ($hint_taken == "n") {
			$userScore -= 5;
			mysqldb::query(array(
				"action" => "update",
				"table" => "userPerformance",
				"set" => array(
					"hint_taken" => "y",
					"score" => $userScore
				),
				"limits" => array(
					"username" => $userModule->currentUser
				)
			));
		}

		go("../../../letsplay.php");

	} else {
		go("/");
	}

?>