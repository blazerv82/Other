/*
    LLAMA

    Contains all info about said llama, and various functions for feeding and playing
*/

// Basic options
let NAME = "TestLlama 2";
let COLOR = "Purple";
let AGE = 5;

// Gender options
let GENDER = "Male";
let P_SINGLE = "he";
let P_MULTI = "him";

// Llama Object
var llama = {
    name: NAME,
    color: COLOR,
    age: AGE,

    gender: GENDER,
    pronoun_single: P_SINGLE,
    pronoun_multi: P_MULTI,

    hunger: 100,
    happiness: 100,


    getDescription: function(){
        return "Gender - " + this.gender 
                + "<br>Age - " + this.age 
                + "<br>Color - " + this.color;
    },

    getHunger: function(){
        if (this.hunger >= 70) {
           
            document.getElementById("llama_hunger_bar").style.backgroundColor = "rgb(0, 200, 0)";
            
            return this.hunger + "%<br>" + this.name + " looks well fed!";
        }

        else if (this.hunger < 75 && this.hunger >= 30) {
            document.getElementById("llama_hunger_bar").style.backgroundColor = "rgb(200, 200, 0)";

            return this.hunger + "%<br>" + this.name + " looks content.";
        }

        else {
            document.getElementById("llama_hunger_bar").style.backgroundColor = "rgb(200, 0, 0)";
            
            return this.hunger + "%<br>You should feed " + this.name + "!";
        }
    },

    getHappiness: function() {
        if (this.happiness >= 75) {
            document.getElementById("llama_happiness_bar").style.backgroundColor = "rgb(0, 200, 0)";

            return this.happiness + "%<br>" + this.name + " looks really happy and is bouncing about!";
        }

        else if (this.happiness < 75 && this.happiness >= 30) {
            document.getElementById("llama_happiness_bar").style.backgroundColor = "rgb(200, 200, 0)";

            return this.happiness + "%<br>" + this.name + " looks content.";
        }

        else {
            document.getElementById("llama_happiness_bar").style.backgroundColor = "rgb(200, 0, 0)";

            return this.happiness + "%<br>" + this.name + " looks lethargic and sad.";
        }
    }
}

// Feed Llama
function feed(){
    llama.hunger += 10;

    if (llama.hunger >= 100) {
        llama.hunger = 100;
    }

    document.getElementById("llama_hunger").innerHTML = llama.getHunger();
    document.getElementById("llama_hunger_bar").style.width = llama.hunger + "%";
}

// PLay w/ Llama
function play(){
    llama.happiness += 10;

    if (llama.happiness >= 100) {
        llama.happiness = 100;
    }

    document.getElementById("llama_happiness").innerHTML = llama.getHappiness()
    document.getElementById("llama_happiness_bar").style.width = llama.happiness + "%";
}

// Hunger meter
setInterval(function() { 
    llama.hunger -= 5; 

    if (llama.hunger < 0) {
        llama.hunger = 0;
    }
    
    document.getElementById("llama_hunger").innerHTML = llama.getHunger();
    document.getElementById("llama_hunger_bar").style.width = llama.hunger + "%";

}, 3500);

// Happiness meter
setInterval(function() { 
    llama.happiness -= 5; 

    if (llama.happiness < 0) {
        llama.happiness = 0;
    }

    document.getElementById("llama_happiness").innerHTML = llama.getHappiness();
    document.getElementById("llama_happiness_bar").style.width = llama.happiness + "%";

}, 2000);



