<?php
include('../connect-db.php');
	if (!isset($_SESSION['userid'])) {
	header('Location: user.php');
	exit;
	}
?>
<table>
	<tr>
		<td>
			<table >
				<tr>
					<td>Selamat Datang di <b style="color:green"><?php echo $judul;?></b></td>
				</tr>
				<tr>
					<td style="padding-bottom:10px;"><hr color="red"></td>
				</tr>
				<tr>
					<td>Berikut ini adalah sedikit panduan tata cara Setting <b style="color:blue">LIVEDRAW</b>.
						<ol style="margin-left: -25px;">
							<li>Perhatikan Timezone pada website, untuk melihatnya <a href="index.php?goto=setting">klik disini.</a></li>
							Timezone pada website <b style="color:green"><?php echo $judul;?></b> ini, adalah <b style="color:green"><?php echo $akhiran;?></b>.<br>
							Apabila Timezone <b style="color:green"><?php echo $judul;?></b> tidak sama dengan Timezone Asia/Jakarta atau GMT+7, <br>
							maka ikuti jam server sesuai Timezone dari <b style="color:green"><?php echo $judul;?></b>.<br>
							<i><b>Contoh :</b><br>
							- Kita asumsikan LIVEDRAW akan dibuka pada jam 07:00:00 WIB (Asia/Jakarta) GMT+7.<br>
							&nbsp;&nbsp;Pada server mengikuti timezone Asia/Singapore atau GMT+8, jarak waktu antara Singapore dengan Jakarta adalah free 1 jam.<br>
							&nbsp;&nbsp;Jika di jakarta hari ini jam 07:00:00 WIB, berarti di Singapore hari ini jam 08:00:00 Waktu Singapore.<br>
							&nbsp;&nbsp;<b>Maka,</b> pada menu <b style="color:green">SETTING WAKTU</b> dibagian WAKTU STANDBY pada form SAMPAI, jam yang kita masukkan adalah 08:00:00 Waktu Singapore.</i>
							<li style="padding-top:10px;">Perhatikan Form <b style="color:blue">Perhitungan Waktu NORMAL</b> di menu <b style="color:blue">SETTING WAKTU</b>.</li>
							<ul style="margin-left: -25px">
								<li><b style="color:blue">WAKTU STANDBY</b> : <i>adalah jarak waktu penambahan result baru.</i></li>
								<li><b style="color:blue">Open LIVE RESULT</b> : <i>adalah jarak waktu LIVEDRAW dibuka.</i></li>
								<li><b style="color:blue">Close LIVE RESULT</b> : <i>adalah jarak waktu LIVEDRAW ditutup.</i></li>
							</ul>
							<li style="padding-top:10px;">Perhatikan Form <b style="color:blue">Perhitungan Waktu LIVE RESULT</b> di menu <b style="color:blue">SETTING WAKTU</b>.</li>
							<ul style="margin-left: -25px">
								<li><i>Ikuti petunjuk pengisian sesuai arah jam yang ada, secara terus-menerus dan berurutan.</i></li>
							</ul>
						</ol>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
