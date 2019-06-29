window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (screen.width <= 600) { 
  	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("topnav").style.position = "fixed";
    document.getElementById("topnav").style.background = "white";
    document.getElementById("topnav").style.top = "0px";
	} else {
	    document.getElementById("topnav").style.position = "absolute";
	    document.getElementById("topnav").style.background = "var(--flamboya-white)";
	    document.getElementById("topnav").style.top = "auto";
	  }
}
else
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("topnav").style.height = "70px";
    document.getElementById("topnav").style.position = "fixed";
    document.getElementById("topnav").style.background = "white";
    document.getElementById("topnav-logo").style.height = "130%";
    document.getElementById("main-menu").style.padding = "10px 0px";

	} else {
	    document.getElementById("topnav").style.position = "absolute";
	    document.getElementById("topnav").style.background = "var(--flamboya-white)";
	    document.getElementById("topnav").style.height = "148px";
	    document.getElementById("topnav-logo").style.height = "148px";
	    document.getElementById("main-menu").style.padding = "81px 0px";
	  }
} 