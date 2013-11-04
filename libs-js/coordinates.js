/*
 * AstronomyLibs_Coordinates_text2Float(text_coordinate)
 *
 * get float representation of coordinates like +19°10'49.0"
 * i.e. 19.180277778
 *
 * @author Markus Popp <git@mpopp.net>
 */
function AstronomyLibs_Coordinates_text2Float(text_coordinate) {
    // regex to extract parts needed for calcuation
    var regex = new RegExp(/([+-]?)(\d{1,3})\s*°\s*(?:(\d{1,2})\s*'\s*)?(?:(\d{1,2}(?:\.\d*)?)\s*\"\s*)?/);

    var matches = regex.exec(text_coordinate);

    if (isNaN(matches[3])) {
        matches[3] = 0;
    }

    if (isNaN(matches[4])) {
        matches[4] = 0;
    }

    var float_coordinate = parseFloat(matches[2]) +
                            parseFloat(matches[3]) / 60 +
                            parseFloat(matches[4]) / 3600;

    // if coordinates are negative
    if (matches[1] == "-") {
        float_coordinate = -float_coordinate;
    }

    return float_coordinate;
}

/*
 * AstronomyLibs_Coordinates_float2Text(float_coordinate, decimals)
 *
 * get text representation of coordinates like 19.180277778
 * i.e. +19°10'49.0"; $decimals allows to set the number of
 * arcsecond decimals (1 being the default)
 *
 * @author Markus Popp <git@mpopp.net>
 */
function AstronomyLibs_Coordinates_float2Text(float_coordinate, decimals = 1) {

    var degrees = parseInt(float_coordinate);

    var minutes_full = Math.abs(parseInt(float_coordinate) - float_coordinate) * 60;

    var minutes = parseInt(minutes_full);

    var seconds = parseInt((minutes_full - minutes) * 60 * Math.pow(10, decimals) + .5) / Math.pow(10, decimals);

    return degrees + "°" + minutes + "'" + seconds + "\"";
}