<?php session_start();

class CaptchaSecurityImages {
	
	/* font yang digunakan adalah monofont.ttf */
	var $font = 'monofont.ttf';

	function generateCode($characters) {
		/* daftar karakter2 yang ingin ditampilkan */
		$possible = '23456789';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}

	function CaptchaSecurityImages($width='120',$height='60',$characters='6') {
		$code = $this->generateCode($characters);
		/* ukuran font akan menjadi 75% dari tinggi gambar */
		$font_size = $height * 1;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		/* mengatur warna background, font, titik dan garis */
		$background_color = imagecolorallocate($image, 255, 255, 255);
		$text_color = imagecolorallocate($image, 20, 40, 100);
		$noise_color = imagecolorallocate($image, 230, 230, 230);
		/* generate random letak titik2 pada background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random letak garis pada background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		/* membuat textbox and menambahkan text */
		$textbox = imagettfbbox($font_size, 0, $this->font, $code) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $code) or die('Error in imagettftext function');
		/* menampilkan image captcha di browser */
		header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		$_SESSION['security_code'] = $code;
	}

}

$width = isset($_GET['width']) ? $_GET['width'] : '120';
$height = isset($_GET['height']) ? $_GET['height'] : '40';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';

$captcha = new CaptchaSecurityImages($width,$height,$characters);

?>