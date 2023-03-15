// image preloader

// canvas related variables
var canvas=document.getElementById("canvas");
var ctx=canvas.getContext("2d");
var cw=canvas.width;
var ch=canvas.height;

// put the paths to your images in imageURLs[]
var imageURLs=[];  
imageURLs.push("https://dl.dropboxusercontent.com/u/139992952/multple/face1.png");
imageURLs.push("https://dl.dropboxusercontent.com/u/139992952/multple/face2.png");

// the loaded images will be placed in imgs[]
var imgs=[];
var imagesOK=0;
startLoadingAllImages(imagesAreNowLoaded);

// Create a new Image() for each item in imageURLs[]
// When all images are loaded, run the callback (==imagesAreNowLoaded)
function startLoadingAllImages(callback){

  // iterate through the imageURLs array and create new images for each
  for (var i=0; i<imageURLs.length; i++) {
    // create a new image an push it into the imgs[] array
    var img = new Image();
    // Important! By pushing (saving) this img into imgs[],
    //     we make sure the img variable is free to
    //     take on the next value in the loop.
    imgs.push(img);
    // when this image loads, call this img.onload
    img.onload = function(){ 
      // this img loaded, increment the image counter
      imagesOK++; 
      // if we've loaded all images, call the callback
      if (imagesOK>=imageURLs.length ) {
        callback();
      }
    };
    // notify if there's an error
    img.onerror=function(){alert("image load failed");} 
    // set img properties
    img.src = imageURLs[i];
  }      
}

// All the images are now loaded
// Do drawImage & fillText
function imagesAreNowLoaded(){

  // the imgs[] array now holds fully loaded images
  // the imgs[] are in the same order as imageURLs[]

  ctx.font="30px sans-serif";
  ctx.fillStyle="#333333";

  // drawImage the first image (face1.png) from imgs[0]
  // and fillText its label below the image
  ctx.drawImage(imgs[0],0,10);
  ctx.fillText("face1.png", 0, 135);

  // drawImage the first image (face2.png) from imgs[1]
  // and fillText its label below the image
  ctx.drawImage(imgs[1],200,10);
  ctx.fillText("face2.png", 210, 135);

}