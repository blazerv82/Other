/*
    LLAMA

    Contains all info about said llama, 
    and various functions for feeding and playing

    LAST UPDATED: 7.31.2019
*/

// Basic options
let NAME = "TestLlama V5";
let COLOR = "Purple";
let AGE = 5;
let GENDER = "Male";


// Llama Object
let llama = {
    name: NAME,
    color: COLOR,
    age: AGE,
    gender: GENDER,

    hunger: 100,
    happiness: 100,

    // Output info about Llama
    getDescription: function(){
        return "<hr>Age - " + this.age 
                + "<br>Color - " + this.color
                + "<br>Gender - " + this.gender ;
    },

    // Output hunger info
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

    // Output happiness info
    getHappiness: function() {
        if (this.happiness >= 75) {
            document.getElementById("llama_happiness_bar").style.backgroundColor = "rgb(0, 200, 0)";

            return this.happiness + "%<br>" + this.name + " looks really happy!";
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

// // Hunger meter
// setInterval(function() { 
//     llama.hunger -= 5; 

//     if (llama.hunger < 0) {
//         llama.hunger = 0;
//     }
    
//     document.getElementById("llama_hunger").innerHTML = llama.getHunger();
//     document.getElementById("llama_hunger_bar").style.width = llama.hunger + "%";

// }, 3500);

// // Happiness meter
// setInterval(function() { 
//     llama.happiness -= 5; 

//     if (llama.happiness < 0) {
//         llama.happiness = 0;
//     }

//     document.getElementById("llama_happiness").innerHTML = llama.getHappiness();
//     document.getElementById("llama_happiness_bar").style.width = llama.happiness + "%";

// }, 2000);