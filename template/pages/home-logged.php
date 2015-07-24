<?php

	require "home-common.php";

	$uname = $userModule->currentUser;

	$loginContent = <<< EOFILE

	<h2>Logged in as $uname</h2>
	<a href='garage/tools/auth/logout.php' class='heya'>Logout</a>

EOFILE;

	renderHome($loginContent);

?>