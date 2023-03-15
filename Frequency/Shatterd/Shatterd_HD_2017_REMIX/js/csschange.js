/*//////////////////////////////////
CSS changer
used to rotate everything
also for theme changes

Created by BV82/Snake 2012

Changelog:
12/12/2012 - Cleaned up code
	added information comment
	
//////////////////////////////////*/


function detectWidth(){

	if (innerWidth <= 1300){
	
		document.getElementById('css').href = "css/mobile.css";
		document.getElementById('blog').style.display = "none";
	}

	else if (innerWidth > 1300){
		
		document.getElementById('css').href = "css/desktop.css";
		document.getElementById('blog').style.display = "inline";
	}

}