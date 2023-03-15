boolean heldkey = false;
color red = color(#FF0000);


void setup(){
  size (window.innerWidth-20, window.innerHeight-20);
  background (#AAAAAA);
  
  text("z for size", 10, 20);
}
  
void draw(){
if (mousePressed){
    line (mouseX, mouseY, pmouseX, pmouseY);}
}

void keyPressed(){
	if (key === 'x' || key === 'X'){
		
		if (!heldkey){
			brushcolor();
			//stroke(brushcolor());
			heldkey = true;
		}
	}

if (key === 'Z' || key === 'z'){
  if (!heldkey){
  brushsize();
strokeWeight(sw);
heldkey = true;}
}

}


void keyReleased(){
  if (key === 'Z' || key === 'z'){
  heldkey = false;}
  
  if (key === 'x' || key === 'X'){
  heldkey = false;
  }
}
