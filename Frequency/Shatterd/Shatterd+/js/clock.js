/*//////////////////////////////////
Basic clock in 24 hour format,
with no leading zero in seconds
place (when needed)

Created by BV82/Snake 2011

Changelog:
11/8/2012 - Cleaned up code
12/12/2012 - Refined information comment, 
	changed file name from "colorchange" to "clock"

//////////////////////////////////*/


function timer(){

	var fulltime = new Date();
	var s = fulltime.getSeconds();
	var m = fulltime.getMinutes();
	var h = fulltime.getHours();

	document.getElementById('realtime').innerHTML = h + "." + m + "." + s;
	
}

	setInterval("timer()", 500);