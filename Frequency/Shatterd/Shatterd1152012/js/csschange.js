isRotate = false;
isDark = false;

function Rotate(){
if (isRotate == true){
isRotate = false;
document.getElementById('css2').href = "css/oldcss.css";}
else{
isRotate = true;
document.getElementById('css2').href = "css/newcss.css";}
}


function themeChange(){

if (isDark == true){
isDark = false;
document.getElementById('css').href = "css/shatterddefault.css";}
else{
isDark = true;
document.getElementById('css').href = "css/shatterdday.css";}
}