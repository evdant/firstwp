<?php


function hex2rgba($hex, $alpha) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgba = 'rgba('.$r.','.$g.','.$b.','.$alpha.')';
   return $rgba;
}


if ( function_exists('add_theme_support')) { 
    add_theme_support('post-thumbnails');

    add_image_size('portfolio-thumb', 9999, 314);
}


function register_menu() {
  register_nav_menu('header_menu', 'Верхняя область меню');
}
add_action('init', 'register_menu');

//ставит длину цитаты у типа поста team 16, review -- 35
function team_excerpt_length( $length ) {
	global $post;
	if ($post->post_type == 'team')
		return 16;
	if ($post->post_type == 'review')
		return 35;
}
add_filter( 'excerpt_length', 'team_excerpt_length', 999 );

//замена стандартного дополнения [...] к цитате
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//ajax
function send_message(){
	global $wpdb;

	$valid_error = false;

	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
	$message = $_REQUEST['message'];

	$reg_email = '/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/';

	if ($name === '' || $message === '') {
		$valid_error = true;
	}

	if (!preg_match($reg_email, $email) || $email === '') {
		$valid_error = true;
	}

	if (!$valid_error) {
		$result = $wpdb->insert(
					'messages',
					array(
						'name' => $name,
						'email' => $email,
						'message' => $message
					)
		);
	}

	if ($result && !$valid_error){
			echo 'success';
		} else {
			echo 'error';
		}
		
	die();
}
add_action('wp_ajax_send_message', 'send_message');
add_action('wp_ajax_nopriv_send_message', 'send_message');

?>