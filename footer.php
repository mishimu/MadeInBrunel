<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel 2011
 */
?>
<div id="footer-container">
		<div id="footer">
			<div class="col-245" id="copyrights">
				
				<ul>
				
					<li><a href="/"><img class="footer-logo" src="/wp-content/themes/mib/_images/site_mib_footer_logo.gif" alt="Made in Brunel logo" border="0" /></a></li>

					<li><a href="http://www.brunel.ac.uk" target="_blank"><img class="footer-logo" src="/wp-content/themes/mib/_images/site_brunel_footer_logo.png" alt="Brunel University" /></a></li>
				
					<li><a href="http://www.coinstreet.org" target="_blank"><img class="footer-logo" src="/wp-content/themes/mib/_images/site_bargehouse_footer_logo.png" alt="Bargehouse" /></a></li>
				</ul>				
				<p>&copy; Made in Brunel, <?php echo date('Y'); ?></p>
			</div>
			<div class="col-245" id="quicklinks">
				<h2>Navigation</h2>
					<ul>
                    	<li class="page_item page-item-17"><a href="/" title="Home">Home</a></li> 
						<li class="page_item page-item-2"><a href="/show-and-events/" title="Show and Events">Show and Events</a> 
							<ul class='children'> 
								<li class="page_item page-item-173"><a href="/show-and-events/pecha-kucha/" title="Pecha Kucha">Pecha Kucha</a></li> 
								<li class="page_item page-item-172"><a href="/show-and-events/8-brand-visions/" title="8 Brand Visions">8 Brand Visions</a></li> 
							</ul> 
						</li> 
						<li class="page_item page-item-309"><a href="/news/" title="News">News</a></li> 
						<li class="page_item page-item-5"><a href="/people/" title="Projects">People</a></li> 
						<li class="page_item page-item-317"><a href="/projects/" title="Projects">Projects</a></li> 
						<li class="page_item page-item-7"><a href="/history/" title="History">History</a></li> 
						<li class="page_item page-item-9"><a href="/contact/" title="Contact">Contact</a> 
						<ul class='children'> 
							<li class="page_item page-item-49"><a href="/contact/terms-and-conditions/" title="Terms and Conditions">Terms and Conditions</a></li> 
							<li class="page_item page-item-51"><a href="/contact/privacy-policy/" title="Privacy Policy">Privacy Policy</a></li> 
						</ul> 
						</li> 
						<li class="page_item page-item-294"><a href="/register/" title="Register" rel="nofollow">Register</a></li> 
                    </ul>
				<ul>
					<li><a href="http://www.facebook.com/pages/Made-in-Brunel/114148701984867" target="_blank">Facebook</a></li>
					<li><a href="http://twitter.com/madeinbrunel11" target="_blank">Twitter</a></li>
					<li><a href="http://www.flickr.com/groups/1523106@N25" target="_blank">Flickr</a></li>
					<li><a href="http://www.linkedin.com/groups?gid=1946398&mostPopular=&trk=tyah" target="_blank">LinkedIn</a></li>
					<li><a href="/feed/" target="_blank">RSS Feed</a></li>
					<li><a href="/sitemap.xml" target="_blank">Sitemap</a></li>
				</ul>
			</div>
			<div class="col-245" id="sponsors">
				<h2>Sponsors</h2>
				<p>Made in Brunel is proud to be sponsored by:</p>
				<ul>
					<li><img src="/wp-content/themes/mib/_images/site_footer-autodesk.png" alt="Autodesk logo" /></li>
					<li><img src="/wp-content/themes/mib/_images/site_footer-cocacola.png" alt="Coca-Cola logo" /></li>
					<li><img src="/wp-content/themes/mib/_images/site_footer-lg.png" alt="LG Electronics logo" /></li>
				</ul>
			</div>
			<div id="twitter">
				<h2><a href="http://twitter.com/madeinbrunel11" target="_blank">@madeinbrunel</a></h2>
				<ul id="feed">
				<?php 
				//call the tweets from the Twitter RSS feed
				
				//the first variable passed is the username, the second is number of tweets to show 
				if($tweets = loadTwitterRSS("madeinbrunel11", 4)){
					foreach ($tweets as $k => $v) {
				}
				?>
				<li id="tweet-<?php echo $k; ?>" class="tweet"><?php echo $v['desc'];?>
				<br /><span class="tweetdate"><?php echo $v['date']; ?></span></li>
				<?php
				}
				?>
				</ul>
			</div>
		</div>
	</div>
	<!-- Footer End -->
	<script type="text/javascript"> Cufon.now(); </script>
    <?php wp_footer();?>
    
    <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-21881945-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
    
</body>
</html>