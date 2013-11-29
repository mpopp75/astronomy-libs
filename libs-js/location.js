/*
 * AstronomyLibs_Location(latitude, longitude)
 *
 * stores latitude and longitude of a location, requires coordinates.js
 *
 * param: mixed latitude latitude in any format supported by Coordinates class
 * param: mixed longitude longitude in any format supported by Coordinates class
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
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

/*
 * AstronomyLibs_Location_Current()
 *
 * return latitude and longitude of current location, using GeoLocation API
 *
 * param: callback
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 */
function AstronomyLibs_Location_Current(callback) {
    if (! navigator.geolocation) {
        return null;
    }

    var latitude  = null;
    var longitude = null;
    var altitude  = null;
    var accuracy  = null;

    navigator.geolocation.getCurrentPosition(function (position) {
            latitude  = position.coords.latitude;
            longitude = position.coords.longitude;
            altitude  = position.coords.altitude;
            accuracy  = position.coords.accuracy;

            callback.call( {'latitude':  latitude,
                            'longitude': longitude,
                            'alitude':   altitude,
                            'accuracy':  accuracy }
            );
        },
        function (error) {
        },
        {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        }
    );

    return false;
}