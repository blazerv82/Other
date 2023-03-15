$(document).ready(function(){

    $("#aff_links").hide();
    $("#xrd_links").hide();
    $("#world_links").hide();
    $("#gp_links").hide();
    $("#shatterd_links").hide();
    $("#frequency_links").hide();
    $("#tv_links").hide();
    $("#paws_links").hide();
    $("#draw_links").hide();
    $("#betac_links").hide();
    $("#llama_links").hide();
    $("#task_links").hide();

    // Hide/Show links
    $("#aff_header").click(function(){
        $("#aff_links").slideToggle("slow");
    });

    $("#xrd_header").click(function(){
        $("#xrd_links").slideToggle("slow");
    });

    $("#world_header").click(function(){
        $("#world_links").slideToggle("slow");
    });

    $("#gp_header").click(function(){
        $("#gp_links").slideToggle("slow");
    });

    $("#shatterd_header").click(function(){
        $("#shatterd_links").slideToggle("slow");
    });

    $("#frequency_header").click(function(){
        $("#frequency_links").slideToggle("slow");
    });

    $("#tv_header").click(function(){
        $("#tv_links").slideToggle("slow");
    });

    $("#paws_header").click(function(){
        $("#paws_links").slideToggle("slow");
    });

    $("#draw_header").click(function(){
        $("#draw_links").slideToggle("slow");
    });

    $("#betac_header").click(function(){
        $("#betac_links").slideToggle("slow");
    });

    $("#llama_header").click(function(){
        $("#llama_links").slideToggle("slow");
    });

    $("#task_header").click(function(){
        $("#task_links").slideToggle("slow");
    });

});