const manual_add_distance = (x) => {

    let value = parseFloat($("#distanceTotal").val());

    value += x;

    $("#distanceTotal").val(value);

    check_milestones(value);
}

const auto_add_distance = (x, runner) => {
    
    setInterval(() => {
        let value = parseFloat($("#distanceTotal").val());

        value += x;

        $("#distanceTotal").val(value);

        check_milestones(value);
    }, 5000);
}
