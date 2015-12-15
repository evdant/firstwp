<?
	$THEME_PATH = get_template_directory_uri();
?>	

		<!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<? echo $THEME_PATH; ?>/js/jquery-1.11.3.js"></script>
        <script src="<? echo $THEME_PATH; ?>/libs/bootstrap/js/bootstrap.js"></script>


		<? if (is_front_page()) { ?> 
			<script type="text/javascript" src="<? echo $THEME_PATH; ?>/js/script.js"></script>
		<? } ?>

        <? wp_footer(); ?>
	</body>
</html>
