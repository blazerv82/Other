const getCoords = (zipCode) => {

    let url = "http://api.geonames.org/postalCodeSearchJSON?countryCode=US&username=blazerv82&postalcode=";
    let xhr = new XMLHttpRequest();

    xhr.open("GET", url + zipCode);
    xhr.responseType = 'json';
    xhr.send(null);
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4) {

            try {
                let returnJSON = xhr.response;
                let lat = returnJSON.postalCodes[0].lat;
                let lng = returnJSON.postalCodes[0].lng;
                // console.log(returnJSON);
                doWeather(lat, lng);
            }

            catch (err) {
                console.error("invalid zip \n" + err);
            }
        }
    }

}

const doWeather = (lat, lng) => {

    let url = "http://api.geonames.org/findNearByWeatherJSON?username=blazerv82";
    let latString = "&lat=" + lat;
    let lngString = "&lng=" + lng;
    let xhr = new XMLHttpRequest();

    xhr.open("GET", url + latString + lngString);
    xhr.responseType = 'json';
    xhr.send(null);
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4) {
            let returnJSON = xhr.response;
            let temp = returnJSON.weatherObservation.temperature;
            
            // console.log("weather is from: " + placeName + "\ntemp is: " + temp + "\nwindspeed is: " + wind);

            doOutput(temp);
        }
    }
}

const doOutput = (temp) => {

    let finalWeather = document.querySelector("#weather");
    let finalTemp = Math.round((temp * (9/5)) + 32);

    let tempString = finalTemp + "°F ";

    let tempHighGlyph = "<i class='fas fa-temperature-high red px-2'></i>"
    let tempLowGlyph = "<i class='fas fa-temperature-low blue px-2'></i>"
    let tempGlyph = "<i class='far fa-sun orange px-2'></i>"

    if (finalTemp <= 34) {
        tempString += tempLowGlyph;
    } else if (finalTemp >= 35 && finalTemp <= 82) {
        tempString += tempGlyph;
    } else {
        tempString += tempHighGlyph;
    }
    
    finalWeather.innerHTML = tempString;

}

window.addEventListener("load", getCoords(53713));