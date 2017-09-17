<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="row tribe-events-single vevent hentry">
   <p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" class="btn btn-default"> <?php printf( __( '&laquo; All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>
    <section id="picture" class="col-lg-3">
        <picture>
            <?php the_post_thumbnail('large'); ?>
            <header>
                <p><?php echo tribe_get_venue() ?></p>
                <address><?php echo tribe_get_full_address(); ?> <?php if ( tribe_show_google_map_link() ) : ?>(<?php echo tribe_get_map_link_html(); ?>)<?php endif; ?></address>
            </header>
            <?php if(get_field('bars-bars')){ ?>
            <a href="http://www.bar-bars.com/" class="partenaire"><?php echo '<img class="barbars" src="' .  get_bloginfo('template_directory') . '/images/barbars-vignette80.png" alt="Collectif Culture Bar-bars" />'; ?></a>
            <?php } ?>
        </picture>
    </section>
    <section class="col-lg-2">
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
        
        <?php
		echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<li style="display:none;">',
				'label_after'  => '</li>',
				'wrap_before'  => '<li class="tribe-events-event-categories">',
				'wrap_after'   => '</li>',
			)
		);
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
    </section>
    <article class="col-lg-5">
        <picture id="logomobile"  class="visible-xs-block"><?php the_post_thumbnail('full'); ?>
            <?php if(get_field('bars-bars')){ ?>
                <a href="http://www.bar-bars.com/" class="partenaire"><?php echo '<img class="barbars" src="' .  get_bloginfo('template_directory') . '/images/barbars-vignette80.png" alt="Collectif Culture Bar-bars" />'; ?></a>
                <?php } ?></picture>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php if(get_field('code_video')){?>
			<div class="embed-responsive embed-responsive-16by9">
			 <?php the_field('code_video'); ?>
			</div>
			<?php }?>
            <!--<a href="<?php the_permalink(); ?>" class="btn btn-default">En savoir +</a>-->
    </article>
    <aside class="col-lg-2">
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
					<?php $phone   = tribe_get_phone(); ?>
				     <?php if ( ! empty( $phone ) ): ?>
			            <dt><?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?></dt>
			            <dd class="tel"> <?php echo $phone ?> </dd>
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
    </aside>
<div class="col-lg-12">
	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->
</div>
</div><!-- #tribe-events-content -->
