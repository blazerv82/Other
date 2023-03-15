//ABD V2
//BV82 2012+
var colors = new Array();

colors[0] = "#BB9900"; //white
colors[1] = "#CCFFAA"; //red
colors[2] = "#AA1632"; //green 
colors[3] = "#ABCDF1"; //blue

var ssize = new Array(); //brush size in pixels

ssize[0] = "2";
ssize[1] = "3";
ssize[2] = "4";
ssize[3] = "5";
ssize[4] = "6";
ssize[5] = "7";

var icolor = -1;
var isize = -1;
var sw = 0;
var sc = 0;

function brushsize(){
  isize++;  
  sw =  isize;
  if (isize == 5){
    isize = -1;}
    return sw;
}
    
function brushcolor(){
  icolor++;
 sc = colors[icolor];
  if (icolor == 3){
    icolor = -1;}
    return sc;
}