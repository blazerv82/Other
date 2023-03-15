//Basic News Ticker
//By BV82/AL

var txt = new Array();

//Begin array that holds text
txt[1] = "Hold on, it's gonna be a wild ride!";
txt[2] = "I'm Batman"
txt[3] = "Theives and Hypocrites"
txt[4] = "You say \"Hello\", I say \"Leave me alone stalker!\"";
txt[5] = "If you had to choose between the right or wrong path, would you go left?";
txt[6] = "i question humanity";
txt[7] = "do you know why?";
txt[8] = "sound barrier? ha! i'm better than that!";
txt[9] = "Caution! Pointy edges are sharp!";
txt[10] = "[insert witty and funny statement here]";
txt[11] = "seventyeleven"
txt[12] = "oOo"
txt[13] = ":D"
txt[14] = "Brace yourselves."
txt[15] = "Shatterd: Picking up the pieces lost in the whirlwind"

function ticker(){
var change = false;
var i = Math.round(Math.random() * 14+ 1);
change = true;

if (change == true){
document.getElementById("ticker").innerHTML = txt[i];
	
}
}


setInterval("ticker()", 30000);