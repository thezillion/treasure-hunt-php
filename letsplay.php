<?php
	
	require "garage/modules/req.php";
	require "garage/modules/template.php";

	if ($userModule->active == "false")
		go('./');

	$t = new TemplateEngine();
	$t->render("letsplay");

?>