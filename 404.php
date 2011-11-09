<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
get_header(); ?>

	<!-- Main Body Start -->
		<div id="error-404" class="main">
			<h1>Sorry, page not found (404)</h1>
			<!-- Content Start -->
			<div id="content">
				<p>Apologies, the page you requested could not be found.</p>
				<p>To get you back on track <a href="/">click here to return to the home page</a> or use the search below.</p>
				<form action="/" id="searchform" method="get" role="search">
					<div>
						<label for="s" class="screen-reader-text">Search for:</label>
						<input type="text" id="s" name="s" value="">
						<input type="submit" value="Search" id="searchsubmit">
					</div>
				</form>
			</div>
			<!-- Content End -->
		</div>
	<!-- Main Body End -->
</div>
<!-- Top Container End -->

<?php get_footer(); ?>