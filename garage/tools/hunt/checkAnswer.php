<?php
	
	require '../../modules/req.php';

	$onLvl = $_POST["lvl"];
	$userDetails = $userModule->details();
	$userLevel = $userDetails["level"];

	if ($onLvl == $userLevel) {

		// load the question and answer
		$levelQ = mysqldb::query(array(
			"action" => "select",
			"table" => "questionBank",
			"limits" => array(
				"qno" => $userLevel
			)
		));

		$question = dbfresult($levelQ, 'question');
		$dbAnswer = dbfresult($levelQ, 'answer');

		if (isset($_POST['grs45665448g132dsgh3df12h3df'])){

			$userAnswer = str_replace(' ', '', strtolower($_POST['grs45665448g132dsgh3df12h3df']));
			$timenow = date('Y-m-d H:i:s');

			// dbQuery("INSERT INTO userResponses (id, username, level, response, time) VALUES ('', '$sessionActive', '$userLevel', '$userAnswer', '$timenow')");
			
			mysqldb::query(array(
				"action" => "insert",
				"table" => "userResponses",
				"values" => array(
					"id" => "",
					"username" => $userModule->currentUser,
					"level" => $userLevel,
					"response" => $userAnswer,
					"time" => $timenow
				)
			));

			if ($userAnswer === $dbAnswer){
				$userScore = $userDetails["score"];
				$levelCompletion = $userDetails["taskCompletions"] . '\n' . $userLevel . ' : ' . $timenow;
				$userScore += 10;
				$userLevel++;
				// $q0 = dbQuery("UPDATE userPerformance SET level='$userLevel', hint_taken='n', score='$userScore', lastTaskCompleted='$timenow', taskCompletions='$levelCompletion' where username='$sessionActive'") or $msgType = "error";
				$msg = "dberr";
				$q0 = mysqldb::query(array(
					"action" => "update",
					"table" => "userPerformance",
					"set" => array(
						"level" => $userLevel,
						"hint_taken" => "n",
						"score" => $userScore,
						"lastTaskCompleted" => $timenow,
						"taskCompletions" => $levelCompletion
					),
					"limits" => array(
						"username" => $userModule->currentUser
					)
				));
				$msgType = "success";
				$msg = "Correct answer! Redirecting..";
			}
			else{
				$msgType = "error";
				$msg = "Nay, wrong answer.";
			}
		}
		else{
			$msgType = "error";
			$msg = "No answer provided.";
		}

	} else {
		$msgType = "success";
		$msg = "This level has already been solved.";
	}

	die('{ "msgType": "'.$msgType.'", "msg": "'.$msg.'" }');

?>