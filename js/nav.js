var nav = document.getElementsByTagName("nav")[0];
window.onscroll = function(){
	if(window.scrollY > 150){
		nav.classList.add("hasBackground");
	} else {
		nav.classList.remove("hasBackground");
	}
};


