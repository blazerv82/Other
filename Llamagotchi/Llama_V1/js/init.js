// Setup function
let init = () => {

    const llama_name = document.querySelector("#llama_name");
    const llama_info = document.querySelector("#llama_info")
    const llama_hunger_bar = document.querySelector("#llama_hunger_bar");
    const llama_play_bar = document.querySelector("#llama_play_bar");
    const llama_feed_btn = document.querySelector("#llama_feed_btn")
    
    llama_name.innerHTML = llama.name;
    llama_info.innerHTML = llama.getDescription(llama);
    
    llama_hunger_bar.innerHTML = llama.doHunger(llama);
    llama_play_bar.innerHTML = llama.doPlay(llama);

    llama_feed_btn.addEventListener("click", function() { feed(llama) } );
    llama_play_btn.addEventListener("click", function() { play(llama) } );
}

// Do things upon loading of webpage
window.addEventListener("load", init);