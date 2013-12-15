// miles to kilometers
const MI2KM = 1.60934;

// astronomical units to kilometers
const AU2KM    = 149597870.7;

// light years to astronomical units
const LY2AU    = 63241.077;

// parsecs to light years
const PC2LY    = 3.26156;

// Earth radius in kilometers
const EARTH_RADIUS = 6371.009;

/*
 * distanceBetween(location1, location2)
 *
 * calculates distance in kilometers between location 1 and location 2
 * formula used from http://en.wikipedia.org/wiki/Great-circle_distance#Formulas
 *
 * param: array location1 Location array as created by location.js
 * param: array location2 Location array as created by location.js
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   distance between location 1 and location 2 in kilometers
 */
function AstronomyLibs_Distances_distanceBetween(location1, location2) {

    var lat1 = location1.latitude;
    var lon1 = location1.longitude;
    var lat2 = location2.latitude;
    var lon2 = location2.longitude;

    return EARTH_RADIUS *
        Math.acos(Math.sin(AstronomyLibs_Distances_deg2rad(lat1)) * Math.sin(AstronomyLibs_Distances_deg2rad(lat2)) +
                  Math.cos(AstronomyLibs_Distances_deg2rad(lat1)) * Math.cos(AstronomyLibs_Distances_deg2rad(lat2)) *
                    Math.cos(AstronomyLibs_Distances_deg2rad(Math.abs(lon2 - lon1))));
}

/*
 * AstronomyLibs_Distances_calcDistanceAB(distance_a, distance_b, angle_gamma)
 *
 * calculates distance between point A and point B providing distance to both
 * points A and B and the angle separating them (gamma). Output distance
 * unit is identical to input distance units. Calculation method used is the
 * law of cosines as described at http://en.wikipedia.org/wiki/Law_of_cosines#Applications
 * c = sqrt(a² + b² - 2ab * cos(γ))
 *
 * param: float distance_a distance to point A
 * param: float distance_b distance to point B
 * param: float angle gamma (as float) separating point A and B
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   distance between point A and point B
 */
function AstronomyLibs_Distances_calcDistanceAB(distance_a, distance_b, angle_gamma) {

    return Math.sqrt(Math.pow(distance_a, 2) + Math.pow(distance_b, 2)
                   - 2 * distance_a * distance_b * Math.cos(AstronomyLibs_Distances_deg2rad(angle_gamma)));
}

/*
 * deg2rad(deg)
 *
 * converts degrees to radiants
 *
 * param: float deg degrees
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   degrees converted to radiants
 */
function AstronomyLibs_Distances_deg2rad(deg) {
    return (deg / 180) * Math.PI;
}

/*
 * mi2km(mi)
 *
 * convert miles to kilometers
 *
 * param: float mi value in miles
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in kilometers
 */
function AstronomyLibs_Distances_mi2km(mi) {
    return mi * MI2KM;
}

/*
 * km2mi(km)
 *
 * convert kilometers to miles
 *
 * param: float km value in kilometers
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in miles
 */
function AstronomyLibs_Distances_km2mi(km) {
    return km / MI2KM;
}

/*
 * au2km(au)
 *
 * convert astronomical units to kilometers
 *
 * param: float au value in astronomical units
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in kilometers
 */
function AstronomyLibs_Distances_au2km(au) {
    return au * AU2KM;
}

/*
 * km2au(km)
 *
 * convert kilometers to astronomical units
 *
 * param: float km value in astronomical units
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in astronomical units
 */
function AstronomyLibs_Distances_km2au(km) {
    return km / AU2KM;
}

/*
 * ly2au(ly)
 *
 * convert light years to astronomical units
 *
 * param: float ly value in light years
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in astronomical units
 */
function AstronomyLibs_Distances_ly2au(ly) {
    return ly * LY2AU;
}

/*
 * au2ly(au)
 *
 * convert light years to light years
 *
 * param: float au value in astronomical units
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in light years
 */
function AstronomyLibs_Distances_au2ly(au) {
    return au / LY2AU;
}

/*
 * pc2ly(pc)
 *
 * convert parsecs to light years
 *
 * param: float pc value in parsecs
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in light years
 */
function AstronomyLibs_Distances_pc2ly(pc) {
    return pc * PC2LY;
}

/*
 * ly2pc(ly)
 *
 * convert light years to light parsecs
 *
 * param: float ly value in light years
 * author: Markus Popp <git@mpopp.net>
 * license: http://www.opensource.org/licenses/mit-license.html MIT License
 * return: float   equivalent value in parsecs
 */
function AstronomyLibs_Distances_ly2pc(ly) {
    return ly / PC2LY;
}