<?php $hour = date("Y-m-d");?>
<div id="home_content">
	<div id="bgdragon">
		<div id="livedrawbox">
			<div id="responsecontainer">
				<div id="footer_left_home_content">
					<p>Livedraw will start on <?php echo "<a>".substr($mulai,0,5)."</a> and finish at <a>".substr($akhir,0,5)."</a> (".$ok['gmt'].")";?></p>
				</div><br/>	
				<?php 
				$hasilx = mysql_fetch_array(mysql_query("SELECT * FROM result where date1='".$hour."'"));
				if(empty($hasilx['prize1'])){
					$idx = mysql_result(mysql_query("select max(id) from result"),0)+1;
					$besok = date('d-m-Y',strtotime($hasilx['date1']."+1 days"));
					echo "<div id='header_left_home_content'>
							<img src='images/$manis' width='60' style='margin-top:2px;'>
							<h2>LIVE DRAW</h2>
							<p>Draw NO : ".$idx." | ".date('d-m-Y', strtotime($besok))." | ".ucfirst(date('D', strtotime($besok)))."</p>
						</div>";
				} else {
					$hasilx = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by temp.id DESC limit 1"));
					$besok = date('d-m-Y',strtotime($hasilx['date1'] . "+1 days"));
					$idx = $hasilx['id']+1;
					if(antara($aaa,''.$tutup.'',date("H:i:s"))){
						echo "<div id='header_left_home_content'>
								<img src='images/$manis' width='60' style='margin-top:2px;'>
								<h2>LIVE DRAW</h2>
								<p>Draw NO : ".$hasilx['id']." | ".date('d-m-Y (l)', strtotime($hasilx['date1']))."</p>
							</div>";
						} else if ($hasilx['date1'] < $hour){
						echo "<div id='header_left_home_content'>
								<img src='images/$manis' width='60' style='margin-top:2px;'>
								<h2>LIVE DRAW</h2>
								<p>Draw NO : ".$idx."| ".date('d-m-Y (l)', strtotime($besok))."</p>
							</div>";
					} else {
						$hasilx = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id where result.date1='".$hour."'"));
						echo "<div id='header_left_home_content'>
								<img src='images/$manis' width='60' style='margin-top:2px;'>
								<h2>LIVE DRAW</h2>
								<p>Draw NO : ".$hasilx['id']." | ".date('d-m-Y (l)', strtotime($hasilx['date1']))."</p>
							</div>";
					}
				}
				?>
				<div id="table_left_home_content">
					<table id="table_home_1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="3" class="td1_home1">1st prize</td>
								<td colspan="2" class="td2_home1">
							<?php
							// prize 1
							$hasil1 = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id where result.date1='$hour'"));
							if(empty($hasil1['prize1'])){ 
								echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
							} else {
								$hasil1 = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by result.id desc limit 1"));
								if(antara(''.$mulai.'',''.$p1a.'',date("H:i:s"))){
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								} else if (antara(''.$p1a.'',''.$p1b.'',date("H:i:s"))){
									echo '<img style="border:0;height:10px; width:100px;" src="img/loading.gif"/>';	
								} else if(antara(''.$p1b.'',''.$akhir.'',date("H:i:s"))){
									echo '<script type=\'text/javascript\' src=\'js/lotto1.js\'></script>';
									echo '<div id="putar" class="ling">';
									for ($i=0;$i<=5;$i++) { echo '<span id="msg'.$i.'" class="sp">-</span>';}
									echo '</div>';
								} else if(antara(''.$akhir.'',''.$tutup.'',date("H:i:s"))){
									echo '<span class="sp">'.substr($hasil1['prize1'],0,1).'</span><span class="sp">'.substr($hasil1['prize1'],1,1).'</span><span class="sp">'.substr($hasil1['prize1'],2,1).'</span><span class="sp">'.substr($hasil1['prize1'],3,1).'</span><span class="sp">'.substr($hasil1['prize1'],4,1).'</span><span class="sp">'.substr($hasil1['prize1'],5,1).'</span>';
								} else if(antara(''.$buka.'',''.$mulai.'',date("H:i:s"))){
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								} else {
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								}
							}
							?>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="td1_home1">2nd prize</td>
								<td colspan="2" class="td2_home1">
							<?php
							// prize 2
							$hasil2 = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id where result.date1='$hour'"));
							if(empty($hasil2['prize2'])){ 
								echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
							} else {
								$hasil2 = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by result.id desc limit 1"));
								if(antara(''.$mulai.'',''.$p2a.'',date("H:i:s"))){
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								} else if(antara(''.$p2a.'',''.$p2b.'',date("H:i:s"))){
									echo '<img style="border:0;height:10px; width:100px;" src="img/loading.gif"/>';	
								} else if(antara(''.$p2b.'',''.$p2c.'',date("H:i:s"))){
									echo '<script type=\'text/javascript\' src=\'js/lotto1.js\'></script>';
									echo '<div id="putar" class="ling">';
									for ($i=0;$i<=5;$i++) { echo '<span id="msg'.$i.'" class="sp">-</span>';}
									echo '</div>';
								} else if(antara(''.$p2c.'',''.$tutup.'',date("H:i:s"))){
									echo '<span class="sp">'.substr($hasil2['prize2'],0,1).'</span><span class="sp">'.substr($hasil2['prize2'],1,1).'</span><span class="sp">'.substr($hasil2['prize2'],2,1).'</span><span class="sp">'.substr($hasil2['prize2'],3,1).'</span><span class="sp">'.substr($hasil1['prize2'],4,1).'</span><span class="sp">'.substr($hasil1['prize2'],5,1).'</span>';
								} else if(antara(''.$buka.'',''.$mulai.'',date("H:i:s"))){
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								} else {
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								}
							}
							?>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="td1_home1">3rd prize</td>
								<td colspan="2" class="td2_home1">
							<?php
							// prize 3
							$hasil3 = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id where result.date1='".$hour."'"));
							if(empty($hasil3['prize3'])){ 
								echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
							} else {
								$hasil3 = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by result.id desc limit 1"));
								if(antara(''.$mulai.'',''.$p3a.'',date("H:i:s"))){
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								} else if(antara(''.$p3a.'',''.$p3b.'',date("H:i:s"))){
									echo '<img style="border:0;height:10px; width:100px;" src="img/loading.gif"/>';	
								} else if(antara(''.$p3b.'',''.$p3d.'',date("H:i:s"))){ 
									echo '<script type=\'text/javascript\' src=\'js/lotto1.js\'></script>';
									echo '<div id="putar" class="ling">';
									for ($i=0;$i<=5;$i++) { echo '<span id="msg'.$i.'" class="sp">-</span>';}
									echo '</div>';
								} else if(antara(''.$p3d.'',''.$tutup.'',date("H:i:s"))){
									echo '<span class="sp">'.substr($hasil3['prize3'],0,1).'</span><span class="sp">'.substr($hasil3['prize3'],1,1).'</span><span class="sp">'.substr($hasil3['prize3'],2,1).'</span><span class="sp">'.substr($hasil3['prize3'],3,1).'</span><span class="sp">'.substr($hasil1['prize3'],4,1).'</span><span class="sp">'.substr($hasil1['prize3'],5,1).'</span>';
								} else if(antara(''.$buka.'',''.$mulai.'',date("H:i:s"))){
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								} else {
									echo "<span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span><span class='sp'>X</span>";
								}
							}
							?>
								</td>
							</tr>
						</tbody>
					</table>
					<table id="table_home_2" style="padding:5px;">
						<caption>Special Prize</caption>
						<?php
						// Starter
						$starter = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by result.id desc limit 1"));
						if($starter['date1'] != $hour){
							$res_start = "<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>";							
						} else {
							if(antara(''.$mulai.'',''.$s1.'',date("H:i:s"))){
								$res_start = "<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>";
							} else if(antara(''.$s1.'',''.$s2.'',date("H:i:s"))){
								$res_start = "<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>";
							} else if(antara(''.$s2.'',''.$s3.'',date("H:i:s"))){
								$res_start = "<script type='text/javascript' src='js/lotto2.js'></script>
								<div id='putar' class='ling'>
								<tr><td class='td1_home2'><span id='msg0' class='sp'>-</span><span id='msg1' class='sp'>-</span><span id='msg2' class='sp'>-</span><span id='msg3' class='sp'>-</span><span id='msg4' class='sp'>-</span><span id='msg5' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg6' class='sp'>-</span><span id='msg7' class='sp'>-</span><span id='msg8' class='sp'>-</span><span id='msg9' class='sp'>-</span><span id='msg10' class='sp'>-</span><span id='msg11' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg12' class='sp'>-</span><span id='msg13' class='sp'>-</span><span id='msg14' class='sp'>-</span><span id='msg15' class='sp'>-</span><span id='msg16' class='sp'>-</span><span id='msg17' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg18' class='sp'>-</span><span id='msg19' class='sp'>-</span><span id='msg20' class='sp'>-</span><span id='msg21' class='sp'>-</span><span id='msg22' class='sp'>-</span><span id='msg23' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg24' class='sp'>-</span><span id='msg25' class='sp'>-</span><span id='msg26' class='sp'>-</span><span id='msg27' class='sp'>-</span><span id='msg28' class='sp'>-</span><span id='msg29' class='sp'>-</span></td></tr>
								</div>";
							} else if(antara(''.$s3.'',''.$tutup.'',date("H:i:s"))){
								$res_start = "<tr><td class='td1_home2'>$starter[prize4]</td></tr>
								<tr><td class='td1_home2'>$starter[prize5]</td></tr>
								<tr><td class='td1_home2'>$starter[prize6]</td></tr>
								<tr><td class='td1_home2'>$starter[prize7]</td></tr>
								<tr><td class='td1_home2'>$starter[prize8]</td></tr>";
							} else if(antara(''.$buka.'',''.$mulai.'',date("H:i:s"))){
								$res_start = "<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>";
							} else {
								$res_start = "<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>";
							}
						}
						echo "<tbody>$res_start</tbody>";
						?>
					</table>
					<table id="table_home_2" style="padding:5px; border-right:none;">
						<caption style="border-right:none;">Consolation Prize</caption>
						<?php
						// Consol
						$consola = mysql_fetch_array(mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by result.id desc limit 1"));
						if($consola['date1'] != $hour){
							$res_cons = "<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>
							<tr><td class='td1_home2'>X X X X X X</td></tr>";							
						} else {
							if(antara(''.$mulai.'',''.$c1.'',date("H:i:s"))){
								$res_cons = "<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>";
							} else if(antara(''.$c1.'',''.$c2.'',date("H:i:s"))){
								$res_cons = "<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>
								<tr><td class='td1_home2'><img style='border:0;height:10px; width:100px;' src='img/loading.gif'/></td></tr>";
							} else if(antara(''.$c2.'',''.$c3.'',date("H:i:s"))){
								$res_cons = "<script type='text/javascript' src='js/lotto2.js'></script>
								<div id='putar' class='ling'>
								<tr><td class='td1_home2'><span id='msg0' class='sp'>-</span><span id='msg1' class='sp'>-</span><span id='msg2' class='sp'>-</span><span id='msg3' class='sp'>-</span><span id='msg4' class='sp'>-</span><span id='msg5' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg6' class='sp'>-</span><span id='msg7' class='sp'>-</span><span id='msg8' class='sp'>-</span><span id='msg9' class='sp'>-</span><span id='msg10' class='sp'>-</span><span id='msg11' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg12' class='sp'>-</span><span id='msg13' class='sp'>-</span><span id='msg14' class='sp'>-</span><span id='msg15' class='sp'>-</span><span id='msg16' class='sp'>-</span><span id='msg17' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg18' class='sp'>-</span><span id='msg19' class='sp'>-</span><span id='msg20' class='sp'>-</span><span id='msg21' class='sp'>-</span><span id='msg22' class='sp'>-</span><span id='msg23' class='sp'>-</span></td></tr>
								<tr><td class='td1_home2'><span id='msg24' class='sp'>-</span><span id='msg25' class='sp'>-</span><span id='msg26' class='sp'>-</span><span id='msg27' class='sp'>-</span><span id='msg28' class='sp'>-</span><span id='msg29' class='sp'>-</span></td></tr>
								</div>";
							} else if(antara(''.$c3.'',''.$tutup.'',date("H:i:s"))){
								$res_cons = "<tr><td class='td1_home2'>$consola[prize9]</td></tr>
								<tr><td class='td1_home2'>$consola[prize10]</td></tr>
								<tr><td class='td1_home2'>$consola[prize11]</td></tr>
								<tr><td class='td1_home2'>$consola[prize12]</td></tr>
								<tr><td class='td1_home2'>$consola[prize13]</td></tr>";
							} else if(antara(''.$buka.'',''.$mulai.'',date("H:i:s"))){
								$res_cons = "<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>";
							} else {
								$res_cons = "<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>
								<tr><td class='td1_home2'>X X X X X X</td></tr>";
							}
						}
						echo "<tbody>$res_cons</tbody>";
						?>
					</table>						
				</div>
				<div id="footer_left_home_content">
					<p>Full Payment Guaranteed</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
start_loop('putar');
</script>

