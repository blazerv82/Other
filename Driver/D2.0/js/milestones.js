const check_milestones = (distance) => {

    if (distance == 10) { milestone_10(); }
    if (distance >= 50) { milestone_50(); }
    if (distance >= 500) { milestone_500(); }
    if (distance >= 5000) { milestone_5000(); }

}

const check_distance = (x) => { console.log("You have gained " + x + " DU") }

const create_manual_button = (distance) => {
    
    return $("<button/>", {
        "class": "alert-container theme-primary vl-2 my-medium mx-medium",
        "type": "button",
        "id": "btn_" + distance,
        text: "+" + distance,
        click: function() {
            manual_add_distance(distance);
        }
    });
}

const create_auto_button = (increase, id, text, runner) => {
    
    return $("<button/>", {
        "class": "alert-container theme-primary vl-2 my-medium mx-medium",
        "type": "button",
        "id": "btn_" + id,
        text: text,
        click: function() {
            auto_add_distance(increase);
        }
    });
}

const milestone_10 = () => {
    console.log("You've hit 10 DU. Good for you!");

    $("#unlock_buttons").append(create_manual_button(2));
}

const milestone_50 = () => {
    if (!$("#btn_5").length) {
        console.log("You've hit 50 DU. Good for you!");

        $("#unlock_buttons").append(create_manual_button(5)); 
    }
}

const milestone_500 = () => {
    if (!$("#btn_500").length) {
        console.log("You've hit 500 DU. Good for you!");

        $("#unlock_buttons").append(create_manual_button(500)); 
    }
}

const milestone_5000 = () => {
    if (!$("#btn_5000").length) {
        console.log("You've hit 5000 DU. Good for you!");

        $("#unlock_buttons").append(create_manual_button(5000)); 
    }
}