int colorArray = new int[5];

colorArray[0] = #000000; //black
colorArray[1] = #FFFFFF; //white
colorArray[2] = #FF0000; //red
colorArray[3] = #00FF00; //green 
colorArray[4] = #0000FF; //blue

boolean heldkey = false;

// Counting
int icolor = 0;
int sc;


background (#AAAAAA);
stroke (#000000);
strokeWeight(5);

void setup(){
    
    size (window.innerWidth*.75, window.innerHeight*.75);
    
    document.getElementById('color_Info').innerHTML = "Color Selected: Black";
    document.getElementById('size_Info').innerHTML = "Brush Size: 5";
}
  
void draw(){
if (mousePressed){
    line (mouseX, mouseY, pmouseX, pmouseY);
    }
}

void keyPressed(){
	if (key == 'x'){
		if (!heldkey){
            icolor++;
            sc = colorArray[icolor];
            	if (icolor >= 4){
				icolor = -1;
			}
            brushColor();
            stroke(sc);
			heldkey = true;
		}
	}

    if (key == 'z'){
        if (!heldkey){
            brushSize();
            strokeWeight(sw);
            heldkey = true;
        }
    }
    
    if (key == 'c'){
        if (!heldkey){
            background (#AAAAAA);
            heldkey = true;
        }
    }

}


void keyReleased(){
  if (key == 'z'){
  heldkey = false;}
  
  if (key == 'x' || key == 'X'){
  heldkey = false;
  }
    
  if (key == 'c' || key == 'C'){
  heldkey = false;
  }
}


