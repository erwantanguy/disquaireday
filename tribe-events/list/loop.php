<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<div class="tribe-events-loop vcalendar">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php //do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Month / Year Headers -->
		<?php //tribe_events_list_the_date_headers(); ?>

		<!-- Event  -->
		<?php
		echo "<hr>";print_r($post);echo "<hr>";
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>
		
		<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>" <?php echo $post_parent; ?>>
			<?php tribe_get_template_part( 'list/single', 'event' ) ?>
			<?php //$test = tribe_get_event_cat_ids( get_the_id() ); print_r($test); echo $test[0];?>
			<hr><?php echo tribe_get_event_cat_slugs(get_the_id())[0];
			//echo tribe_get_event_categories( get_the_id());	?><hr> 
			<?php //echo tribe_get_event_taxonomy(); ?>
		</div><!-- .hentry .vevent -->


		<?php //do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

</div><!-- .tribe-events-loop -->
