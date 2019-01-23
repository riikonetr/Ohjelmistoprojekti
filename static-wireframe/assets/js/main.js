$(function() {

	// Cache the Window object
	var $window = $(window);

	// Parallax Backgrounds
	// Tutorial: http://code.tutsplus.com/tutorials/a-simple-parallax-scrolling-technique--net-27641

	$('section[data-type="background"]').each(function(){
		var $bgobj = $(this); // assigning the object

		$(window).scroll(function() {

			// Scroll the background at var speed
			// the yPos is a negative value because we're scrolling it UP!
			var yPos = -($window.scrollTop() / $bgobj.data('speed'));

			// Put together our final background position
			var coords = '50% '+ yPos + 'px';

			// Move the background
			$bgobj.css({ backgroundPosition: coords });

		}); // end window scroll
	});

});

/*#####################
Additional jQuery (required)
#####################*/
$(document).ready(function(){

	var clickEvent = false;
	$('#carouselExampleControls').carousel({
		interval:   4000
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');
			console.log("click!")
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
})
$(window).load(function() {
    var boxheight = $('#carouselExampleControls .carousel-inner').innerHeight();
    var itemlength = $('#carouselExampleControls .carousel-item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#carouselExampleControls .list-group-item').outerHeight(triggerheight);
});
