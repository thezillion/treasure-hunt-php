<?php

	require "home-common.php";

	$loginContent = <<< EOFILE

	<div id='login' class='hAuto 01 db'>
		<span class='boxHeading'>Login</span>
		<div class='err o0' id='err889876'></div>
		<input type='text' id='usrnme' placeholder='Username' />
		<input type='password' id='psswrd' placeholder='Password' />
	</div>
	<div class='c'>
		<input type='button' class='heya' value='LOGIN' id='sub889876' />
	</div>

EOFILE;

	renderHome($loginContent);

?>