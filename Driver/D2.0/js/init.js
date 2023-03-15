// Setup function
$(document).ready(function(){

    // Get additional scripts for proper functionality
    $.getScript("js/distance_add.js")
        .done(function() { console.log("distance_add.js loaded") })
        .fail(function() { console.log("distance_add.js failed") });

    $.getScript("js/milestones.js")
        .done(function() { console.log("milestones.js loaded") })
        .fail(function() { console.log("milestones.js failed") });

    // Reset webpage to 'stock'
    $("#distanceTotal").val(0);

    // Does functions upon click of button
    $("#add_distance").click(function() { manual_add_distance(1) } );

});