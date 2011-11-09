<?php
/**
 * @package WordPress
 * @subpackage made in Brunel
 */
get_header();
?>
<div class="main">

	<?php if (have_posts()) : ?>

 	   <?php /* If this is a category archive */ if (is_category()) { ?>
      
      	<h1><?php single_cat_title(); ?></h1>
       
              
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1>Tag - <?php single_tag_title(); ?></h1>
 	  
	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1>Archive for <?php the_time('F, Y'); ?></h1>
        
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1>Archive for <?php the_time('Y'); ?></h1>

 	  <?php } ?>


	<div id="content">

<?php while ( have_posts() ) : the_post(); ?>

			<h2 style="margin: 0px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h4 style="margin-top: 0px; margin-bottom: 10px;"><?php the_time('F jS, Y') ?> - by <?php the_author() ?></h4>

			<div style="margin-bottom: 25px;">
				<p><?php content('50'); ?>
                (<a href="<?php the_permalink(); ?>">Read more</a>)</p>
			</div>
	
<?php endwhile; // End the loop. Whew. ?>

<?php endif; // End the loop. Whew. ?>

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