<!DOCTYPE html>
<head>
<base href="<?php echo $url2;?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=960,initial-scale=1, maximum-scale=1"/>
<meta name="google" content="translate" />
<meta name="keywords" content="Victoria Pools Today, Victoria Pools Pick4, Lotto, Lottery, Toto, Gambling" />
<meta name="description" content="The Biggest Lottery Agen of WLA (LEGALLY)" />
<title><?php echo $pageTitle;?> - The Great Of Online Lottery</title>
<link rel="Shortcut Icon" href="images/<?php echo $manis;?>" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="style.css"/>
<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
	<div id="header_wrapper">
		<div id="logo">
			<a href="/"><img src="images/<?php echo $manis;?>" width="120"></a>
		</div>
		<div id="top_menu_wrapper">
			<div id="top_menu">
				<a href="/">Home</a>
				<span class="top_menu_border"> &nbsp;|&nbsp; </span>
				<a href="responsible.cgi">Responsible Gambling</a>
				<span class="top_menu_border"> &nbsp;|&nbsp; </span>
				<a href="about.cgi">About Us</a>
				<span class="top_menu_border"> &nbsp;|&nbsp; </span>
				<a href="contact.cgi">Contact Us</a>
			</div><!--end top_menu-->
		</div><!--end top_menu_wrapper-->
		<h2><?php echo $pageTitle;?></h2>
		<div id="main_menu_wrapper">
			<div id="main_menu">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="day/sunday/1">Sunday</a></li>
					<li><a href="day/monday/1">Monday</a></li>
					<li><a href="day/tuesday/1">Tuesday</a></li>
					<li><a href="day/wednesday/1">Wednesday</a></li>
					<li><a href="day/thursday/1">Thursday</a></li>
					<li><a href="day/friday/1">Friday</a></li>
					<li><a href="day/saturday/1">Saturday</a></li>
					<li class="active"><a href="live.cgi">Live Draw</a></li>
				</ul>
			</div><!--end main_menu-->
		</div><!--end main_menu_wrapper-->
	</div><!--end header_wrapper-->
</div><!--end header-->
<div id="main">
	<div id="main_wrapper">
		<?php
		if (isset($_GET['day']) && $_GET['day'] == "live"){
			echo '<meta http-equiv="refresh" content="20"/>';
			include $content; 
		} else {
			include $content; 
		}
		?>
		<div id="bottom_content">
			<div id="bottom_content_1" style="text-align:center;">
				<img src="images/wla-logo.png" width="100%">
			</div>
			<div id="bottom_content_1">
				<div id="box1_bottomcontent">
					<img src="images/numbers.png">
					<h3><a href="live.cgi">What Numbers to buy</a></h3>
					<p>Translate your inspirations into lucky 6D numbers!</p>
				</div><!--end box1_bottomcontent-->
				<div id="box2_bottomcontent">
					<img src="images/coin_chest.png">
					<h3><a href="/">Big Jackpot Winnings</a></h3>
					<p>Find out where Jackpot winners bought their tickets.</p>
				</div><!--end box1_bottomcontent-->
				<div id="box3_bottomcontent">
					<img src="images/coins.png">
					<h3><a href="live.cgi">Did i win ?</a></h3>
					<p>Check if your numbers have won any prize.</p>
				</div><!--end box1_bottomcontent-->
				<div id="box4_bottomcontent">
					<img src="images/mobile.png">
					<h3><a href="/">Results on Mobile</a></h3>
					<p>Get 6D results on mobile phone.</p>
				</div><!--end box1_bottomcontent-->
			</div><!--end bottom_content_1-->
			<div id="bottom-top">
				<div class="item">
					<img src="images/apple.png"><a href="http://www.apple.com/iphone/from-the-app-store" target="blank">Get <?php echo $pageTitle;?> on iPhone</a>
				</div><!--end item-->
				<div class="item">
					<img src="images/android.png"><a href="https://play.google.com/store" target="blank">Get <?php echo $pageTitle;?> on android</a>
				</div><!--end item-->
				<div class="item">
					<img src="images/email.png"><a href="mailto:<?php echo $email1;?>">Get 6D Results via Email</a>
				</div><!--end item-->
				<div class="item">
					<img src="images/hp.png"><a href="#">Get 6D Results on Mobile Phone</a>
				</div><!--end item-->
			</div><!--end bottom-top-->
        </div><!--end bottom_content-->
        <div id="footer">
             Copyright © 2016 - <?php echo date('Y');?> <a href="#"><?php echo $_SERVER['SERVER_NAME'];?></a> Corporation All Rights Reserved.<br/>
			 Recommended browser: <img src="http://icons.veryicon.com/128/Application/Pacifica/browser%20google%20chrome.png" width="15"/> Google Chrome
        </div><!--end footer-->
    </div><!--end main_wrapper-->
</div><!--end main-->
<script type="text/javascript">
$("#slideshow > div:gt(0)").hide();
setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);
</script>
</body>
</html>