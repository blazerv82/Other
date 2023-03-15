/*
    LLAMA

    Contains all info about said llama, 
    and various functions for feeding and playing

    LAST UPDATED: 10.2.2019
*/


// Basic options
const NAME = "TestLlama V5";
const COLOR = "Purple";
const AGE = 5;
const GENDER = "Male";

// Llama Object
let llama = {
    name: NAME,
    color: COLOR,
    age: AGE,
    gender: GENDER,

    hunger: 100,
    play: 100,

    // Output info about Llama
    getDescription: (llama) => {
        return "<hr>Age - " + llama.age 
                + "<br>Color - " + llama.color
                + "<br>Gender - " + llama.gender ;
    },

    // Output hunger info
    doHunger: (llama) => {

        if (llama.hunger >= 70) { llama_hunger_bar.style.backgroundColor = "rgb(0, 230, 0)"; }

        else if (llama.hunger < 75 && llama.hunger >= 30) { 
            llama_hunger_bar.style.backgroundColor = "rgb(230, 230, 0)"; 
        }

        else { llama_hunger_bar.style.backgroundColor = "rgb(230, 0, 0)"; }

        return llama.hunger + "%";
    },

    // Output happiness info
    doPlay: (llama) => {

        if (llama.play >= 70) { llama_play_bar.style.backgroundColor = "rgb(0, 230, 0)"; }

        else if (llama.play < 75 && llama.play >= 30) { 
            llama_play_bar.style.backgroundColor = "rgb(230, 230, 0)"; 
        }

        else { llama_play_bar.style.backgroundColor = "rgb(230, 0, 0)"; }

        return llama.play + "%";   
    }
}

// Feed Llama
const feed = (llama) => {

    llama.hunger += 10;

    if (llama.hunger >= 100) { llama.hunger = 100; }

    llama_hunger_bar.innerHTML = llama.doHunger(llama);
    llama_hunger_bar.style.width = llama.hunger + "%";
}

// PLay w/ Llama
const play = (llama) => {

    llama.play += 10;

    if (llama.play >= 100) { llama.play = 100; }

    llama_play_bar.innerHTML = llama.doPlay(llama);
    llama_play_bar.style.width = llama.play + "%";
}

// Hunger meter
setInterval( () => { 

    llama.hunger -= 5; 

    if (llama.hunger < 10) { llama.hunger = 10; }
    
    // Outputs how much percent
    llama_hunger_bar.innerHTML = llama.doHunger(llama);

    // Changes width of bar
    llama_hunger_bar.style.width = llama.hunger + "%";

}, 3500);

// Happiness meter
setInterval( () => { 

    llama.play -= 5; 

    if (llama.play < 10) { llama.play = 10; }

    // Outputs how much percent
    llama_play_bar.innerHTML = llama.doPlay(llama);

    // Changes width of bar
    llama_play_bar.style.width = llama.play + "%";

}, 2000);