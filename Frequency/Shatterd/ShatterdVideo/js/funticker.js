/*//////////////////////////////////
News ticker that changes
with random slogans every 30
seconds

Created by BV82/Snake 2011

Changelog:
11/8/2012 - Cleaned up code
12/12/2012 - Changed information comment,
	changed variable names
	changed function ticker to better reflect ability
3/24/13 - Added new things to array
	
//////////////////////////////////*/

var textArray = new Array();

//Begin array that holds text
textArray[1] = "Hold on, it's gonna be a wild ride!";
textArray[2] = "I'm Batman";
textArray[3] = "Theives and Hypocrites";
textArray[4] = "You say \"Hello\", I say \"Leave me alone stalker!\"";
textArray[5] = "If you had to choose between the right or wrong path, would you go left?";
textArray[6] = "i question humanity";
textArray[7] = "do you know why?";
textArray[8] = "sound barrier? ha! i'm better than that!";
textArray[9] = "Caution! Pointy edges are sharp!";
textArray[10] = "[insert witty and funny statement here]";
textArray[11] = "seventyeleven";
textArray[12] = "oOo";
textArray[13] = ":D";
textArray[14] = "Brace yourselves.";
textArray[15] = "Shatterd: Picking up the pieces lost in the whirlwind";
textArray[16] = "I got my violence in high def ultra realism";
textArray[17] = "No, I will not kill them, I will slaughter them.";
textArray[18] = "We are not responsible for any broken thumbs you get while playing";
textArray[19] = "do you feel it kickin' in?";
textArray[20] = "the machine is now alive, to wreck havoc in your lives";
textArray[21] = "there's no use to hold me back, I am ready to attack";
textArray[22] = "Why are we not your homepage?";
textArray[23] = "add \'blazerv82-X\' on PSN";



function ticker(){
	
	var textChange = Math.round(Math.random() * 22 + 1);

	document.getElementById("ticker").innerHTML = textArray[textChange];
	
}

	setInterval("ticker()", 30000);