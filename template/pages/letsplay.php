<?php

	$levelQ = mysqldb::query(array(
		"action" => "select",
		"table" => "questionBank",
		"limits" => array(
			"qno" => $userDetails["level"]
		)
	));

	$question = dbfresult($levelQ, 'question');

?>

<div id='question' class='l spaazy-l'>
	<h1>Level <?php echo -(-$userDetails["level"]); ?></h1>
	<div class='c'>

	<?php

		if ($userDetails["admin_rights"] == "1") {

			echo <<< EOFILE

		<style type="text/css">
			#adminDiv { margin: 1em 0; }
			#adminDiv span { font-size: 15px; display: block; margin-bottom: 1.2em; }
			#adminDiv .heya { padding: 10px 17px; border-radius: 100%; }
		</style>

		<div id="adminDiv">
		
			<span>Since you have admin rights, you can browse between questions.</span>

EOFILE;

			$qques = mysqldb::query(array(
				"action" => "select",
				"table" => "questionBank",
				"row" => "qno",
				"sort_by" => array(
					"qno" => "asc"
				)
			));

			for ($i = 0, $n = dbnumrows($qques); $i<$n; $i++) {
				echo <<< EOFILE
			
			<a href="garage/tools/hunt/goToLevel.php?lvl=$i" class="heya">$i</a>

EOFILE;
			}

			echo <<< EOFILE
			
		</div>

EOFILE;

		}

	?>

		<?php
			if (isset($question)) echo $question;
			else echo "We ran out of questions!";
		?>
	</div>
		<?php
		if (isset($question)) {
		?>
	<div class='submitAnswer'>
		<input type='text' id='amiright' placeholder='Your answer here..' /><input type='button' id='sub889878' class='ihopeiam' value="Is that right?" /><br/>
		<div id='err889878' class='err o0 h0'></div>
	</div>
		<?php
		}
		?>
</div>
<?php
	if (isset($question)) {
?>
<div class="hintbox spaazy-r">
	<span class="hintbox-header">Need a hint?</span>
	<?php

		$hint_taken = $userDetails["hint_taken"];
		
		if ($hint_taken == "y") {
			$hint = dbfresult(mysqldb::query(array(
				"action" => "select",
				"table" => "questionBank",
				"limits" => array(
					"qno" => $userDetails["level"]
				)
			)), "hint");

			echo <<< EOFILE
	<span class="quesHint">
		Hint: <br/>
		<b>$hint</b>
	</span>
EOFILE;
		} else {
			echo <<< EOFILE
	<a href="garage/tools/hunt/takeHint.php" class="heya font17">Take it</a>
EOFILE;
		}

	?>
</div>
<?php
	}
?>
<div class="cb"></div>

<script type="text/javascript">
	var orfik = { level: { count: <?php echo $userDetails["level"]; ?> } };
</script>

<style type="text/css">
	#nav_hunt{background: #28A68D;}
	.err{width: 53.5%;}
</style>