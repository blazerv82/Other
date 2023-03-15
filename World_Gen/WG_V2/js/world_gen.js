var total = "";
var settings = "";

function generate_world(){

var c = document.getElementById("world_container");
var ctx = c.getContext("2d");

// Set size
c.width = window.innerWidth - 20;
c.height = window.innerHeight - 100;

// SIZE OF TILES
var TILE_WIDTH = parseInt(document.getElementById('form_size').value);
var TILE_HEIGHT = parseInt(document.getElementById('form_size').value);


// DONT TOUCH ME, SETS W/H ACCORDING TO SIZE OF SCREEN AND TILES THEMSELVES
var WORLD_WIDTH = (c.width / TILE_WIDTH) - 1 ;
var WORLD_HEIGHT = c.height / TILE_HEIGHT;

// WORLD GEN MODIFIERS
// OUT OF 100%, -1 FOR NONE
var WATER_DENSITY = parseInt(document.getElementById('water_density').value);
var CITY_DENSITY = parseInt(document.getElementById('city_density').value);
var LAKE_DENSITY = parseInt(document.getElementById('lake_density').value);

// HOT LAND MODIFIERS, CHANGE NUMBERS ONLY
var HOT_LAND_DENSITY = parseInt(document.getElementById('hl_density').value);
var HOT_LAND_TOP = (WORLD_HEIGHT * parseInt(document.getElementById('hl_start').value)) / 100;
var HOT_LAND_BOTTOM = (WORLD_HEIGHT * parseInt(document.getElementById('hl_end').value)) / 100;

// COLD LAND MODIFIERS, CHANGE NUMBERS ONLY
var COLD_LAND_DENSITY = parseInt(document.getElementById('cl_density').value);
var COLD_LAND_TOP = (WORLD_HEIGHT * parseInt(document.getElementById('cl_start').value)) / 100;
var COLD_LAND_BOTTOM = (WORLD_HEIGHT * parseInt(document.getElementById('cl_end').value)) / 100;

// X AND Y
var x_pos = TILE_WIDTH;
var y_pos = TILE_HEIGHT;
var new_x_pos = 0;
var new_y_pos = 0;

// TEMPERATE LAND
var land_border = "#119911";
var land_tile = "#00FF00";
var land_count = 0;

// HOT LAND
var hot_land_border = "#874800";
var hot_land_tile = "#FF8800";
var hot_land_count = 0;

// COLD LAND
var cold_land_border = "#888888";
var cold_land_tile = "#FFFFFF"
var cold_land_count = 0;

// WATER
var water_border = "#0000AA";
var water_tile = "#00AAFF";
var water_count = 0;

// DEEP WATER
var deep_water_border = "#000099";
var deep_water_tile = "#0000FF";
var deep_water_count = 0;

// CITY
var city_border = "#777777";
var city_tile = "#AAAAAA";
var city_count = 0;

    for (wh = 0; wh < WORLD_HEIGHT; wh++){
        for (ww = 0; ww < WORLD_WIDTH; ww++){

            if (wh > Math.round(WORLD_HEIGHT-1)){
                break;
            }

            if (wh == 0 || wh == Math.round(WORLD_HEIGHT-1)){
                //Fill
                ctx.fillStyle = cold_land_tile;
                ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                // Outline
                ctx.strokeStyle = cold_land_border;
                ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                cold_land_count++;
            }
            
            
            else {
                
                // LAND OR WATER
                var tile_type = Math.floor(Math.random() * 99);
                
                // WATER
                if (tile_type <= WATER_DENSITY) {
                    
                    //Fill
                    ctx.fillStyle = deep_water_tile;
                    ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    // Outline
                    ctx.strokeStyle = deep_water_border;
                    ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    deep_water_count++;

                } 

                // LAND
                else {
                    
                    // CHANCE OF VARIOUS WORLD ADDONS
                    var city_chance = Math.floor(Math.random() * 99);
                    var lake_chance = Math.floor(Math.random() * 99);
                    var hot_land_chance = Math.floor(Math.random() * 99);
                    var cold_land_chance = Math.floor(Math.random() * 99);

                    //Fill
                    ctx.fillStyle = land_tile;
                    ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    // Outline
                    ctx.strokeStyle = land_border;
                    ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                    land_count++;

                    if (hot_land_chance <= HOT_LAND_DENSITY) {
                        if (wh >= HOT_LAND_TOP && wh <= HOT_LAND_BOTTOM) {
                            //Fill
                            ctx.fillStyle = hot_land_tile;
                            ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                            // Outline
                            ctx.strokeStyle = hot_land_border;
                            ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                            hot_land_count++;
                        }
                    }

                    if (cold_land_chance <= COLD_LAND_DENSITY) {
                        if (wh <= COLD_LAND_TOP || wh >= COLD_LAND_BOTTOM) {
                            //Fill
                            ctx.fillStyle = cold_land_tile;
                            ctx.fillRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                            // Outline
                            ctx.strokeStyle = cold_land_border;
                            ctx.strokeRect(new_x_pos, new_y_pos, TILE_WIDTH, TILE_HEIGHT);

                            cold_land_count++;
                        }
                    }
                    
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

                        city_count++;
                    }

                    if (lake_chance <= LAKE_DENSITY){

                        // LAKE WILL ONLY SPAWN IF ON REGULAR LAND, NOT HOT NOR COLD
                        if (cold_land_chance > COLD_LAND_DENSITY && hot_land_chance > HOT_LAND_DENSITY) {

                            //Fill
                            ctx.fillStyle = water_tile;
                            ctx.shadowBlur = 1;
                            ctx.shadowColor = "#000000";
                            ctx.fillRect(new_x_pos+TILE_WIDTH*.25, new_y_pos+TILE_HEIGHT*.25, TILE_WIDTH*0.5, TILE_HEIGHT*0.5);

                            // Outline
                            ctx.strokeStyle = water_border;
                            ctx.strokeRect(new_x_pos+TILE_WIDTH*.25, new_y_pos+TILE_HEIGHT*.25, TILE_WIDTH*0.5, TILE_HEIGHT*0.5);

                            ctx.shadowBlur = 0;

                            water_count++;
                       }
                    }
                }
                
            }

            new_x_pos += x_pos;
        
        }
        
        new_x_pos = 0;
        new_y_pos += y_pos;
    }

    // Find actual number of cold tiles, getting rid of both top and bottom border lines
    cold_land_count = Math.floor(cold_land_count - (WORLD_WIDTH * 2));

    // Find actual number of green land tiles
    land_count = Math.floor(land_count - (hot_land_count + cold_land_count));

    var total_land_count = Math.floor(land_count + hot_land_count + cold_land_count);


    // Outputs world info string
    total = "---BASIC STATS---"
            + "<br/>LAND TILES: " + total_land_count
            + "<br/>WATER TILES: " + deep_water_count
            + "<hr>---LAND BREAKDOWN---"
            + "<br/>COLD TILES: " + cold_land_count
            + "<br/>HOT TILES: " + hot_land_count
            + "<br/>TEMPERATE TILES: " + land_count
            + "<hr>---AREAS OF INTEREST---"
            + "<br/>CITIES: " + city_count
            + "<br/>LAKES: " + water_count;

    document.getElementById("stats_div").innerHTML = total;

}
