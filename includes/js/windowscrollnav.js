window.onscroll = function() {scrollFunction();};

function scrollFunction() {
if (screen.width <= 600) { 
  	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("topnav").style.position = "fixed";
    document.getElementById("topnav").style.background = "black";
    document.getElementById("topnav").style.top = "0px";
	document.getElementById("topnav").style.mixBlendMode = "normal";
	} else {
	    document.getElementById("topnav").style.position = "absolute";
	    document.getElementById("topnav").style.background = "var(--flamboya-darkgrey)";
	    document.getElementById("topnav").style.top = "auto";
		document.getElementById("topnav").style.mixBlendMode = "multiply";
	  }
}
else
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("topnav").style.height = "70px";
    document.getElementById("topnav").style.position = "fixed";
    document.getElementById("topnav").style.background = "black";
    document.getElementById("topnav-logo").style.height = "130%";
    document.getElementById("main-menu").style.paddingTop = "10px";
	document.getElementById("topnav").style.mixBlendMode = "normal";
	} else {
	    document.getElementById("topnav").style.position = "absolute";
	    document.getElementById("topnav").style.background = "var(--flamboya-darkgrey)";
	    document.getElementById("topnav").style.height = "148px";
	    document.getElementById("topnav-logo").style.height = "148px";
	    document.getElementById("main-menu").style.paddingTop = "81px";
		document.getElementById("topnav").style.mixBlendMode = "multiply";
	  }
}