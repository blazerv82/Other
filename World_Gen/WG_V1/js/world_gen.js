window.onload = function(){

var c = document.getElementById("world_container");
var ctx = c.getContext("2d");

// Set size
c.width = window.innerWidth * 1;
c.height = window.innerHeight * 1;


// SIZE OF TILES
var TILE_WIDTH = 35;
var TILE_HEIGHT = 35;

// WORLD GEN MODIFIERS
// OUT OF 100%, -1 FOR NONE
var WATER_DENSITY = 30;
var WATER_DEEPNESS = 100;
var CITY_DENSITY = 5;
var LAKE_DENSITY = 1;

// DONT TOUCH ME, SETS TILES ACCORDING TO SIZE OF SCREEN AND TILES THEMSELVES
var WORLD_WIDTH = c.width / TILE_WIDTH;
var WORLD_HEIGHT = c.height / TILE_HEIGHT;

// X AND Y
var x_pos = TILE_WIDTH;
var y_pos = TILE_HEIGHT;
var new_x_pos = 0;
var new_y_pos = 0;

// LAND
var land_border = "#119911";
var land_tile = "#00FF00";

// ICE
var ice_border = "#888888";
var ice_tile = "#FFFFFF"

// WATER
var water_border = "#0000AA";
var water_tile = "#00AAFF";

// DEEP WATER
var deep_water_border = "#000099";
var deep_water_tile = "#0000FF";

// CITY
var city_border = "#889988";
var city_tile = "#FFAA00";

var world_array = [];


    for (wh = 0; wh < WORLD_HEIGHT; wh++){
        for (ww = 0; ww < WORLD_WIDTH; ww++){

            if (wh > Math.round(WORLD_HEIGHT-1)){
                break;
            }

            if (wh == 0 || wh == Math.round(WORLD_HEIGHT-1)){
                //Fill
                ctx.fillStyle = ice_tile;
                ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                // Outline
                ctx.strokeStyle = ice_border;
                ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);
            }
            
            
            else {
                
                // LAND OR WATER
                var tile_type = Math.floor(Math.random() * 99);
                
                // WATER
                if (tile_type <= WATER_DENSITY) {
                    
                    // WATER DEEPNESS
                    var water_type = Math.floor(Math.random() * 99);
                    
                    //Fill
                    ctx.fillStyle = deep_water_tile;
                    ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    // Outline
                    ctx.strokeStyle = deep_water_border;
                    ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    // if (water_type < WATER_DEEPNESS){

                    //     //Fill
                    //     ctx.fillStyle = deep_water_tile;
                    //     ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT); 
                    //     // Outline
                    //     ctx.strokeStyle = deep_water_border;
                    //     ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);
                    // }
                } 

                // LAND
                else {
                    
                    // CHANCE OF CITY
                    var city_chance = Math.floor(Math.random() * 99);
                    var lake_chance = Math.floor(Math.random() * 99);

                    //Fill
                    ctx.fillStyle = land_tile;
                    ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    // Outline
                    ctx.strokeStyle = land_border;
                    ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);
                    
                    if (city_chance <= CITY_DENSITY){
                       
                        //Fill
                        ctx.fillStyle = city_tile;
                        ctx.shadowBlur = 1;
                        ctx.shadowColor = "#000000";
                        ctx.fillRect(new_x_pos+TILE_WIDTH*.25, new_y_pos+TILE_HEIGHT*.25, TILE_WIDTH*0.5, TILE_HEIGHT*0.5);

                        // Outline
                        ctx.strokeStyle = city_border;
                        ctx.strokeRect(new_x_pos+TILE_WIDTH*.25, new_y_pos+TILE_HEIGHT*.25, TILE_WIDTH*0.5, TILE_HEIGHT*0.5);

                        ctx.shadowBlur = 0;
                    }

                    if (lake_chance <= LAKE_DENSITY){
                       
                        //Fill
                        ctx.fillStyle = water_tile;
                        ctx.shadowBlur = 1;
                        ctx.shadowColor = "#000000";
                        ctx.fillRect(new_x_pos+TILE_WIDTH*.25, new_y_pos+TILE_HEIGHT*.25, TILE_WIDTH*0.5, TILE_HEIGHT*0.5);

                        // Outline
                        ctx.strokeStyle = water_border;
                        ctx.strokeRect(new_x_pos+TILE_WIDTH*.25, new_y_pos+TILE_HEIGHT*.25, TILE_WIDTH*0.5, TILE_HEIGHT*0.5);

                        ctx.shadowBlur = 0;
                    }
                }
                
            }

            new_x_pos += x_pos;
        
        }
        
        new_x_pos = 0;
        new_y_pos += y_pos;
    }
}