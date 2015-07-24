<?php

	session_start();

	class user {

		public $active = "false";
		public $currentUser = NULL;

		public function details($uname = NULL) {

			if (isset($uname))
				$username = $uname;
			else if ($this->active == "true")
				$username = $this->currentUser;
			else
				$username = NULL;

			if (isset($username)) {
				$q = mysqldb::query(array(
					"action" => "select",
					"table" => "userBase",
					"limits" => array(
						"username" => $username
					)
				));

				if (dbrowexists($q)) {
					$username = $_SESSION["cyq"];
					$instit = dbfresult($q, "instit");
					$admin_rights = dbfresult($q, "admin_rights");

					$q_perf = mysqldb::query(array(
						"action" => "select",
						"table" => "userPerformance",
						"limits" => array(
							"username" => $username
						)
					));

					$level = dbfresult($q_perf, "level");
					$score = dbfresult($q_perf, "score");
					$hint_taken = dbfresult($q_perf, "hint_taken");
					$taskCompletions = dbfresult($q_perf, "taskCompletions");

					return array(
						"username" => $username,
						"id" => $this->getid($username),
						"institution" => $instit,
						"level" => $level,
						"score" => $score,
						"hint_taken" => $hint_taken,
						"taskCompletions" => $taskCompletions,
						"admin_rights" => $admin_rights
					);
				}
			}
		}

		public function getid($username) {
			$x = mysqldb::query(array(
				"action" => "select",
				"table" => "userBase",
				"limits" => array(
					"username" => $username
				)
			));
			if (dbrowexists($x)) {
				return dbfresult($x, "id");
			}
		}

		public function endSession() {
			session_destroy();
		}

	}

	$userModule = new user();

	if (isset($_SESSION["cyq"])) {
		$userModule->active = "true";
		$userModule->currentUser = $_SESSION["cyq"];
	}

?>