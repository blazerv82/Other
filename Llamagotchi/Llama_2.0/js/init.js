// Setup function
let init = () => {

    const llama_name = document.querySelector("#llama_name");
    const llama_color = document.querySelector("#llama_color");
    const llama_age = document.querySelector("#llama_age");
    const llama_gender = document.querySelector("#llama_gender");

    const llama_hunger_bar = document.querySelector("#llama_hunger_bar");
    const llama_play_bar = document.querySelector("#llama_play_bar");

    const llama_feed_btn = document.querySelector("#llama_feed_btn");
    const llama_play_btn = document.querySelector("#llama_play_btn");

    const llama_name_changer = document.querySelector("#llama_name_changer");
    const llama_color_changer = document.querySelector("#llama_color_changer");
    const llama_age_changer = document.querySelector("#llama_age_changer");
    const llama_gender_changer = document.querySelector("#llama_gender_changer");
    
    llama_name.innerHTML = llama.name;
    llama_color.innerHTML = llama.color;
    llama_age.innerHTML = llama.age;
    llama_gender.innerHTML = llama.gender;
    
    llama_hunger_bar.innerHTML = llama.doHunger(llama);
    llama_play_bar.innerHTML = llama.doPlay(llama);

    // Does functions upon click of button
    llama_feed_btn.addEventListener("click", function() { feed(llama) } );
    llama_play_btn.addEventListener("click", function() { play(llama) } );

    // Listens for changes in input fields and outputs values to webpage
    llama_name_changer.addEventListener("keyup", function() { changeValue(this, llama); } );
    llama_color_changer.addEventListener("keyup", function() { changeValue(this, llama); } );
    llama_age_changer.addEventListener("keyup", function() { changeValue(this, llama); } );
    llama_gender_changer.addEventListener("keyup", function() { changeValue(this, llama); } );

}

// Do things upon loading of webpage
window.addEventListener("load", init);