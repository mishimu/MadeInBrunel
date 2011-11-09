<?php
//directory of profile thumbnails
$image_dir = "/wp-content/themes/mib/_images/exhibitors/projects/";

$project_id = get_the_id();

$title = get_the_title();
	
$lowercase = strtolower($title);
$shortname = str_replace(" ", "-", $lowercase);
		
//image url
$image_url = $image_dir.$shortname.".jpg";

//get the project info

$details = get_post_custom();
$subtitle = $details["project-subtitle"][0];
/*
the creators of the project are stored as a comma separated string.
This could of course be done by adding multiple custom fields in wordpress, 
but this is less DB intensive and quicker for data entry.  
*/
$creators_string = $details["project-creators"][0];
$creators_string = str_replace(" ", "", $creators_string);
$creators = explode(",", $creators_string);
?>
<?php get_header(); ?>

<div class="main" id="project-single">	
<h1><?php the_title(); ?></h1>
<h3><?php echo $subtitle; ?></h3>
<div id="content"> 

<!-- Project description -->
<div class="col-third">
	<?php the_content(); ?>
	
	<!-- Project creator(s) -->

<ul id="project-creators">
<?php	

//directory of profile thumbnails
$profile_image_dir = "/wp-content/themes/mib/_images/people/2011/thumbs/";

query_posts(array('post_type' => 'page', 'post__in' => $creators));
while(have_posts()){	the_post();
	
	$name = get_the_title();
		
	$profile_shortname = shortname($name);
	
	//image url
	$root = $_SERVER['DOCUMENT_ROOT'];
	
	$profile_image_url = $profile_image_dir.$profile_shortname.".jpg";
	
	if(!file_exists($root.$profile_image_url)){
		
		//no thumbnail for this person, use the default
		$profile_image_url = $profile_image_dir."default.jpg";
 
	}
	
	$details = get_post_custom();
	$degree = $details["degree"][0];
?>
	<li id="<?php $profile_shortname; ?>">
		<a href="<?php the_permalink(); ?>"><img src="<?php echo $profile_image_url; ?>" alt="<?php echo $profile_shortname; ?>-picture" width="144" height="73" /></a>
		<a href="<?php the_permalink(); ?>"><h4><?php echo $name; ?></h4></a>
		<span><?php echo $degree; ?></span>
	</li>
<?php
} 
?>
</ul>
</div>

<!-- Project images -->
<div class="col-third" id="project-images">
<?php
wp_reset_query();

//get the name of the image directory

$project = get_the_title();
			
//make the shortname
$shortname = shortname($project);

$shortname = sanitize($shortname);
$shortname = preg_replace('/[^(\x20-\x7F)]*/','', $shortname);
$root = $_SERVER['DOCUMENT_ROOT'];

$image_dir = "/wp-content/themes/mib/_images/projects/2011/$shortname/";

if ($handle = @opendir($root.$image_dir)){
	
	$i = 1;//counter
	while (false !== ($file = readdir($handle))) {
		
		if($file != "." && $file != ".."){
	        ?>
    	    <img src="<?php echo $image_dir.$file; ?>" alt="<?php echo "$project-$i"; ?>" />
        	<?php
        }
        $i++;
    }
}

?>
</div>

<!-- Page navigation -->
<div class="page-nav" id="projects-navigation">
<?php 
	previous_post_link('%link', '<img title="%title" class="prev-page" src="/wp-content/themes/mib/_images/site_page-prev.png" alt="Previous page" />');
	next_post_link('%link', '<img title="%title" class="next-page" src="/wp-content/themes/mib/_images/site_page-next.png" alt="Next page" />');
?>
</div>

<!-- Content end -->
</div>

<div id="aside">

<img src="/wp-content/themes/mib/_images/content-aside_exhibitions-banner.jpg" alt="Projects banner" />
<form action="/" id="searchform" method="get" role="search">
	<input type="text" id="s" name="s" value="">
	<input type="submit" value="Search" id="searchsubmit">
</form>
<!-- end sidebar -->
</div>

</div>
<!-- Main Body End -->
</div>
<!-- Top Container End -->
<?php get_footer(); ?>