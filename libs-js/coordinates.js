/*
 * AstronomyLibs_Coordinates_float2Text(float_coordinate, decimals)
 *
 * get text representation of coordinates like 19.180277778
 * i.e. +19° 10' 49.0"; $decimals allows to set the number of
 * arcsecond decimals (1 being the default)
 *
 * param: float float_coordinate coordinates as float value  (e.g. -19.180277778)
 * param: string format which format to output
 * param: int decimals number of decimals to display for arcseconds; default is 1
 * author: Markus Popp <git@mpopp.net>
 * return: string   text representation (e.g. -19° 10' 49.0")
 */
function AstronomyLibs_Coordinates_float2Text(float_coordinate, format = "symbols", decimals = 1) {

    var degrees = parseInt(float_coordinate);

    var minutes_full = Math.abs(parseInt(float_coordinate) - float_coordinate) * 60;

    var minutes = parseInt(minutes_full);

    if (decimals === null) {
        var seconds = (minutes_full - minues) * 60;
    } else {
        var seconds = parseInt((minutes_full - minutes) * 60 * Math.pow(10, decimals) + .5) / Math.pow(10, decimals);
    }

    var text_coordinate = "";
    switch (format) {
        case "symbols" :
            text_coordinate = degrees + "° " + minutes + "' " + seconds + "\" ";
            break;
        case "spaces" :
            text_coordinate = degrees + " " + minutes + " " + seconds;
            break;
        case "dms" :
            text_coordinate = degrees + "d " + minutes + "m " + seconds + "s";
            break;
        case "hms" :
            text_coordinate = degrees + "h " + minutes + "m " + seconds + "s";
            break;
        default:
    }

    return text_coordinate;
}

/*
 * AstronomyLibs_Coordinates_text2Float(text_coordinate)
 *
 * get float representation of coordinates like +19° 10' 49.0"
 * i.e. 19.180277778
 * param: string textCoordinate text form of coordinates (e.g. +19° 10' 49.0")
 * param: int decimals number of decimals
 * author: Markus Popp <git@mpopp.net>
 * return: float    float representation (e.g. 19.180277778)
 */
function AstronomyLibs_Coordinates_text2Float(text_coordinate, decimals = null) {
    // regex to extract parts needed for calcuation
    var regex = new RegExp(/([NSEW+-]?)\s*(\d{1,3})\s*[°dh ]\s*(?:(\d{1,2})\s*['m ]\s*)?(?:(\d{1,2}(?:\.\d*)?)\s*[\"s]?\s*)?\s*([NSEW+-]?)/);

    var matches = regex.exec(text_coordinate);

    if (isNaN(matches[3])) {
        matches[3] = 0;
    }

    if (isNaN(matches[4])) {
        matches[4] = 0;
    }

    // ensure entry is valid
    if (matches[2] > 359 || matches[3] > 59 || matches[4] >= 60) {
        return NaN;
    }

    var float_coordinate = parseFloat(matches[2]) +
                           parseFloat(matches[3]) / 60 +
                           parseFloat(matches[4]) / 3600;

    // if coordinates are negative
    if (matches[1] == "-" ||
        matches[1] == "S" ||
        matches[1] == "W" ||
        matches[5] == "S" ||
        matches[5] == "W") {
        float_coordinate = -float_coordinate;
    }

    if (decimals != null) {
        float_coordinate = parseInt(float_coordinate * Math.pow(10, decimals) + .5) / Math.pow(10, decimals);
    }

    return float_coordinate;
}