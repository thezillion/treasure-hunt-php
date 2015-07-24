						<div id='userDetails'>
							<div class='userD-initial'></div>
							<div id='substance'>
								<h2 class='fl'><?php echo $userModule->currentUser; $userDetails = $userModule->details(); ?></h2>
								<a href='backyard/logout.php' class='fr heya font17'>LOGOUT</a>
								<div class='cb' style="margin-bottom: 5px;"></div>
								<table>
									<tr>
										<td>
											<span class='hitch'>School </span>
										</td>
										<td> : </td>
										<td>
											<span class='hiker'><?php echo $userDetails["institution"]; ?></span>
										</td>
									</tr>
									<tr>
										<td>
											<span class='hitch'>Level </span>
										</td>
										<td> : </td>
										<td>
											<span class='hiker'><?php echo $userDetails["level"]; ?></span>
										</td>
									</tr>
									<tr>
										<td>
											<span class='hitch'>Score </span>
										</td>
										<td> : </td>
										<td>
											<span class='hiker'><?php echo $userDetails["score"]; ?></span>
										</td>
									</tr>
								</table>
							</div>
						</div>