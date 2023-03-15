//ABD V2
//BV82 2012+
var colorArray = new Array();

colorArray[0] = "Black"; //black
colorArray[1] = "White"; //white
colorArray[2] = "Red"; //red
colorArray[3] = "Green"; //green 
colorArray[4] = "Blue"; //blue

var ssize = new Array(); //brush size in pixels

ssize[0] = "5";
ssize[1] = "10";
ssize[2] = "15";

var icolor = 0;
var isize = 1;
var sw;
var sc;

function brushColor(){
		icolor++;
		sc = colorArray[icolor];
		document.getElementById('color_Info').innerHTML = "Color Selected: " + sc;
			if (icolor >= 4){
				icolor = -1;
			}
}

function brushSize(){
        
        sw = ssize[isize];
        document.getElementById('size_Info').innerHTML = "Brush Size: " + sw;
  
            if (isize >= 2){
                isize = -1;
            }
        isize++; 
}
    
