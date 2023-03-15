/* Main Game JS File

created July 2013
by bv

Last Edited 10.2.2019 (yeah)

File contains most of the game setup and main runtime scripts
*/



 
 const init = () => {	
 
	// var text = document.getElementById("maintext");
	// var row1 = document.getElementById("row1"); 
	// var row2 = document.getElementById("row2"); 

	maintext.value = "Welcome to B.E.T.A.C. version rc0.0.0.1 codename 'Alpha'. Things to note in this version:\nThis is mainly a test to see if everything is working correctly, with buttons to test various things.";
	maintext.value += "\n\nClick on 'newGame' to begin a new game.\n\nOr alternatively, click loadGame to load a game in progress.";
	maintext.disabled = "true";
	row1.innerHTML = "<button onclick=\"newGame()\">newGame</button>";
	row2.innerHTML = "<button onclick=\"loadGame()\">loadGame</button>";
 
 }
 
const newGame = () =>{

	$.get("../textFiles/intro_p1.txt", function(data) {
        maintext.value = data;
    }, "text");

}

// Do things upon loading of webpage
window.addEventListener("load", init);