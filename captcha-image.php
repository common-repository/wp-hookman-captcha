<?php

#################################################
#                                               #
# This is freeware hookman captcha script which #
# can be used to prevent bots submittions and   #
# assure human submittions only.                #
# Author: hookman                               #    
# Any questions: hookman.name@mail.ru           #
# Plugin link:									#
# http://hookman.ru/hookman_captcha.zip 		#
# Addiotional info: http://hookman.ru           #
#                                               #
#################################################

session_start();
header('Content-type: image/png');
$arr = array('a','b','c','d','e','f','g','h',
'k','n','p','q','r','s','t','u',
'v','x','y','z','2','3','4','5','6','7',
'8','9');

$code= '';
$_SESSION['hcaptcha'] = '';
for ($i = 0; $i < 6; $i++) {
	$gen = $arr[rand(0,27)];
	$code .= $gen;
	}

$_SESSION['hcaptcha'] = md5($code);
$img = imagecreatetruecolor(150,60);
$bg = imagecolorallocate($img,255,255,255);
imagefill($img,0,0,$bg);
$colors = array('imagecolorallocate($img,0xFF,0xCC,0x00)',
'imagecolorallocate($img,0xFF,0x00,0xBB)');
$font1 = 'font.ttf';
$black = imagecolorallocatealpha($img,0,0,0,100);


$style = Array(
                $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT
                );
$black = imagecolorallocatealpha($img,0,0,0,50);				
$style2 = Array(
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black
				);
$black = imagecolorallocatealpha($img,0,0,0,30);
$style3 = Array(
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT,
                $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				$black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black, $black,
				IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT, 
                IMG_COLOR_TRANSPARENT,
				IMG_COLOR_TRANSPARENT,
				);				
$s = rand(1,3);
$def = 0;
switch ($s) {
	case 1:
	$def = $style;
	$cs = 2; 
	break;
	case 2:
	$def = $style2;
	$cs = 2; 
	break;
	case 3:
	$def = $style3;
	$cs = 1; 
	break;
}				
$s2 = rand(4,6);
$def2 = 0;
switch ($s2) {
	case 4:
	$def2 = $style;
	$cs2 = 2; 
	break;
	case 5:
	$def2 = $style2;
	$cs2 = 2; 
	break;
	case 6:
	$def2 = $style3;
	$cs2 = 1; 
	break;
}

$s3 = rand(6,8);
$def3 = 0;
switch ($s3) {
	case 6:
	$def3 = $style;
	$cs3 = 2; 
	break;
	case 7:
	$def3 = $style2;
	$cs3 = 2; 
	break;
	case 8:
	$def3 = $style3;
	$cs3 = 1; 
	break;
}

$s4 = rand(8,10);
$def4 = 0;
switch ($s4) {
	case 8:
	$def4 = $style;
	$cs4 = 2; 
	break;
	case 9:
	$def4 = $style2;
	$cs4 = 2; 
	break;
	case 10:
	$def4 = $style3;
	$cs4 = 1; 
	break;
}

$s5 = rand(10,12);
$def5 = 0;
switch ($s5) {
	case 10:
	$def5 = $style;
	$cs5 = 2; 
	break;
	case 11:
	$def5 = $style2;
	$cs5 = 2;
	break;
	case 12:
	$def5 = $style3;
	$cs5 = 1; 
	break;
}				
imagesetthickness($img, 1);
$j=6;
$c = imagecolorallocate($img,0,0,0);

for ($i =0; $i < 6; $i++) {
        imagefttext($img,27,0,$j,40,imagecolorallocate($img,0,0,0),
        $font1,$code[$i]);
	$j=$j+23;
	}
	



function wave_area($img, $x, $y, $width, $height, $amplitude = 10, $period = 10){
    $height2 = $height * 2;
    $width2 = $width * 2;
    $img2 = imagecreatetruecolor($width2, $height2);
    imagecopyresampled($img2, $img, 0, 0, $x, $y, $width2, $height2, $width, $height);
    if($period == 0) $period = 1;
    for($i = 0; $i < ($width2); $i += 2)
        imagecopy($img2, $img2, $x + $i - 2, $y + sin($i / $period) * $amplitude, $x + $i, $y, 2, $height2);
    imagecopyresampled($img, $img2, $x, $y, 0, 0, $width, $height, $width2, $height2);
    imagedestroy($img2);
}

$amp  = rand(6,8);
$per  = rand(15,29);
wave_area($img, 0, 0, imagesx($img), imagesy($img), $amp, $per);

imagesetstyle($img,$def);
imagesetthickness($img, $cs);
imageline($img,1,53,149,53,IMG_COLOR_STYLED);
imagesetstyle($img,$def2);
imagesetthickness($img, $cs2);
imageline($img,1,43,149,43,IMG_COLOR_STYLED);
imagesetstyle($img,$def3);
imagesetthickness($img, $cs3);
imageline($img,1,33,149,33,IMG_COLOR_STYLED);
imagesetstyle($img,$def4);
imagesetthickness($img, $cs4);
imageline($img,1,23,149,23,IMG_COLOR_STYLED);
imagesetstyle($img,$def5);
imagesetthickness($img, $cs5);
imageline($img,1,13,149,13,IMG_COLOR_STYLED);

wave_area($img, 0, 0, imagesx($img), imagesy($img), $amp, $per);
imagepng($img);
imagedestroy($img);
?>

