$(document).ready(function(){

    disableCache();

    // $(BRICK CLASS).load(BRICK TO INSERT) => 
    // remove all top-level styling for only brick-level styling
    $(".brick").load("builder/brick/header.html", function() {
        $(this).removeAttr("class");
        $(this).addClass("vl-3")
    });


});