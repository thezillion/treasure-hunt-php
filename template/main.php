<?php

	echo <<< EOFILE
<!DOCTYPE html>
<html>
	<head>
		<title>
			$title
		</title>
		<link rel='shortcut icon' href='favicon.ico' />
		<link rel='stylesheet' href='assets/css/main.css' type='text/css' />
		<script type='text/javascript' src='assets/js/main.js'></script>
	</head>
	<body>
		<div>
			<div id='wrapper' class='c'>
				<div id='packing_ribbon' class='c'>
					<div class='spaz'>
						<!-- <div id='logo'></div> -->
						<div id='nav' class='fr'>
							<a href='./' id='nav_home'><span>HOME</span></a>
							<a href='rules.php' id='nav_rules'><span>RULES</span></a>
							<a href='letsplay.php' id='nav_hunt'><span>HUNT!</span></a>
							<a href='leaderboard.php' id='nav_leaderboard'><span>LEADERBOARD</span></a>
							<a href='#' id='nav_forum'><span>FORUM</span></a>
						</div>
						<div class='cb'></div>
					</div>
				</div>
				<div id='gift' class='spaz'>
					<div id='content'>
EOFILE;
						
			if ($userModule->active == "true"){
				require 'userDetails.php';
			}

			require $code;
			
			echo <<< EOFILE
						
					</div>
				</div>
				<div id='underline' class='spaz'>
					<div class='fl floater'>
						<p>
							Organised at <span id='nsf2012'><a href='#' target='_blank'>Event 2015</a></span>
						</p>						
					</div>
					<div class='fr floater'>
						<p>
							Developed using <a href="http://github.com/thezillion/treasure-hunt-php">treasure-hunt-php</a> by <a href="http://github.com/thezillion">thezillion</a>
						</p>
					</div>
					<div class='cb'></div>
				</div>
			</div>
		</div>
EOFILE;

			echo $scripts;

			echo <<< EOFILE

	</body>
</html>

EOFILE;

?>