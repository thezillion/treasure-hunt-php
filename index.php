<?php
	
	require "garage/modules/req.php";
	require "garage/modules/template.php";

	$t = new TemplateEngine();

	if ($userModule->active == "false")
		$t->render("home");
	else if ($userModule->active == "true")
		$t->render("home-logged");

?>