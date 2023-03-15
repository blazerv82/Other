// Setup function
let init = () => {

    $("#add_new_form").hide();

    $("#add_task").click(function(){
        $("#add_new_form").slideToggle("slow");
    });

    const task_term = document.querySelector("#task_term");
    const add_task = document.querySelector("#new_task");
    const removeBtn = document.querySelectorAll(".removeBtn");

    const search_results = document.querySelector("#search_results");
    const all_tasks = document.querySelector("#all_tasks");

    task_term.addEventListener("keyup", function() {

        try {
            if (this.value) {
                filter(this.value);
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

    add_task.addEventListener("click", function() { 

        try {
            let task_input = document.querySelector("#task_input");
            let task_type = document.querySelector("#task_type");
            let task_priority = document.querySelector("#task_priority");

            add(task_input.value, task_type.value, task_priority.value);

            task_input.value = "";
        }
        catch (e) { console.error(e); }

    });

}

const removeClicker = () => {
    document.querySelectorAll(".removeBtn").forEach(task => {
        task.addEventListener("click", function () {
            remove(task.id);
        });
    });
}

async function filter(input){

    try {
        fetch(`php/task_js.php?search=${input}`, {
            method: 'GET'
        })
        .then(response => {
            return response.text();
        })
        .then(html => {
            return search_results.innerHTML = html;
        })
        .catch(err => {
            throw err;
        });

        removeClicker();
    } 
    catch (err) { console.error('Error:', err); }
}

const add = async(description, type, priority) => {

    let url = `php/task_js.php`;

    var formData = new FormData();
    formData.append('description', description);
    formData.append('type', type);
    formData.append('priority', priority);

    try {
        await fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            return response.text();
        })
        .then(html => {
            all_tasks.innerHTML = "";
            return all_tasks.innerHTML = html;
        })
        .catch(err => {
            throw err;
        });
        
        removeClicker();
    } 
    catch (err) { console.error('Error:', err); }
}

const remove = async(id) => {

    let url = `php/task_js.php`;

    var formData = new FormData();
    formData.append('id', id);
    
    try {
        await fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            return response.text();
        })
        .then(html => {
            all_tasks.innerHTML = "";
            return all_tasks.innerHTML = html;
        })
        .catch(err => {
            throw err;
        });
        
        removeClicker();
    } 
    catch (err) { console.error('Error:', err); }
}

// Do things upon loading of webpage
window.addEventListener("load", init);