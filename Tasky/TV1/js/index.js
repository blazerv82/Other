// Setup function
let init = () => {


    const task_input = document.querySelector("#task_input");

    // Listens for changes in input fields and outputs values to webpage
    task_input.addEventListener("keyup", function() { changeTaskName(this.value); } );

}

let changeTaskName = (newName) => {

    var alert_check = document.querySelector("#alert");

    if (alert_check) { alert_check.style.display = "none"; }

    if (newName.length == 0) { newName = "Narwhals"; }

    task_name.innerHTML = newName;
}


// Do things upon loading of webpage
window.addEventListener("load", init);