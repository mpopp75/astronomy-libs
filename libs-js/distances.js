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
 * param: Location location1 Location object
 * param: Location location2 Location object
 * author: Markus Popp <git@mpopp.net>
 * return: float   distance between location 1 and location 2 in kilometers
 */
function AstronomyLibs_Distances_distanceBetween(location1, location2) {

    /*
        $location1Coordinates = $location1->getLocation();
        $location2Coordinates = $location2->getLocation();
        $lat1 = $location1Coordinates['latitude'];
        $lon1 = $location1Coordinates['longitude'];
        $lat2 = $location2Coordinates['latitude'];
        $lon2 = $location2Coordinates['longitude'];

        return self::EARTH_RADIUS *
               (acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
                     cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad(abs($lon2 - $lon1)))));
    */
}

/*
 * mi2km(mi)
 *
 * convert miles to kilometers
 *
 * param: float mi value in miles
 * author: Markus Popp <git@mpopp.net>
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
 * return: float   equivalent value in parsecs
 */
function AstronomyLibs_Distances_ly2pc(ly) {
    return ly / PC2LY;
}