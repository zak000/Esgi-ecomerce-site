
$(function (){
	var ep_width = 682;
	var ep_height = 315;
	var ep_border_size = 10;
	var ep_border_color = '#425412';
	
	var ep_slide_imgs = ['wp-content/plugins/Plugin/slideshow/images/dubai_ruins_by_jenovah_art-d1x0g24.jpg',
	                     'wp-content/plugins/Plugin/slideshow/images/Sci-Fi-Post-Apocalyptic-65989.jpg',
	                     'wp-content/plugins/Plugin/slideshow/images/taipei_ruins_by_jenovah_art-d31tl80.jpg',
	                     'wp-content/plugins/Plugin/slideshow/images/Simon_Weaner_01.png',
	                     'wp-content/plugins/Plugin/slideshow/images/The_Last_of_Us_CG_Art_Jungle_in_City_Wallpaper.png'];

	$('.ep_slideshow').append('<div class="ep_slides"></div>');
	//$('.ep_slideshow').append('<div class="ep_pag"></div>');
	//$('.ep_pag').css('margin-top','10px').append('<img src="public/img/arrow-l.png" alt="Précédent" />');
	var i = 0;
	
	$.each(ep_slide_imgs, function(key,val) {
	 $('.ep_slideshow .ep_slides').append('<a href="#"><img src="'+val+'" alt="" /></a>');
	// $('.ep_slideshow .ep_pag').append('<div onclick="ep_goto('+ ++i +');"  class="ep_circle"></div>');
	});
	
	
	//$('.ep_pag').css('margin-top','10px').append('<img src="public/img/arrow-r.png" alt="Suivant" />');
	
	var tabEffects = ['blind','bounce','clip','drop','fold','puff','scale','shake','size','slide'];
	$('.ep_slideshow .ep_slides').css('width',ep_width+'px').css('height',ep_height+'px').css('border',ep_border_size+'px solid '+ep_border_color);
	$('.ep_slideshow .ep_slides img').css('width',ep_width+'px');
	$('.ep_slideshow a').hide().first().addClass('active').show();
	

	setInterval(function(){
		prev = $('.ep_slideshow .active').removeClass('active');
		next = prev.next();
		if(next.length == 0)
			next = $('.ep_slideshow a').first();
		var effect = tabEffects[Math.floor(Math.random()*tabEffects.length)];
		console.log(effect);
		next.addClass('active').show(effect,{},1000);
		prev.delay(1000).fadeOut(800);
	}, 2000);
	
});


