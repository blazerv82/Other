
function setup() {   
    document.getElementById("llama_info").innerHTML = llama.getDescription();
    document.getElementById("llama_name").innerHTML = llama.name;
    document.getElementById("llama_hunger").innerHTML = llama.getHunger();
    document.getElementById("llama_happiness").innerHTML = llama.getHappiness(); 
}

