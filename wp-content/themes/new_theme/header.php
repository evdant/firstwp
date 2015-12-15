<?
	$THEME_PATH = get_template_directory_uri();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title><? the_title(); ?></title>
		<link rel="stylesheet" href="<? echo $THEME_PATH; ?>/css/reset.css">
        <!-- Bootstrap core CSS -->
        <link href="<? echo $THEME_PATH; ?>/libs/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<? echo $THEME_PATH; ?>/libs/awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<? echo $THEME_PATH; ?>/style.css">
		<link rel="stylesheet" href="<? echo $THEME_PATH; ?>/css/m992.css">
		<link rel="stylesheet" href="<? echo $THEME_PATH; ?>/css/m768.css">

		<!-- opensans шрифт -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

		<script type="text/javascript">
				var ajax_url = "<? echo admin_url('admin-ajax.php') ?>";
		</script>

		<style>
			h1, h2, h3, h4, h5, h6 {
				font-family: '<? echo ot_get_option('h_font_family'); ?>', sans-serif;
			}
			
			h1 {
				font-size: <? echo ot_get_option('h1_font_size'); ?>px;
				color: <? echo ot_get_option('h1_color'); ?>;
			}

			h2 {
				font-size: <? echo ot_get_option('h2_font_size'); ?>px;
				color: <? echo ot_get_option('h2_color'); ?>;
			}

			h3 {
				font-size: <? echo ot_get_option('h3_font_size'); ?>px;
				color: <? echo ot_get_option('h3_color'); ?>;
			}

			h4 {
				font-size: <? echo ot_get_option('h4_font_size'); ?>px;
				color: <? echo ot_get_option('h4_color'); ?>;
			}

			h5 {
				font-size: <? echo ot_get_option('h5_font_size'); ?>px;
				color: <? echo ot_get_option('h5_color'); ?>;
			}

			h6 {
				font-size: <? echo ot_get_option('h6_font_size'); ?>px;
				color: <? echo ot_get_option('h6_color'); ?>;
			}

			p {
				font-size: <? echo ot_get_option('p_font_size'); ?>px;
				color: <? echo ot_get_option('p_color'); ?>;
				font-family: '<? echo ot_get_option('p_font_family'); ?>', sans-serif;
			}

			/* main color */
			<? $main_color = ot_get_option('main_color'); ?>
			#menu .current-menu-item a, #menu li a:hover, #banner .btn:hover, .service-circle, .btn-colored:hover {
				color: <? echo ot_get_option('main_color'); ?>; 
			}

			#menu .current-menu-item {
				border-bottom: 3px solid <? echo $main_color; ?>;
			}

			.service-circle {
				border: 3px solid <? echo $main_color; ?>;
			}

			.btn-colored {
				background-color: <? echo $main_color; ?>;
				border: 2px solid <? echo $main_color; ?>;
			}

			.btn-colored:hover {
				border: 2px solid <? echo $main_color; ?>;
			}
			/* end main color */


			#banner {
				<? $alpha = ot_get_option('banner_alpha'); ?>
				<? $banner_bgc = hex2rgba($main_color,$alpha); ?>
				background-color: <? echo $banner_bgc; ?>;
			}

			#banner:before {
				<? $bg_img_id = ot_get_option('banner_bg_img'); ?>
				<? $bg_img_url = wp_get_attachment_image_src($bg_img_id,'full')[0]; ?>
				background: url('<? echo $bg_img_url; ?>') center 0 no-repeat;
			}


			#banner h1 {
				font-size: <? echo ot_get_option('banner_h_font_size'); ?>px;
				color: <? echo ot_get_option('banner_h_color'); ?>;
			}

			#banner h3 {
				font-size: <? echo ot_get_option('banner_text_font_size'); ?>px;
				color: <? echo ot_get_option('banner_text_color'); ?>;
			}

			#logo a, #menu li, #menu li a {
				line-height: <? echo ot_get_option('menu_height'); ?>px;
			}

			#menu {
				height: <? echo ot_get_option('menu_height'); ?>px;
			}

			#contact_us {
				<? $hex = ot_get_option('contacts_bg_color'); ?>
				<? $c_alpha = ot_get_option('contacts_alpha'); ?>
				<? $c_rgba = hex2rgba($hex,$c_alpha); ?>
				background-color: <? echo $c_rgba ?>;
			}

			#contact_us:before {
				<? $c_bg_img_id = ot_get_option('contacts_bg_img'); ?>
				<? $c_bg_img_url = wp_get_attachment_image_src($c_bg_img_id,'full')[0]; ?>
				background: url('<? echo $c_bg_img_url; ?>') center 0 no-repeat;
			}

			<? if (ot_get_option('header_fixed') == true) { ?>
				#header {
				    position: fixed;
				    top: 0;
				    z-index: 1000;
				}

				#banner {
					<? $m_height = ot_get_option('menu_height'); ?>
					<? $m_height = $m_height + 3 ?>
					margin-top: <? echo $m_height; ?>px;
				}

			<? } ?>
		</style>

		<? wp_head(); ?>
	</head>

	<body>
		<nav id="header" class="navbar navbar-default" role="navigation">
			<div class="container">

				<div id="logo">
					<? $logo = ot_get_option('logo'); ?>
					<? $logo_url = wp_get_attachment_image_src($logo)[0]; ?>
					<a href="<? echo get_home_url(); ?>">
						<img src="<? echo $logo_url ?>" alt="">
					</a>
				</div>

				<div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" 
			         data-target="#menu">
			         <span class="sr-only">Toggle navigation</span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			      </button>
			   </div>
					<? wp_nav_menu(array(
									'menu' => 'header_menu',
									'container_id' => 'menu',
									'menu_class' => 'nav navbar-nav',
									'container_class' => 'collapse navbar-collapse'
					  )); ?>
				<div class="clear"></div>
			</div>
		</nav>