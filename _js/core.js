/**
 * Core JavaScript
 *
 * 
 *
 */

$(function(){
	
	/* - Cufon Font Replacement - */
	
	//Fedra
	Cufon.replace('#event-details h2, #event-details h3, .main h1, .main h2, .main h3, .main h3 a, .main h4, .main h4 a, .main h5, .main h5 a', { fontFamily: 'FedraSerifPro B' });
	
	//Frutiger
	Cufon.replace('#top-nav a, #footer h2, form#commentform label, form.wpcf7-form label, div.wpcf7-mail-sent-ok, li.comment cite.fn, li.comment span.says, li.comment div.comment-meta a', { fontFamily: 'Frutiger LT Std', hover: true});
	Cufon.replace('#sub1');
	
	
	/* 	Home page slideshow */
	
	$("#home-slideshow #slides").cycle({
			prev:   '#prev-slide', 
	    	next:   '#next-slide',
	    	pager:	'#slideshow-pager ul',
	    	pagerAnchorBuilder: function(idx, slide) { 
       			return '<li id=slide-pager-"' + (idx + 1) + '"></li>'; 
   			}, 
	    	speed: 750,
	    	slideExpr: 'img',
	    	pause: 1
	});
	
	$("#home-slideshow").hover(
		function(){
			$("#home-slideshow #slideshow-pager").stop().animate({opacity: 1}, 250);
			$("#home-slideshow #prev-slide").stop().animate({left: 30, opacity: 1}, 250);
			$("#home-slideshow #next-slide").stop().animate({right: 30, opacity: 1}, 250);
		},
		function(){
			$("#home-slideshow #slideshow-pager").stop().animate({opacity: 0.7}, 250);
			$("#home-slideshow #prev-slide").stop().animate({left: -10, opacity: 0}, 250);
			$("#home-slideshow #next-slide").stop().animate({right: -10, opacity: 0}, 250);
		}
	);
	
	
	/* - Home Page Flickr Banner Start -
	
	//count the number of images initially loaded into the page
	var numitems = $("#flickr-panel .image").size();
	
	//when an image in the flickr panel has downloaded
	$("#flickr-panel .image img").load(function(){
		$(this).fadeIn(1000).show();	
	});
	setTimeout("changePhoto(" + numitems + ")", 2000);
		
	- Home Page Flickr Banner End - */
	
	
	//exhibitors page overlay
	$(".exhibitor a[rel]").overlay({

		onBeforeLoad: function() {
			// grab wrapper element inside content
			var wrap = this.getOverlay().find(".contentWrap");
			var img = this.getOverlay().find(".contentWrap img");
						
			html = "<img src=\"" + this.getTrigger().attr("href") + "\" />";
			

			// load the page specified in the trigger
			wrap.html(html);
			
			
		}

	});

});