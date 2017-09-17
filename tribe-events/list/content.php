<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div class="row events">

	<!-- List Title -->
	<?php //do_action( 'tribe_events_before_the_title' ); ?>
	<!-- <h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>-->
	<?php //do_action( 'tribe_events_after_the_title' ); ?>

	<!-- Notices -->
	<?php //tribe_events_the_notices() ?>

	<!-- List Header -->
	<?php //do_action( 'tribe_events_before_header' ); ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

		<!-- Header Navigation -->
		<?php do_action( 'tribe_events_before_header_nav' ); ?>
		<?php tribe_get_template_part( 'list/nav', 'header' ); ?>
		<?php do_action( 'tribe_events_after_header_nav' ); ?>

	</div>
	<!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ); ?>

<div class="col-lg-12">
<?php
$terms = get_terms('tribe_events_cat', array('orderby'=> 'name',));
//print_r($terms);
//print_r($_GET['events']);
   foreach ($terms as $term) {
   	  $post = $_GET['tag'];
	  $tagname= $_GET['tag_name'];
	  $events = $_GET['events'];
	  if($post){
	  	$wpq = array ('taxonomy'=>'tribe_events_cat','orderby'=> 'name','term'=>$term->slug,'tag_slug__in' => $post,);
		//print_r($wpq);
	  }
	  else{
	  	$wpq = array ('taxonomy'=>'tribe_events_cat','orderby'=> 'name','term'=>$term->slug,'meta_key'=>'jour_ou_nuit','meta_value'	=>$events,);
	  }
      
      $myquery = new WP_Query($wpq);
      //print_r($myquery->posts);
      //print_r($wpq);
	  
      $article_count = $myquery->post_count;
      echo "<header class=\"heading\"><h2 class=\"term-heading\" id=\"".$term->slug."\">";
      echo $term->name;
      echo "</h2></header>";
		//print_r($term);
      if ($article_count) {
         echo "<table id=\"events".$term->term_id."\" class=\"table table-striped container\">";
		 //echo "<tr><th class=\"hidden-xs\"></th><th colspan=\"3\" class=\"text-right\"><a href=\"#top\" class=\"fa fa-arrow-up btn btn-rond\"><span>top</span></a></th></tr>";
         while ($myquery->have_posts()) : $myquery->the_post();?>
            <tr>
				<td class="col-lg-3 hidden-md hidden-sm hidden-xs" id="logo<?php echo $term->term_id; ?>_1">
					<picture>
						<?php the_post_thumbnail('full'); ?>
						<header>
							<p><?php echo tribe_get_venue() ?></p>
							<address><?php echo tribe_get_full_address(); ?></address>
						</header>
						<?php if(get_field('bars-bars')){ ?>
						<a href="http://www.bar-bars.com/" class="partenaire"><?php echo '<img class="barbars" src="' .  get_bloginfo('template_directory') . '/images/barbars-vignette80.png" alt="Collectif Culture Bar-bars" />'; ?></a>
						<?php } ?>
					</picture>
				</td>
				<td class="col-md-3 hidden-lg hidden-sm hidden-xs" id="logo<?php echo $term->term_id; ?>_2">
					<picture>
						<?php the_post_thumbnail('medium'); ?>
						<header>
							<p><?php echo tribe_get_venue() ?></p>
							<address><?php echo tribe_get_full_address(); ?></address>
						</header>
						<?php if(get_field('bars-bars')){ ?>
						<a href="http://www.bar-bars.com/" class="partenaire"><?php echo '<img class="barbars" src="' .  get_bloginfo('template_directory') . '/images/barbars-vignette80.png" alt="Collectif Culture Bar-bars" />'; ?></a>
						<?php } ?>
					</picture>
				</td>
				<td class="col-sm-3 hidden-lg hidden-md hidden-xs" id="logo<?php echo $term->term_id; ?>_3">
					<picture>
						<?php the_post_thumbnail('medium'); ?>
						<header>
							<p><?php echo tribe_get_venue() ?></p>
							<address><?php echo tribe_get_full_address(); ?></address>
						</header>
						<?php if(get_field('bars-bars')){ ?>
						<a href="http://www.bar-bars.com/" class="partenaire"><?php echo '<img class="barbars" src="' .  get_bloginfo('template_directory') . '/images/barbars-vignette80.png" alt="Collectif Culture Bar-bars" />'; ?></a>
						<?php } ?>
					</picture>
				</td>
				<td class="col-lg-2 col-sm-12">
					<p class="date"><strong>
						<?php
							$time_format= "G\hi";
							$start_time = tribe_get_start_date( null, false, $time_format );
							$end_time = tribe_get_end_date( null, false, $time_format );
							if($end_time===$start_time){
								echo $start_time;
							}
							else{
						?>
						De <?php echo $start_time; ?> à <?php echo $end_time; ?>
						<?php }?></strong><br>
						<?php  $ts = wp_get_post_tags(get_the_ID());?>
						<?php if($ts){?>
							<ul class="list-unstyled">
					<?php
						foreach ($ts as $t){
							echo "<li><a href=\"".get_site_url()."/events/"."?tag=".$t->slug."&tag_name=".$t->name."\"  class=\"urlthemes\">".$t->name."</a></li>";
						}
					?>
					</ul>
					<?php } ?>
					</p>
					<?php the_excerpt(); ?>
					<dl>
					<?php $cost = tribe_get_formatted_cost();$websitevent = tribe_get_event_website_link();?>
					<?php if ( ! empty( $cost ) ) : ?>
						<dt> <?php esc_html_e( 'Cost:', 'the-events-calendar' ) ?> </dt>
						<dd class="tribe-events-event-cost"> <?php esc_html_e( $cost ); ?> </dd>
					<?php endif ?>
					</dl>
				</td>
				<td class="col-lg-5 col-sm-12">
					<picture id="logomobile"  class="visible-xs-block"><?php the_post_thumbnail('full'); ?>
					<?php if(get_field('bars-bars')){ ?>
						<a href="http://www.bar-bars.com/" class="partenaire"><?php echo '<img class="barbars" src="' .  get_bloginfo('template_directory') . '/images/barbars-vignette80.png" alt="Collectif Culture Bar-bars" />'; ?></a>
						<?php } ?></picture>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<!--<a href="<?php the_permalink(); ?>" class="btn btn-default">En savoir +</a>-->
				</td>
				<td class="col-lg-2 col-sm-12">
					<!--<h4 class="author fn org"><?php echo tribe_get_venue() ?></h4>-->
					<dl>
						<dt class="visible-xs-block"><?php echo tribe_get_venue() ?></dt>
						<dd class="visible-xs-block"><?php echo tribe_get_full_address(); ?></dd>
					<?php 
					$phone   = tribe_get_phone();
					$website = tribe_get_venue_website_link();
					//if ( ! empty( $phone ) ): ?>
						<!--<dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
						<dd class="tel"> <?php echo $phone; ?> </dd>-->
					<?php //endif ?>
			
					<?php if ( ! empty( $website ) ): ?>
						<dt class="visible-xs-block"> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
						<dd class="url"><?php if($websitevent){$siteweb=strip_tags($websitevent);}else{$siteweb = strip_tags($website);} ?><a href="<?php echo $siteweb; ?>"><?php if(get_field('plus_infos')){ ?><?php the_field('plus_infos'); ?><?php }else{echo "En savoir +";} ?></a></dd>
					<?php endif ?>
						<dt>Partagez sur :</dt>
						<dd>
							<ul class="nav navbar-nav">
								<li>
									<a onclick="window.open(this.href,'twitter-share-dialog','width=626,height=436');return false;" rel="nofollow" class="share" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php echo tribe_get_venue() ?> <?php the_permalink(); ?> via @disquaireday <?php if(get_field('bars-bars')){echo '@cafscultures';} //echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>" title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
		     					</li>
		     					<!--<li>
		     						<a onclick="window.open(this.href,'twitter-share-dialog','width=626,height=436');return false;" rel="nofollow" class="share-twitter share-icon" href="http://twitter.com/share?url=<?php the_permalink(); ?>&via=disquaireday&text=<?php the_title(); ?> - <?php echo tribe_get_venue() ?>" title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
		     					</li>-->
		     					<li>
		     						<a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','facebook-share-dialog','width=626,height=436');return false;" href="#" class="share" title="Cliquez pour partager sur Facebook"><i class="fa fa-facebook"></i></a>
		     					</li>
		     					<li>
		     						<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','googleplus-share-dialog','width=626,height=436');return false;" href="#" class="share" title="Cliquez pour partager sur Google+"><i class="fa fa-google-plus"></i></a>
		     					</li>
							</ul>
						</dd>
						<dt>Sur vos agendas :</dt>
						<dd>
							<?php do_action( 'event_calendar' ) ?>
						</dd>
					</dl>
				</td>
			</tr>
			
         <?php endwhile;
         echo "<tr><th class=\"hidden-xs\"></th><th colspan=\"3\" class=\"text-right\"><a href=\"#top\" class=\"fa fa-arrow-up btn btn-rond\"><span>top</span></a></th></tr>";
         echo "</table><div class='clear'></div>";
      }else{echo "<table class=\"table table-striped container\"><tr><th>Il n'y a pas d'événement ";
      if($tagname){echo $tagname." ";};
      echo "!</th><th class=\"text-right\"><a href=\"#top\" class=\"fa fa-arrow-up btn btn-rond\"><span>top</span></a></th></tr></table>";}
}
?>
</div>


	<!-- List Footer -->
	<?php do_action( 'tribe_events_before_footer' ); ?>
	<div id="tribe-events-footer" class="col-lg-12">

		<!-- Footer Navigation -->
		<?php do_action( 'tribe_events_before_footer_nav' ); ?>
		<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
		<?php do_action( 'tribe_events_after_footer_nav' ); ?>

	</div>
	<!-- #tribe-events-footer -->
	<p class="col-lg-12"><?php do_action( 'tribe_events_after_footer' ) ?></p>

</div><!-- #tribe-events-content -->
