  color[] allcolor = new color[6];
  allcolor[1] = color(#000000); //black
  allcolor[2] = color(#FF0000); //red
  allcolor[3] = color(#00FF00); //green
  allcolor[4] = color(#0000FF); //blue
  allcolor[5] = color(#A5008C); // 
  allcolor[6] = color(#FFFF00);
  
  int[] strokesize = new int[4];
  strokesize[1] = 2;
  strokesize[2] = 3;
  strokesize[3] = 4;
  strokesize[4] = 5;
  
  int icolor = 1;
  int isize = 1;

void setup(){
  size (window.innerWidth - 150, window.innerHeight - 50);
  background (#000000);
  stroke (#FFFFFF);
  strokeWeight(2);
//  alert("Welcome to Aurora Borealis Draw v1!");
}
  
void draw(){
if (mousePressed){
    line (mouseX, mouseY, pmouseX, pmouseY);}
}

//begin JS Code stuff

function brushsize(){
  isize++;
  strokeWeight(strokesize[isize]);
  if (isize == 5){
    isize = 1;}}
    
function brushcolor(){
  icolor++;
  stroke(allcolor[icolor]);
  if (icolor == 7){
    icolor = 1;}}
