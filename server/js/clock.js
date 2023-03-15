/*//////////////////////////////////
Basic clock in 24 hour format,
with no leading zero in seconds
place (when needed)

Created by BV82/Snake 2011

Changelog:
11/8/2012 - Cleaned up code
12/12/2012 - Refined information comment, changed file name from "colorchange" to "clock"
19.5.2015 - Changed source location of file to new website, updated ID as needed // added leading zeros to seconds/minutes

//////////////////////////////////*/


let time = () => {

	var fulltime = new Date();
	var s = fulltime.getSeconds();
		if (s < 10){
			s = "0" + s;
		}
	var m = fulltime.getMinutes();
		if (m < 10){
			m = "0" + m;
		}
	var h = fulltime.getHours();

	document.querySelector('#time').innerHTML = h + "." + m + "." + s;
	
}

setInterval(time, 1000);