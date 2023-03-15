// SIZE OF TILES
var TILE_WIDTH = 32;
var TILE_HEIGHT = 32;

// DONT TOUCH ME, SETS W/H ACCORDING TO SIZE OF SCREEN AND TILES THEMSELVES
var WORLD_WIDTH; 
var WORLD_HEIGHT;

var NEW_WORLD_WIDTH;
var NEW_WORLD_HEIGHT;

// X AND Y
var new_x_pos = TILE_WIDTH;
var new_y_pos = TILE_HEIGHT;
var x_pos = 0;
var y_pos = 0;

var noise_scale = 0;

// ALL LAND = 90, ALL WATER = 0, HALF 'N HALF = 50
var WORLD_Z = 45;

// SETS BRIGHTNESS OF TILES, 110 STANDARD
var BRIGHTNESS = 125;

var LANDMARK_DENSITY = -1;

var CITY_DENSITY = 5;
var MOUNTAIN_DENSITY = 30;
var LAKE_DENSITY = 0;

// X, Y, COLOR
var world_array = [ [], [], [], [] ];
var temp_world = [ [], [], [], [] ];

var img_to_use;

var left_arrow_presses = 0;
var right_arrow_presses = 0;


function preload() {
  
    land = loadImage('img/land.png');
    city = loadImage('img/city.png');
    mountain = loadImage('img/mountains.png');
    lake = loadImage('img/lake.png');
    water = loadImage('img/water.png');
}

function setup() {

    // Set world width and height
    WORLD_WIDTH = 5 // round(windowWidth / TILE_WIDTH) - 0;
    WORLD_HEIGHT = 5 // round(((windowHeight) / TILE_HEIGHT)) - 0;

    // Size of canvas determined by size of tiles, background is black
    createCanvas(TILE_WIDTH*WORLD_WIDTH, TILE_HEIGHT*WORLD_HEIGHT);
    
    NEW_WORLD_WIDTH = TILE_WIDTH*WORLD_WIDTH;
    NEW_WORLD_HEIGHT = TILE_HEIGHT*WORLD_HEIGHT;

    background(0, 0, 0);

    // Create world once and only once!
    noLoop();
}

function draw(){

    for (let wh = 0; wh < WORLD_HEIGHT; wh++) {
        for (let ww = 0; ww < WORLD_WIDTH; ww++){

            // Changes noise scale
            noise_scale += .015;

            // Set tile type and brightness of said tile
            var tile_type = round(noise(new_x_pos*noise_scale) * 100);
            var brightness_amount = tile_type + BRIGHTNESS;

            // Land
            if (tile_type < WORLD_Z) {

                tint(0, brightness_amount, 0);

                img_to_use = land;
            }

            // Water
            else {

                tint(0, 0, brightness_amount);     

                img_to_use = water;
            }

            // Puts img on canvas
            image(img_to_use, x_pos, y_pos);

            document.getElementById("info").innerHTML += "[" 
                + x_pos 
                + ", " + y_pos 
                + ", " + tile_type
                + "]&nbsp;";

            world_array[0].push(x_pos);
            world_array[2].push(tile_type);
            world_array[3].push(brightness_amount)

            x_pos += new_x_pos;
        }

        document.getElementById("info").innerHTML += "<br/>"

        world_array[1].push(y_pos);
        
        y_pos += new_y_pos;
        x_pos = 0;
    }
    

    temp_world[0].push(world_array[0]);
    temp_world[1].push(world_array[1]);
    temp_world[2].push(world_array[2]);
    temp_world[3].push(world_array[3]);
   
}

function keyPressed(){

    document.getElementById("info").innerHTML = "";

    x_index = temp_world[0].shift();
    y_index = temp_world[1].shift();
    tile_index = temp_world[2].shift();
    color_index = temp_world[3].shift();


    // LEFT
    if (keyCode == LEFT_ARROW) {

        var ti = 0;
        var ci = 0;
        left_arrow_presses += 1;

        
        // alert("BEFORE:\n" + temp_world[0] + "\n" + temp_world[1]);
        
        for (var wh = 0; wh < WORLD_HEIGHT; wh++){
            for (var ww = 0; ww < WORLD_WIDTH; ww++){

                document.getElementById("info").innerHTML += "<b>[" + ww + ", " + wh + "]</b>";

                document.getElementById("info").innerHTML += "[X: " + x_index[ww+left_arrow_presses]
                    + ", Y: " + y_index[wh] 
                    + ", TILE: " + tile_index[ti]
                    + ", COLOR: " + color_index[ci]
                    + "]&nbsp;";

                

                // Land
                if (tile_index[ti] < WORLD_Z) {

                    tint(0, color_index[ci], 0);

                    img_to_use = land;
                }

                // Water
                else {

                    tint(0, 0, color_index[ci]);     

                    img_to_use = water;
                }

                image(img_to_use, x_index[ww+left_arrow_presses], y_index[wh]);

                ti++;
                ci++;
            }

            document.getElementById("info").innerHTML += "<br/>"
        }
        // alert("AFTER:\n" + temp_world[0] + "\n" + temp_world[1]);

        if (left_arrow_presses >= WORLD_WIDTH) {
            left_arrow_presses = 0;
        }

    }

    // LEFT
    if (keyCode == RIGHT_ARROW) {

        var ti = tile_index.length;
        var ci = color_index.length;
        left_arrow_presses += 1;

        
        // alert("BEFORE:\n" + temp_world[0] + "\n" + temp_world[1]);
        
        for (var wh = WORLD_HEIGHT-1; wh > -1; wh--){
            for (var ww = WORLD_WIDTH-1; ww > -1; ww--){

                document.getElementById("info").innerHTML += "<b>[" + ww + ", " + wh + "]</b>";

                document.getElementById("info").innerHTML += "[X: " + x_index[ww+left_arrow_presses]
                    + ", Y: " + y_index[wh] 
                    + ", TILE: " + tile_index[ti]
                    + ", COLOR: " + color_index[ci]
                    + "]&nbsp;";

                
                if (tile_index[ti] < WORLD_Z) {

                    tint(0, color_index[ci], 0);

                    img_to_use = land;
                }

                // Water
                else {

                    tint(0, 0, color_index[ci]);     

                    img_to_use = water;
                }

                image(img_to_use, x_index[ww+left_arrow_presses], y_index[wh]);

                ti--;
                ci--;
            }

            document.getElementById("info").innerHTML += "<br/>"
        }
        // alert("AFTER:\n" + temp_world[0] + "\n" + temp_world[1]);

        if (left_arrow_presses < 0) {
            left_arrow_presses = WORLD_WIDTH;
        }

    }

    temp_world[0].push(x_index);
    temp_world[1].push(y_index);
    temp_world[2].push(tile_index);
    temp_world[3].push(color_index);

}

