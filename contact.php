<?php 
if(isset($_POST['submit'])){
	echo "<script>alert('Thank you!, your message will be send to service agent.'); window.location.href='index.php';</script>";
} else {
	echo "";
}
?>
<div id="home_content">
	<div class="title_day"><h1>&#10144; Contact Us</h1></div>
	<div class="box_responsible" style="color:#101010;">
		If you have any questions, please contact <span style="color:blue;"><?php echo $mail;?></span>.<br>
		Or you can claim the form below. Please send comments and suggestions.<br>
		<br/>
		<hr color="#d0a;">
		<div id="contact_form">
			<form method="post" name="contact" action="">
			<br/>			
			<label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
			<br/>
			<br/>
			<label for="email">Email:</label> <input type="email" class="validate-email required input_field" name="email" id="email" />
			<br/>
			<br/>
			<label for="subject">Subject:</label> <input type="text" class="validate-subject required input_field" name="subject" id="subject"/>				               
			<br/>
			<br/>
			<label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
			<br/>
			<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
			<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
			</form>
		</div>
		<div class="cleaner"></div>
	</div>
</div>