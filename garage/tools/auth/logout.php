<?php

	require '../../modules/req.php';
	
	if (isset($_SESSION['cyq'])){
		$userModule->endSession();
		go('../../');
		d('You have been successfully logged out. Redirecting..');
	} else{
		go('../../');
		d('error:You are not logged in.');
	}

?>