//BG changer
//BV82 2012


function timer(){

var fulltime = new Date();
var s = fulltime.getSeconds();
var m = fulltime.getMinutes();
var h = fulltime.getHours();
var day = "css/shatterdday.css";
var night = "css/shatterddefault.css";

document.getElementById('realtime').innerHTML = h + "." + m + "." + s;
t = setTimeout(function(){timer()}, 500);



}

