<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
?>
<?php get_header(); ?>

<div class="main" id="homepage">
		
			<!-- Home Slideshow -->
			<div id="home-slideshow">
			
				<div id="slides">
				<?php echo getPageContent(17); ?>
				</div>
				
			<img id="prev-slide" src="/wp-content/themes/mib/_images/site_prev-slide.png" alt="Previous Slide" />
			<img id="next-slide" src="/wp-content/themes/mib/_images/site_next-slide.png" alt="Next Slide" />
			
			<div id="slideshow-pager">
				<ul></ul>
			</div>
			
			</div>
			<!-- End Banner	-->
			
			<div id="about-mib" class="col-third">
				<h2><? $page_id='28'; $page = get_post($page_id); echo $page->post_title; ?></h2>

					<?php query_posts('page_id=28'); ?>
						
						<?php while (have_posts()) : the_post(); ?>
                        
                        	<?php the_content(); ?>
                        
                        <?php endwhile; ?>
                    
                    <p><a href="<?php echo get_page_link(7); ?>">Read our story</a></p>
			</div>
			<div id="socialMedia" class="col-third">

			</div>
			<div id="latest-news" class="col-third no-margin">
				<h2>Latest News <a href="<?php bloginfo('rss2_url'); ?>"><img id="latest-news-rss-icon" src="/wp-content/themes/mib/_images/site_rss-icon.gif" alt="RSS Feed" /></a></h2>
                
                <?php query_posts('cat=3&showposts=3'); ?>
						
						<?php while (have_posts()) : the_post(); ?>
                        
                        	 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      		 <h4><?php the_time('F jS, Y') ?></h4>
                             
                        	<p><?php the_excerpt(); ?> (<a href="<?php the_permalink(); ?>">Read more</a>)</p>
                        
                        <?php endwhile; ?>     
                         
   				</div>

			<!-- Content End -->
		</div>
		<!-- Main Body End -->
	</div>
	<!-- Top Container End -->
<!-- Main end -->
</div>

<?php get_footer(); ?>