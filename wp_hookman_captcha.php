<?

/*
Plugin Name: WP hookman captcha
Plugin URI: http://hookman.ru/wp-hookman-captcha/
Description: This plugin will help you to prevent auto comment spam submittions by clawlers and bots. Requires PHP5 and GD extention installed.
Version: 0.1
Author: hookman
Author URI: http://www.hookman.ru/
*/
/*
	Copyright (C) 2010  hookman

#	This program is free software; you can redistribute it and/or       #   
#	modify it under the terms of the GNU General Public License			#
#	as published by the Free Software Foundation; either version 2		#
#	of the License, or (at your option) any later version.				#
#																		#
#	This program is distributed in the hope that it will be useful,		#
#	but WITHOUT ANY WARRANTY; without even the implied warranty of		#
#	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the		#
#	GNU General Public License for more details.						#
#																		#
#	You should have received a copy of the GNU General Public License	#
#	along with this program; if not, write to the Free Software			#
#	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  		#
#	02110-1301, USA.													#

*/

if (!class_exists('hcaptchaClass')) {
Class hcaptchaClass {	
	
	/* adding actions */
	function addactions() {
			add_action('comment_form_after_fields',array(&$this,'draw_hcaptcha'));
			add_action('comment_post',array(&$this,'check_form'));
			add_action('wp_print_scripts',array(&$this,'link_jquery'));
	}
	
	/* inserting hCaptcha image and input field into the page */
	function draw_hcaptcha($id) {
		global $user_ID;
		switch (@$user_ID) {
			case false:
				if($this->GDLoaded() == false) {
					?>
					<p>Enable GD extention in order to use hCaptcha.</p>					
					<?
				}
				else {
					$stamp = rand(1000,10000);
					?>
					<noscript><p>Enable javascript in order to use hCaptcha.</p></noscript>
					<script type="text/javascript">
					var max = 9999999;
					var min = 10000;
					var uri = '<? bloginfo('url'); ?>/wp-content/plugins/wp-hookman-captcha/captcha-image.php?x=';
					jQuery(document).ready(function(){
						jQuery('#hcaptcha').click(function(){
							var stamp = Math.floor(Math.random() * (max - min + 1)) + min;
							jQuery('#hcaptcha').attr('src','<? bloginfo('url'); ?>/wp-content/plugins/wp-hookman-captcha/captcha-image.php?x='+stamp);
						});
					});
					</script>
					<img id="hcaptcha" style="border:1px solid grey;" src="<? bloginfo('url'); ?>/wp-content/plugins/wp-hookman-captcha/captcha-image.php?x=<? echo $stamp; ?>"><br><input id="hcaptcha_input" type="text" name="hcaptcha" style="width:146px;"/><br>
					<?
					return $id;
				}
				break;
			case true:
				return $id;
				break;
		}
	}
	
	/* checking inserted code */
	function check_form($id) {
		session_start();
		global $user_ID;
	
		switch (@$user_ID) {
			case false:
				if($_SESSION['hcaptcha'] !== md5($_POST['hcaptcha'])) {
					wp_delete_comment($id);
					$this->code_error();
				}
				else {
					return $id;
				}
				break;
			case true:
				return $id;
				break;		
		}
	}	

	/* checking if GD extention is loaded */
	function GDLoaded() {
		$gdlib = extension_loaded('gd');
		switch ($gdlib) {
			case false:
				return false;
			case true:
				return true;
		}
	}
	
	/* showing error */
	function code_error() {
		?>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Wrong hCaptcha Code</title>
			<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-admin/css/install.css" type="text/css" />
			<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/plugins/wp-hookman-captcha/jquery.js"></script>
			</head>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#error-page').css('display','none');
				jQuery('#error-page').animate({'opacity':'show'},600);
			});
			</script>
			<body id="error-page">
			<noscript>Enable javascript please.</noscript>
			<p>Invalid code. No spam please!</p>
			</body>
			</html>
		<? 
		exit;
	}
	
	/* load jQuery if is not already loaded */
	
	function link_jquery() {
		global $wpdb;
		wp_enqueue_script('jquery');
	}
} //endclass;

} //endif;


$new = new hcaptchaClass();
$new->addactions();
?>