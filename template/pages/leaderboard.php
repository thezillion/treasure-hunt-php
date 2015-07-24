<div id='question'>
	<h1>Leaderboard</h1>
	<p>
		<table class='gridChart noTransition'>
			<tr id='gridHeading'>
				<td>
					Rank
				</td>
				<td>
					Username
				</td>
				<td>
					Level
				</td>
				<td>
					Score
				</td>
				<td title='Format : year-month-day hour:minute:second' class='lastLevelCompletedColumn'>
					Last level completed at
				</td>
			</tr>
			<?php
				$getUserPerfs = mysqldb::query(array(
					"action" => "select",
					"table" => "userPerformance",
					"limits" => array(
						"admin_rights" => "0"
					),
					"sort_by" => array(
						"level" => "desc",
						"score" => "asc",
						"lastTaskCompleted" => "asc"
					)
				));
				for ($ein=0; $ein<dbnumrows($getUserPerfs); $ein++){
					$playerRank = $ein + 1;
					$playerUserName = dbresult($getUserPerfs, $ein, 'username');
					$playerLevel = dbresult($getUserPerfs, $ein, 'level');
					$playerScore = dbresult($getUserPerfs, $ein, 'score');
					$playerLastTaskCompleted = dbresult($getUserPerfs, $ein, 'lastTaskCompleted');
					echo $sbjksjksd = <<< EOPAGE
					<tr>
						<td>
							$playerRank
						</td>
						<td>
							$playerUserName
						</td>
						<td>
							$playerLevel
						</td>
						<td>
							$playerScore
						</td>
						<td>
							$playerLastTaskCompleted
						</td>
					</tr>
EOPAGE;
				}
			?>
		</table>
	</p>
</div>

<style type="text/css">
	#nav_leaderboard{background-color: #28A68D;}
</style>