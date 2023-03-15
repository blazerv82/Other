/*//////////////////////////////////
Basic clock in 24hr format

Created by Teravoltt 2017+

Changelog:
11/8/2012 - Cleaned up code
12/12/2012 - Refined information comment, 
	changed file name from "colorchange" to "clock"
12.4.2017 - Added leading zero function and related additonal code
12.5.2017 - Changed top part of comment to better reflect updated names/desc

//////////////////////////////////*/

function leadingZero (i){
    if (i < 10) {
        i = "0" + i;
    }
    
    return i;
}


function timer(){

	var fulltime = new Date();
	var s = leadingZero(fulltime.getSeconds());
	var m = leadingZero(fulltime.getMinutes());
	var h = leadingZero(fulltime.getHours());

	document.getElementById('realtime').innerHTML = h + "." + m + "." + s;
	
}

setInterval("timer()", 500);