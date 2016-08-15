var scrollElements = document.querySelectorAll('[data-scroll]');
var scrollPosition;

for(var i=0;i<scrollElements.length;i++){
	scrollElements[i].addEventListener('click', function(element) {
		var scrollToElementName = element.target.dataset.scroll;
		var scrollToElement = document.querySelector('#' + scrollToElementName);
		scrollTo(scrollToElement.offsetTop, 800);
	});
}

function scrollTo(to, duration) {
    if (duration <= 0) {
    	// When the duration is on the end, stop here!
    	return;
    }
    var scrollTop = document.body.scrollTop + document.documentElement.scrollTop;
    var difference = (to - scrollTop) - 69;
    var perTick = difference / duration * 5;

    setTimeout(function() {
      scrollTop = scrollTop + perTick;
      document.body.scrollTop = scrollTop;
      document.documentElement.scrollTop = scrollTop;
      if (scrollTop === to) {
      	return;
      }
      scrollTo(to, duration - 5);
    }, 5);
}