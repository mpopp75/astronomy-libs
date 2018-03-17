Astronomy Libraries
===================

This repository contains PHP and Javascript libraries useful for astronomical calculations. Since the Earth is an astronomical body too (surprise!) and many astronomical calculations require geographical parameters, a good amount of geographical libraries are included as well.

PHP libraries are stored in the libs-php directory, Javascript libraries in the libs-js directory. There are examples how to use each of the libraries in the corresponding examples-xxx directories. This is built in the form of a little website, the entry point being index.html in the root directory. A live version can be found at [https://astronomy-libs.mpopp.net](https://astronomy-libs.mpopp.net)

In most cases, PHP and Javascript libraries with the same name (e.g. Coordinates.php and coordinates.js) are (mostly) equivalents of each other, but there may be exceptions.

Requirements, support
---------------------

These libraries deliberately support only recent technology. For PHP libraries and examples, Apache 2.2+ and PHP 5.3+ are required. Supported browsers are Firefox, Google Chrome, Internet Explorer and Opera in their current versions on Linux, Windows and Android (as available).

Contributions
-------------

Contributions are very welcome. Feel free to fork, fix bugs, improve libraries and examples, write new libraries and examples, redesign, do whatever comes to mind. Pull requests are appreciated.

Libraries
---------

### Coordinates (PHP & JS)

Coordinates contains functions to convert float coordinates (geographical latitude/longitude or astronomical RE/DE coordinates) to text representation and vice versa.

### Distances (PHP & JS)

Distances contains functions to convert distance units, like kilometers, miles, astronomical units, light years and parsecs. Another function calculates the geographical distance between 2 latitude/longitude pairs (on Earth), yet another function calculates the distance between 2 points while the distance to each of the points and the angle separating is given.

### Location (PHP & JS)

Location (geographical latitude & longitude) contains a wrapper to provide a uniform format to be used by other libraries.

The Javascript version also contains a function to obtain the geographical location using the [Geolocation API](http://dev.w3.org/geo/api/spec-source.html)

### Simbad (PHP)

Simbard provides methods to query the SIMBAD Astronomical Database ([http://simbad.u-strasbg.fr/simbad/](http://simbad.u-strasbg.fr/simbad/)) using their web services at http://cdsws.u-strasbg.fr/axis/services/Sesame?wsdl
