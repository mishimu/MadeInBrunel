<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
get_header(); ?>

<div class="main">

<?php if(is_category('3')){ $title = 'News'; }elseif(is_category('4')){ $title = 'Blog'; }; ?>

	<h1>News</h1>
			
			<div id="content">

<?php 
while ( have_posts() ) : the_post(); ?>

			<h2 style="margin: 0px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h4 style="margin-top: 0px; margin-bottom: 10px;"><?php the_time('F jS, Y') ?> - by <?php the_author() ?></h4>

			<div style="margin-bottom: 25px;">
				<?php the_excerpt(); ?>
                <p>(<a href="<?php the_permalink(); ?>">Read more</a>)</p>
			</div>
	
<?php endwhile; // End the loop. Whew. ?>

	<div class="post-navigation">
       <div class="alignleft">
        <?php posts_nav_link('','','&laquo; Previous Entries') ?>
       </div>
       <div class="alignright">
        <?php posts_nav_link('','Next Entries &raquo;','') ?>
       </div>
   </div>
 
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
