boolean heldkey = false;


void setup(){
  size (window.innerWidth - 150, window.innerHeight - 100);
  background (#000000);
  
  //Buttons maybe
font = loadFont("Arial.ttf");
textFont(font);
textSize(20);
text("size (z), color (x), clear (c)", 10, 25);
}
  
void draw(){
if (mousePressed){
    line (mouseX, mouseY, pmouseX, pmouseY);}}

void keyPressed(){
  if (key === 'x' || key === 'X'){
  if (!heldkey){
  brushcolor();
  stroke(sc);
  heldkey = true;}

}
if (key == 'Z' || key == 'z'){
  if (!heldkey){
  brushsize();
strokeWeight(sw);
heldkey = true;}
}

}


void keyReleased(){
  if (key == 'Z' || key == 'z'){
  heldkey = false;}
  
  if (key == 'x' || key == 'X'){
  heldkey = false;}
}
