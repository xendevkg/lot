<div id="home_content">
	<div class="title_day"><h2>&#10144; Result by <?php echo ucfirst($_GET['d']);?></h2></div>
	<div class="box_day">
		<table>
			<tbody>
				<tr class="boxday-tr1">
					<td>No</td>
					<td>Day</td>
					<td>Date</td>
					<td>Draw</td>
					<td>1<sup>st</sup> Prize</td>
					<td>2<sup>nd</sup> Prize</td>
					<td>3<sup>rd</sup> Prize</td>
				</tr>
				<?php
					error_reporting(0);
					if (isset($_GET['d'])) { 
						$harix = mysql_real_escape_string($_GET['d']);
						$xhari = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
						if($harix != in_array($harix, $xhari)){
							echo "<script> alert('Invalid authorization key!, This server could not verify that you are authorized to access the document requested!'); window.location.href='".$url2."index.php';</script>";
						}
					}
					$key = mysql_real_escape_string($_GET['key']);
					$hari = mysql_real_escape_string($_GET['d']);
					$hour = date("Y-m-d"); 
					$result2 = mysql_query("SELECT * FROM result where day='$hari' order by id DESC limit 1");
					while($row2 = mysql_fetch_array( $result2 )) {
						if ($row2['date1'] == $hour){
							if(antara(''.$buka.'',''.$akhir.'',date("G:i:s"))){
								$noUrut = 1;
								$perpage =30;
								if(isset($_GET["page"])){
									$page = intval($_GET["page"]);
								} else {
									$page = 1;
								}
								$calc = $perpage * $page;
								$start = $calc - $perpage;
								$result = mysql_query("SELECT result.*, temp.* FROM result inner join temp on result.id=temp.id where result.day='$hari' order by result.id DESC limit 1,30");
								if(mysql_num_rows($result)>0){
									$i = 1;
									while($row = mysql_fetch_array( $result )) {
										if($i%2==0){
											$clastr = "boxday-tr3";
										} else {
											$clastr = "boxday-tr2";
										}
										$cex = md5($row['date1']);
										?>
					<tr class="<?php echo $clastr;?>">
						<td><?php echo $i;?></td>
						<td><?php echo $row['day'];?></td>
						<td><?php echo $row['date1'];?></td>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['prize1'];?></td>
						<td><?php echo $row['prize2'];?></td>
						<td><?php echo $row['prize3'];?></td>
					</tr>										
										<?php $i++; } } 
										} else if(antara(''.$akhir.'',''.$tutup.'',date("G:i:s"))){
											$noUrut = 1;
											$perpage = 20;
											if(isset($_GET["page"])){
												$page = intval($_GET["page"]);
											} else {
												$page = 1;
											}
											$calc = $perpage * $page;
											$start = $calc - $perpage;
											$result = mysql_query("SELECT result.*, temp.* FROM result inner join temp on result.id=temp.id where result.day='$hari' order by result.id DESC limit $start, $perpage");
											if(mysql_num_rows($result)>0){
												$i = 1;
												while($row = mysql_fetch_array( $result )) {
													if($i%2==0){
														$clastr = "boxday-tr3";
													} else {
														$clastr = "boxday-tr2";
													}
													$cex = md5($row['date1']);
										?>
					<tr class="<?php echo $clastr;?>">
						<td><?php echo $i;?></td>
						<td><?php echo $row['day'];?></td>
						<td><?php echo $row['date1'];?></td>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['prize1'];?></td>
						<td><?php echo $row['prize2'];?></td>
						<td><?php echo $row['prize3'];?></td>
					</tr>
										<?php $i++; } } }
										} else {
											$noUrut = 1;
											$perpage = 30;
											if(isset($_GET["page"])){
												$page = intval($_GET["page"]);
											} else {
												$page = 1;
											}
											$calc = $perpage * $page;
											$start = $calc - $perpage;
											$result = mysql_query("SELECT result.*, temp.* FROM result inner join temp on result.id=temp.id where result.day='$hari' order by result.id DESC limit $start, $perpage");
											if(mysql_num_rows($result)>0){
												$i = 1;
												while($row = mysql_fetch_array( $result )) {
													if($i%2==0){
														$clastr = "boxday-tr3";
													} else {
														$clastr = "boxday-tr2";
													}
													$cex = md5($row['date1']);
										?>
					<tr class="<?php echo $clastr;?>">
						<td><?php echo $i;?></td>
						<td><?php echo $row['day'];?></td>
						<td><?php echo $row['date1'];?></td>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['prize1'];?></td>
						<td><?php echo $row['prize2'];?></td>
						<td><?php echo $row['prize3'];?></td>
					</tr>
										<?php $i++; } } } } ?>
				</tbody>
			</tbody>			
		</table>		
	</div>
	<?php
	if(isset($page)){
		$result = mysql_query("select Count(*) As Total from result");
		$rows = mysql_num_rows($result);
		if($rows){
			$rs = mysql_fetch_array($result);
			$total = $rs["Total"];
		}
		$totalPages = ceil($total / $perpage);
		if($page <=1 ){
			echo "<br><br>";
		} else {
			$j = $page - 1;
			echo '<div style="text-align:left; margin-top:20px;"><span style="background-color:#00785e; font-family:verdana; font-size:11px; font-weight:bold; text-align:left; border:1px solid #01b06f; padding:5px;"><a href="day/'.mysql_real_escape_string($_GET['d']).'/'.$j.'" style="text-decoration:none; color:#FFD801;">&laquo; PREV</a></span></div>';
		}
		if($page == $totalPages ){
			echo "<br>";
		} else {
			$j = $page + 1;
			echo '<div style="text-align:right; margin-top:-10px;"><span style="background-color:#00785e; font-family:verdana; font-size:11px; font-weight:bold; text-align:right; border:1px solid #01b06f; padding:5px;"><a href="day/'.mysql_real_escape_string($_GET['d']).'/'.$j.'" style="text-decoration:none; color:#FFD801;">NEXT &raquo;</a></span></div>';
		}
	}
	?>
</div>