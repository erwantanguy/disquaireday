<footer id="footer" class="row">
	<div class="col-lg-4 col-md-4  col-sm-12">
		<?php $query = new WP_Query( array( 'page_id' => 41 ) );
			if ( have_posts() ) {
			while ($query->have_posts()) : $query->the_post();
		?>
			<header>
				<h5><?php the_title() ?></h5>
				<h2><?php the_content(); ?> </h2>
			</header>
		<?php rewind_posts(); ?>
		<?php endwhile;   }?>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-6 socialbutton">
		<ul class="">
			    		<?php if(get_option('facebook')){?>
							<li><a href="<?php echo get_option('facebook'); ?>" title="Facebook <?php bloginfo('name'); ?>"><i class="fa fa-facebook"></i></a></li>
						<?php }?>
						<?php if(get_option('twitter')){?>
							<li><a href="<?php echo get_option('twitter'); ?>" title="Twitter <?php bloginfo('name'); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php }?>
						<?php if(get_option('instagram')){?>
							<li><a href="<?php echo get_option('instagram'); ?>" title="Instagram <?php bloginfo('name'); ?>"><i class="fa fa-instagram"></i></a></li>
						<?php }?>
						<?php if(get_option('pinterest')){?>
							<li><a href="<?php echo get_option('pinterest'); ?>" title="Pinterest <?php bloginfo('name'); ?>"><i class="fa fa-pinterest-p"></i></a></li>
						<?php }?>
						<?php if(get_option('googleplus')){?>
							<li><a href="<?php echo get_option('googleplus'); ?>" title="googleplus <?php bloginfo('name'); ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php }?>
						<?php if(get_option('youtube')){?>
							<li><a href="<?php echo get_option('youtube'); ?>" title="youtube <?php bloginfo('name'); ?>"><i class="fa fa-youtube"></i></a></li>
						<?php }?>
					</ul>
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6">
		<?php wp_nav_menu(array(
			'theme_location' => 'troisieme',
			'walker' => new Bootstrap_Walker_Nav_Menu(),
			'menu_class' => 'nav navbar-nav navbar-right'
		) );
		?>
		<p>Le Calif <!-- © --><i class="glyphicon glyphicon-copyright-mark"></i> Tous Droits Réservés - 2015 - Création <a href="http://www.ticoet.fr">ticoët</a></p>
	</div>
				<?php wp_footer(); ?>
			</footer>
		</div>
		
		
	</body>
</html>