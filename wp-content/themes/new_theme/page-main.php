<? 
	get_header(); 

	$THEME_PATH = get_template_directory_uri();
?>


<div id="banner">
	<div class="container">
		<div>

			<h1><? echo ot_get_option('banner_h_text'); ?></h1>
			<h3><? echo ot_get_option('banner_text_innertext'); ?></h3>

			<div class="btn btn-default"><a href="<? echo ot_get_option('banner_btn_url'); ?>"><? echo ot_get_option('banner_btn_text'); ?></a></div>
			</div>
		</div>
	</div>
</div>	<!-- end banner -->

<div id="services">
	<div class="container">
		<div class="row">
	
			<? if ( function_exists('ot_get_option' )) {	?>
				<? //получаем массив сервисов ?>
				<? $services = ot_get_option('services', array()); ?>
				<? print_r($service); ?>
				<? if ( !empty( $services ) ) { ?>
					<? $size = count($services); ?>
					<? if ($size > 4) { ?> 
						<? while ($size>4) { ?> 
							<? array_pop($services); ?>
							<? $size = count($services); ?>
						<? } ?>
					<? } ?>

					<? $size = count($services); ?>
					<? //выводим каждый ?>
					<? foreach( $services as $service ) { ?>
						
						<? //получаем ссылку на изображение ?>
						<? $img_id = $service['service_icon']; ?>
						<? $img_url = wp_get_attachment_image_src($img_id)[0]; ?>
						
						<? //в зависимости от числа сервисов ставим размер колонки ?>
						<div class="service col-md-<? echo 12/$size; ?> col-sm-6">

							<div class="service-circle" style="background: url('<? echo $img_url; ?>') center center no-repeat;"></div>
							
							<h4><? echo $service['service_h']; ?></h4>
							<p><? echo $service['service_description']; ?></p>
							
							<div class="btn btn-default btn-colored"><a href="<? echo $service['service_btn_url']; ?>"><? echo $service['service_btn_text']; ?></a></div>

						</div>	<!-- end service -->

				    <? } ?>
				<? } ?>
			<? } ?>


		</div>	<!-- end row -->
	</div>	<!-- end container -->
</div>	<!-- end services -->

<div id="portfolio">
	<div class="container">
		<h1><? echo ot_get_option('portfolio_h_text'); ?></h1>
		
		<? $projects_count = ot_get_option('portfolio_projects_count'); ?>

		<? $args = array(
			  'numberposts' => $projects_count,
			  'post_type' => 'portfolio'
			); ?>
 
		<? $latest_projects = get_posts( $args ); ?>

		<? $size_proj = count($latest_projects) ?>
		<? $i = 0; //счетчик для строки ?>
		<? $current = 0; //счетчик -- текущий элемент ?>
		<? $col_size = 'col-md-4'; //если для строки будет оставаться меньше 3х будем менять ?>

		<? foreach ($latest_projects as $post) { ?>
			<? setup_postdata($post); ?>
			
			<? $left = $size_proj - $current; //сколько элементов осталось ?>
			<? $current++; ?>
			
			<? if ($i == 0) { //создаём строку если счетчик = 0 и определяем класс в зависимости от количества оставшихся элементов ?> 
				<div class="row">
				
				<? if ($left == 2) { ?>
					<? $col_size = 'col-md-6'; ?>
				<? } else if ($left == 1) { ?>
					<? $col_size = 'col-md-12'; ?>
				<? } ?>
			<? } ?>
					<div class="<? echo $col_size; ?>  col-sm-4">
						<div class="thumbnail-wrap">
							<a href="<? the_permalink(); ?>">
								<? if ( has_post_thumbnail() ) { ?>
									<? the_post_thumbnail('portfolio-thumb'); ?>
								<? } ?>
							</a>
						</div>
					</div>
			<? $i++; ?>
			<? if ($i == 3 || $current == $size_proj) { //закрываем блок если счетчик эл-в в строке = 3 или когда последний элемент ?> 
				</div>	<!-- end row -->

				<? $i = 0; ?>
			<? } ?>
		<? } //end foreach ?>
		<? wp_reset_postdata(); ?>

		<div class="btn btn-default btn-colored"><a href="<? echo ot_get_option('portfolio_btn_url'); ?>"><? echo ot_get_option('portfolio_btn_text'); ?></a></div>
	</div>	<!-- end container -->
