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