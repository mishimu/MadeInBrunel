<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
get_header(); ?>

	<!-- Main Body Start -->
	<div id="single" class="main">
		
		<h1>News</h1>
		<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		
			<div class="avatar">
			<?php 
   				echo get_avatar(get_the_author_meta('id'), $size = '50'); 
   			?>
			</div>
		
			<h2 style="margin: 0px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h4 style="margin-top: 0px; margin-bottom: 10px;"><?php the_time('F jS, Y') ?> - by <?php the_author() ?></h4>

			<div class="entry">
				<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>' . __('Tags:', 'kubrick') . ' ', ', ', '</p>'); ?>

				<!--
				<p class="postmetadata alt">
					<small>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); $time_since = sprintf(__('%s ago', 'kubrick'), time_since($entry_datetime)); */ ?>
						<?php printf(__('This entry was posted on %1$s at %2$s and is filed under %3$s.', 'kubrick'), get_the_time(__('l, F jS, Y', 'kubrick')), get_the_time(), get_the_category_list(', ')); ?>
						<?php printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", "kubrick"), get_post_comments_feed_link()); ?> 

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<?php printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<?php printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'kubrick'); ?>

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.', 'kubrick'); ?>

						<?php } edit_post_link(__('Edit this entry', 'kubrick'),'','.'); ?>

					</small>
				</p>
				-->

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>

<?php endif; ?>

<div class="page-nav" id="posts-navigation">
<?php 
	next_post_link('%link', '<img title="%title" class="prev-page" src="/wp-content/themes/mib/_images/site_page-prev.png" alt="Previous page" />');
	previous_post_link('%link', '<img title="%title" class="next-page" src="/wp-content/themes/mib/_images/site_page-next.png" alt="Next page" />');
?>
</div>

	</div>

<? get_sidebar(); ?>


<?php get_footer(); ?>
