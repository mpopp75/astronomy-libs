/*
 * AstronomyLibs_Location(latitude, longitude)
 *
 * stores latitude and longitude of a location, requires coordinates.js
 *
 * param: mixed latitude latitude in any format supported by Coordinates class
 * param: mixed longitude longitude in any format supported by Coordinates class
 * author: Markus Popp <git@mpopp.net>
 */
function AstronomyLibs_Location(latitude, longitude) {

    if (latitude != parseFloat(latitude)) {
        latitude = AstronomyLibs_Coordinates_text2float(latitude);
    }

    if (longitude != parseFloat(longitude)) {
        longitude = AstronomyLibs_Coordinates_text2float(longitude);
    }

    return {'latitude':  parseFloat(latitude),
            'longitude': parseFloat(longitude) };
}