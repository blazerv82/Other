/*
    Contains all info about said llama, and various functions for feeding and playing

    // CHANGELOG 10.16.2019
    ///////////////////////

    ADDED ///

    CHANGED All value change functions into single function [Name, Color, Age, Gender => changeValue]
    
    REMOVED Name, Age, Color, Gender Functions

    ////////////////////////
    // CHANGELOG 10.16.2019
*/


// Basic options
const NAME = "Llamagotchi 2.0";
const COLOR = "Color";
const AGE = "Age";
const GENDER = "Gender";

// Llama Object
let llama = {
    name: NAME,
    color: COLOR,
    age: AGE,
    gender: GENDER,

    hunger: 100,
    play: 100,

    // Output hunger info
    doHunger: (llama) => {

        if (llama.hunger >= 70) { llama_hunger_bar.style.backgroundColor = "rgb(0, 230, 0)"; }

        else if (llama.hunger < 75 && llama.hunger >= 30) { 
            llama_hunger_bar.style.backgroundColor = "rgb(230, 230, 0)"; 
        }

        else { llama_hunger_bar.style.backgroundColor = "rgb(230, 0, 0)"; }

        return "&nbsp;" + llama.hunger + "%";
    },

    // Output happiness info
    doPlay: (llama) => {

        if (llama.play >= 70) { llama_play_bar.style.backgroundColor = "rgb(0, 230, 0)"; }

        else if (llama.play < 75 && llama.play >= 30) { 
            llama_play_bar.style.backgroundColor = "rgb(230, 230, 0)"; 
        }

        else { llama_play_bar.style.backgroundColor = "rgb(230, 0, 0)"; }

        return "&nbsp;" + llama.play + "%";   
    }
}

// Changes values per user input
const changeValue = (newVal, llama) => {

    let newValToSwitch = newVal.value;

    switch (newVal.id) {
        case "llama_name_changer":
            let newName = newValToSwitch;
            if (newName.length == 0) { newName = "Narwhal"; }
            llama.name = newName;
            llama_name.innerHTML = llama.name;
            break;
        case "llama_color_changer":
            let newColor = newValToSwitch;
            if (newColor.length == 0) { newColor = "Rainbow"; }
            llama.color = newColor;
            llama_color.innerHTML = llama.color;
            break;
        case "llama_age_changer":
            let newAge = newValToSwitch;
            if (newAge.length == 0) { newAge = "Narwhal"; }
            llama.age = newAge;
            llama_age.innerHTML = llama.age;
            break;
        case "llama_gender_changer":
            let newGender = newValToSwitch;
            if (newGender.length == 0) { newGender = "Rainbow"; }
            llama.gender = newGender;
            llama_gender.innerHTML = llama.gender;
            break;
        default:
            console.error("Sorry, but nothing was found.");
            break;
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