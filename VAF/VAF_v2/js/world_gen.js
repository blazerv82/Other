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

// SETS BRIGHTNESS OF TILES, 110 STANDARD
var BRIGHTNESS = 125;

var LANDMARK_DENSITY = -1;


var img_to_use;


function preload() {
  
    land = loadImage('img/land.png');

}

function setup() {

    // Set world width and height
    WORLD_WIDTH = round(windowWidth / TILE_WIDTH) - 2;
    WORLD_HEIGHT = round(((windowHeight) / TILE_HEIGHT)) - 2;

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

            img_to_use = land;
            tint(0, brightness_amount, 0);
            
            // Puts img on canvas
            image(img_to_use, x_pos, y_pos);

            x_pos += new_x_pos;
        }
        
        y_pos += new_y_pos;
        x_pos = 0;
    }
   
}