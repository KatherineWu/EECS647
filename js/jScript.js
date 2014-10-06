var animations = ['animated', 'animated-right'];
var i = 0;
$(window).scroll(function() {
    $elem = $('.hidden:first');
    var imagePos = $elem.offset().top;
    var topOfWindow = $(window).scrollTop();
    if (imagePos < topOfWindow + 600) {
        var animationClass = animations[i % 2 == 0 ? 1 : 0];
        $elem.removeClass("hidden")
             .addClass(animationClass);
        i++;
    }
});

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	  if (target.length) {
		$('html,body').animate({
		  scrollTop: target.offset().top
		}, 1000);
		return false;
	  }
	}
  });
});