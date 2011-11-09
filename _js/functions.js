function changePhoto(numitems){
		
	//choose a random item to change
	var randitem = Math.floor(Math.random()*numitems-1);
	
	//add the new image to the photo div. It will remain behind the existing image for now
		$("#flickr-panel #photo_" + randitem).prepend("<img src="+ images[pointer] +" />");
		
		$("#flickr-panel #photo_" + randitem + " img:first-child").load(function(){
		
		//fade the new image in (sloooowly)
		$("#flickr-panel #photo_" + randitem + " img:first-child").hide().fadeIn(1500);
		
			//fade out the old image (last-child). This will reveal the new image behind it
			$("#flickr-panel #photo_" + randitem + " img:last-child").fadeOut(1000, function(){
			
				//once done, remove the old image...
				$(this).remove();
			
			});
		
		});
		
		//increment the pointer by 1, or reset it if we've reached the end of the array
		if(pointer < images.length)		pointer++;
		else	pointer = 0;
		
	//set this function to run again at a randomly set interval between .5 and 2.5 seconds
	randtime = 1500*Math.random() + 150;
	setTimeout("changePhoto(" + numitems + ")", randtime);
	
}