<?php get_header(); ?>

<div class="main">	
<h1><?php the_title(); ?></h1>

<div id="content"> 
	<?php the_content(); ?>

</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>