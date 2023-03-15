/* 
    World Gen 3.0

    // CHANGELOG 10.16.2019
    ///////////////////////

    ADDED ///

    CHANGED init function now preloads all images w/o use of p5.js

    REMOVED ///

    ///////////////////////
    // CHANGELOG 10.16.2019

*/


const init = () => {

    let canvas = document.querySelector("#world");
    let draw = canvas.getContext("2d");

    canvas.width = 500;
    canvas.height = 500;

    const W_WIDTH = 20;
    const W_HEIGHT = 20;

    let imgLocations = [];
    imgLocations.push("img/tiles/water2.png"); // water
    imgLocations.push("img/tiles/ground2.png"); // ground
    imgLocations.push("img/tiles/sand2.png"); // sand
    imgLocations.push("img/tiles/snow2.png"); // snow

    imgLocations.push("img/features/city.png"); // city
    imgLocations.push("img/features/lake.png"); // lake
    imgLocations.push("img/features/mountain.png"); // mountain

    let images = [];
    let allImagesLoaded = 0;

    imgLocations.forEach(element => {
        var img = new Image();
        images.push(img);

        img.addEventListener("load", function() {
            allImagesLoaded++;
            if (allImagesLoaded == imgLocations.length) {
                doDraw(draw, images, W_WIDTH, W_HEIGHT);
            }
        });

        img.src = element;
    });
}

const doDraw = (draw, images, WW, WH) => {

    let x_pos = 0;
    let y_pos = 0;

    const CITY_DENSITY = 0;
    const LAKE_DENSITY = 0;
    const MOUNTAIN_DENSITY = 50;
    const COLD_DESNITY = 0;
    const HOT_DENSITY = 0;
    const WATER_Z = 35;

    let worldMap = [[],[],[],[],[],[]];

    // Outputs all images one by one on canvas
    // images.forEach(element => {
    //     draw.drawImage(element, x, y, element.width, element.height);
    //     x += element.width;
    //     y += 0;
    // });
        
    for (let y = 0; y < WH; y++){
        for (let x = 0; x < WW; x++) {

            let ground_type = Math.floor((Math.random() * 3) + 1); // temperate, snow, sand
            let ground_height = Math.floor(Math.random() * 100);
            let feature_type = Math.floor(Math.random() * 4);
            
            if (ground_height < WATER_Z) {
                draw.drawImage(images[0], x_pos, y_pos, 25, 25); // water
            }

            else {
                draw.drawImage(images[ground_type], x_pos, y_pos, 25, 25);
            }

            // Add some pizzaz to those tiles!
            // Adds an additonal feature if not water
            if (ground_height > WATER_Z) {

                city_feature_chance = Math.floor(Math.random() * 100);
                lake_feature_chance = Math.floor(Math.random() * 100);
                mountain_feature_chance = Math.floor(Math.random() * 100);

                switch (feature_type) {
                    case 1:
                        if (CITY_DENSITY > city_feature_chance) {
                            draw.drawImage(images[4], x_pos, y_pos, 25, 25);
                        }
                        break;
                    case 2:
                        if (LAKE_DENSITY > lake_feature_chance) {
                            draw.drawImage(images[5], x_pos, y_pos, 25, 25);
                        }
                        break;
                    case 3:
                        if (MOUNTAIN_DENSITY > mountain_feature_chance) {
                            draw.drawImage(images[6], x_pos, y_pos, 25, 25);
                        }
                        break;
                    default:
                        break;
                }
            }
        
            // Add X/Y Grid coords, X/Y Grid position, Tile and Feature Types
            worldMap[0].push(x);
            worldMap[1].push(y);
            worldMap[2].push(x_pos);
            worldMap[3].push(y_pos);
            worldMap[4].push(ground_type);
            worldMap[5].push(feature_type);

            x_pos += images[ground_type].width;
        }

        y_pos += 25;
        x_pos = 0;
    }

    console.log(worldMap);

}

window.addEventListener("load", init);