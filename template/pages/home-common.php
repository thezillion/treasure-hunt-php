<?php

	function renderHome($lc) {

		echo <<< EOFILE

	<div class='c'>
		<!-- <div class='r990'>
			<img src='assets/images/enl-orfik-thezillion-14.11.12.png' class='r112' />
		</div> -->
		<div class='login-form'>
		
EOFILE;

		echo $lc;

		echo <<< EOFILE
		</div>
	</div>

	<style type="text/css">
		#nav_home{background-color: #28A68D;}
	</style>

EOFILE;

	}

?>