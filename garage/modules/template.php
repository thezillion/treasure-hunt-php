<?php

	class TemplateEngine {
		public function render_markup($arr) {
			$title = (isset($arr["title"])&&$arr["title"]!="")?($arr["title"]." - CyQuest"):"CyQuest";
			$code = $arr["mrkp"];
			$scripts = isset($arr["script"])?'<script type="text/javascript" src="'.$arr["script"].'"></script>':"";
			global $userModule;
			
			require "template/main.php";

		}

		public function render($key) {			
			$arr = array(
				"home" => array(
					"mrkp" => "template/pages/home.php",
					"script" => "assets/js/login.js"
				),
				"home-logged" => array(
					"mrkp" => "template/pages/home-logged.php",
				),
				"rules" => array(
					"title" => "Rules",
					"mrkp" => "template/pages/rules.php"
				),
				"leaderboard" => array(
					"title" => "Leaderboard",
					"mrkp" => "template/pages/leaderboard.php"
				),
				"letsplay" => array(
					"title" => "Hunt",
					"mrkp" => "template/pages/letsplay.php",
					"script" => "assets/js/play.js"
				)
			);

			$this->render_markup($arr[$key]);
		}
	}

?>