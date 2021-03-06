<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel 2011
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" charset="<?php bloginfo( 'charset' ); ?>" >
<meta name="Description" content="Made in Brunel gives the public an opportunity to experience the brightest creations from Brunel University's globally renowned School of Engineering and Design.">
<meta http-equiv="Keywords" content="Made in Brunel, Brunel University, School of Engineering and Design, Design exhibition, student exhibition, product design, industrial design, multimedia technology and design">
<meta name="Author" content="Made in Brunel">
<!-- facebook meta data -->
<meta property="og:title" content="Made In Brunel 2012">
<meta property="og:type" content="website">
<meta property="og:url" content="http://madeinbrunel.com/">
<meta property="og:image" content="http://madeinbrunel.com/wp-content/themes/mib2012/assets/images/MIB_Icon.png">
<meta property="og:site_name" content="Made In Brunel ">
<meta property="fb:admins" content="1619700045">	
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
    <link rel="alternate" type="application/rss+xml" title="Made in Brunel" href="http://madeinbrunel.com/feed/" />
	<link rel="image_src" href="http://madeinbrunel.com/wp-content/themes/mib/_images/site_preview.jpg" />
    <link rel="shortcut icon" href="/wp-content/themes/mib/_images/site_favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="/wp-content/themes/mib/_css/ie6.css" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" type="text/css" href="/wp-content/themes/mib/_css/ie7.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/wp-content/themes/mib/_css/ie8.css" /><![endif]-->
	
	<script type="text/javascript" src="/wp-content/themes/mib/_js/functions.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/cufon-yui.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/FedraSerifPro_B.font.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/Frutiger_LT_Std.font.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/core.js"></script>
	<script type="text/javascript" src="/wp-content/themes/mib/_js/mailingList.js"></script>
	<script src="/wp-content/themes/mib2012/assets/js/libs/jquery.tweet.js"></script> <!-- tweet feed -->
	<script type='text/javascript'>
		jQuery(function($){
			$(".tweetContainer").tweet({
			  avatar_size: 50,
			  count: 2,
			  query: "madeinbrunel",
			  loading_text: "Searching twitter for Made In Brunel",
			  template: "{avatar}{join}{text}{time}"
			});
		});
	</script>
	<!-- google analytics -->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-26923120-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>

	<?php //include('./wp-content/themes/mib/_includes/twitter-rss.php'); ?>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body>
	<!-- facebook sdk loading -->
	<!-- appid for mib = 114148701984867 -->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=114148701984867";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- facebook sdk loading END -->
<!--<#?php $id = $wp_query->post->ID; ?>-->

	<!-- Top Container Start-->
	<div id="container">
		<!-- Header Start -->
		<div id="header">
			<a id="logo" href="/"><img src="/wp-content/themes/mib/_images/site_header-logo.gif" alt="Made in Brunel" title="Made in Brunel"/></a>
			<!-- 
				
				Until next year!
				
			<div id="event-details">
				<h2>9-12 <span class="highlight">June 2011</span></h2>
				<h3>Bargehouse, London SE1</h3>
				
				<div id="register-now">
					<a href="/register/"><span>Register &raquo;</span></a>
				</div>
				
			</div>
			-->
			<div id="top-nav">
            	<ul>
                  	<?php wp_list_pages(array('title_li' => '', 'depth' => 1, 'exclude' => 28)); ?> 
                </ul>                
			</div>
		</div>
		<!-- Header End -->
		<div class="clear"></div>