</div>	<!-- end portfolio -->

<div id="our_team">
	<div class="container">
		<h1><? echo ot_get_option('team_h_text'); ?></h1>

		<? $employees_count = ot_get_option('team_count'); ?>

		<? $args = array(
			  'numberposts' => $employees_count,
			  'post_type' => 'team'
			); ?>
		

		<? $team = get_posts($args); ?>

		<? $team_size = count($team); ?>
		<? $team_class = 12/$team_size; ?>

		<div class="row">

		<? foreach($team as $post) { ?>
			<? setup_postdata($post); ?>
			<div class="employee col-md-<? echo $team_class; ?> col-sm-6">
				<div class="photo-wrap">
					<a href="<? the_permalink(); ?>">
						<? if ( has_post_thumbnail() ) { ?>
							<? the_post_thumbnail(array(9999, 200)); ?>
						<? } ?>
					</a>
				</div>	<!-- end photo-wrap -->
				
				<h4><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h4>
				<h6><? echo get_field('position'); ?></h6>
				<p><? the_excerpt(); ?></p>
			</div>
		<? } ?>

		<? wp_reset_postdata(); ?>

		</div>	<!-- end row -->
		
		<div class="btn btn-default btn-colored"><a href="<? echo ot_get_option('team_btn_url'); ?>"><? echo ot_get_option('team_btn_text'); ?></a></div>
	</div>	<!-- end container -->
</div>	<!-- end our_team -->

<div id="reviews">
	<div class="container">
		<h1><? echo ot_get_option('reviews_h_text'); ?></h1>

		<? $args = array(
			  'numberposts' => 1,
			  'post_type' => 'review'
			); ?>

		<? $review = get_posts($args); ?>

		<? foreach ($review as $post) { ?>
			<? setup_postdata($post); ?>
			<p><a href="<? the_permalink(); ?>"><? the_excerpt(); ?></a></p>
			<h5><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h5>
		<? } ?>
		<? wp_reset_postdata(); ?>

	</div>	<!-- end container -->
</div>	<!-- end reviews -->

<div id="contact_us">
	<div class="container">
		<h1><? echo ot_get_option('contacts_h_text'); ?></h1>

		<div class="row">
			<div class="col-md-5 col-sm-6">
				<h2><? echo ot_get_option('contacts_hs_text'); ?></h2>

				<p><? echo ot_get_option('contacts_content_text'); ?></p>

				<? $info = ot_get_option('contacts_info', array()); ?>
				<? foreach($info as $info_item) { ?>
					<h6><? echo $info_item['contacts_info_text']; ?></h6>
				<? } ?>
			</div>
			

			<div class="col-md-6 col-md-offset-1 col-sm-6">
				<form role="form">
					<div class="row">
						<div class="col-md-6">
							<input id="inp_name" type="text" class="form-control" name="name" placeholder="Имя">
						</div>

						<div class="col-md-6">
							<input id="inp_email" type="email" class="form-control" name="email" placeholder="Email">
						</div>
					</div>	<!-- end row with name and email -->
					
					
					<textarea name="message"  class="form-control" id="message" cols="30" rows="10" placeholder="Сообщение"></textarea>
					
					<div class="row">
						<div class="col-md-4 col-md-offset-8" style="text-align: center";>
							<div id="btn_send" class="btn btn-default btn-colored"><? echo ot_get_option('contacts_btn_text'); ?></div>
							<img id="ajax_loader" src="<? echo $THEME_PATH; ?>/img/ajax-loader.gif" alt="">
						</div>
					</div>	<!-- end row with send button -->
				</form>
			</div> <!-- end right column -->
		</div>	<!-- end row -->
	</div>	<!-- end container -->
</div>	<!-- end contact_us -->

<div id="ajax_success"><? echo ot_get_option('contacts_ajax_success'); ?></div>
<div id="ajax_error"><? echo ot_get_option('contacts_ajax_error'); ?></div>

<? 
	get_footer();
?>