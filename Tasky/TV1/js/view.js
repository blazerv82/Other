// Setup function
let init = () => {

    const task_term = document.querySelector("#task_term");
    const search_results = document.querySelector("#search_results");
    const all_tasks = document.querySelector("#all_tasks");

    task_term.addEventListener("keyup", function() {

        try {
            if (this.value) {
                searchForTask(this.value);
                search_results.style.display = "";
                all_tasks.style.display = "none";
            }
            else {
                search_results.style.display = "none";
                all_tasks.style.display = ""; 
            }
        }

        catch (e) { console.error(e); }
    });

}

let searchForTask = (input) => {

    // Loads external file
    let url = "php/task_js.php?search=" + input;
    let xhr = new XMLHttpRequest();

    xhr.open('GET', url);
    xhr.send(null);
    
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            document.querySelector("#search_results").innerHTML = (xhr.response);
        }
    }
}

// Do things upon loading of webpage
window.addEventListener("load", init);