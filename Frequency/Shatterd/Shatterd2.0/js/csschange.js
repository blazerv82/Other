/*//////////////////////////////////
CSS changer
used to rotate everything
also for theme changes

Created by BV82/Snake 2012

Changelog:
12/12/2012 - Cleaned up code
	added information comment
	
//////////////////////////////////*/

isRotate = false;
isDark = false;

function Rotate(){
	
	if (isRotate == true){
	
		isRotate = false;
		document.getElementById('css2').href = "css/oldcss.css";
	}
	
	else{
		
		isRotate = true;
		document.getElementById('css2').href = "css/newcss.css";
	}
	
}


function detectWidth(){

	if (innerWidth <= 1300){
	
		document.getElementById('css').href = "css/downloads.css";
		document.getElementById('blog').style.display = "none";
	}

	else if (innerWidth > 1300){
		
		document.getElementById('css').href = "css/default.css";
		document.getElementById('blog').style.display = "inline";
	}

}