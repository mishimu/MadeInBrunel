<?php
//directory of profile thumbnails
$image_dir = "/wp-content/themes/mib/_images/people/2011/thumbs/";
?>
<?php get_header(); ?>

<div class="main">
<h1><?php the_title(); ?></h1>
<div id="content"> 
	<ul id="people-index">
	<?php	
	
	//find the current page number
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	//get the people and load them into an array
	
	query_posts(array('post_parent' => 5, 'post_type' => 'page', 'posts_per_page'=> 24, 'orderby' => 'menu_order', 'order' => 'asc', 'paged' => $page));
	
	$i =1;
	while (have_posts()) { 

		the_post();
		
		$name = get_the_title();
		
		$shortname = shortname($name);
		
		//image url
		$root = $_SERVER['DOCUMENT_ROOT'];
		
		$image_url = $image_dir.$shortname.".jpg";
		
		if(!file_exists($root.$image_url)){
			
			//no thumbnail for this person, use the default
			$image_url = $image_dir."default.jpg";
	 
		}
		
		$details = get_post_custom();
		$degree = $details["degree"][0];
		?>
		
		
		<li id="<?php $shortname; ?>"<?php if($i % 4 == 0) echo ' style="margin-right:0"'; ?>>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url; ?>" alt="<?php echo $shortname; ?>-picture" width="144" height="73" /></a>
			<a href="<?php the_permalink(); ?>"><h4><?php echo $name; ?></h4></a>
			<span><?php echo $degree; ?></span>
		</li>
		
		<?php	
		$i++;	
	}	
	?>
	</ul>

	<div class="page-nav" id="people-pagination">
	<!-- Pagination -->
	<?php if(function_exists('wp_paginate')) {
   		wp_paginate();
	} ?>	
	</div>
<!-- End content -->
</div>
<!-- Sidebar -->
<div id="aside">

<img alt="People banner" src="/wp-content/themes/mib/_images/content_sidebar_people.jpg">
<form action="/" id="searchform" method="get" role="search">
	<input type="text" id="s" name="s" value="">
	<input type="submit" value="Search" id="searchsubmit">
</form>

<!-- Sidebar end -->
</div>
</div>
</div>
<?php get_footer(); ?>