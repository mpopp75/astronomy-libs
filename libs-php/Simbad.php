<?php
namespace mpopp75\AstronomyLibs;

class Simbad
{
    private $xml;
    private $object;
    private $soapUrl = "http://cdsws.u-strasbg.fr/axis/services/Sesame?wsdl";
    private $xpathPrefix = "/Sesame/Target/Resolver[@name=\"S=Simbad (CDS, via client/server)\"]";

    /**
     * __construct($object)
     *
     * makes Simbad request for $object
     *
     * @param string $object astronomical object
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     */
    public function __construct($object) {

        $soapClient = new \SoapClient($this->soapUrl);
        $soapRequest = $soapClient->sesame($object, "x", true, "A");

        $this->xml = new \SimpleXMLElement($soapRequest);
        $this->object = $object;
    }

    /**
     * getOriginalName()
     *
     * get original name of queried object
     *
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return string   original name of queried object
     */
    public function getOriginalName() {
        $oname = $this->xml->xpath($this->xpathPrefix . "/oname");
        if (isset($oname[0]) && $oname[0] != $this->object) {
            $this->object = preg_replace("/^NAME /", "", $oname[0]);
        }

        return $this->object;
    }

    /**
     * getAliases()
     *
     * get array containing aliases of queried object (e.g. Sirius -> * alf CMa)
     *
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return array   aliases of queried object
     */
    public function getAliases() {
        $alias = array();
        foreach ($this->xml->xpath($this->xpathPrefix . "/alias") as $a) {
            $alias[] = $a;
        }

        return $alias;
    }

    /**
     * getCoordinates()
     *
     * get array containing stellar coordinates of queried object
     *
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return array   coordinates of queried object
     */
    public function getCoordinates() {
        $jradeg = $this->xml->xpath($this->xpathPrefix . "/jradeg");
        $jradeg = (isset($jradeg[0]) ? (float)$jradeg[0] / 15 : null);

        $jdedeg = $this->xml->xpath($this->xpathPrefix . "/jdedeg");
        $jdedeg = (isset($jdedeg[0]) ? (float)$jdedeg[0] : null);

        return array("jradeg" => $jradeg, "jdedeg" => $jdedeg);
    }

    /**
     * getSpectralType()
     *
     * get star class of queried object
     *
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return string   star class of queried object
     */
    public function getSpectralType() {
        $spType = $this->xml->xpath($this->xpathPrefix . "/spType");
        $spType = (isset($spType[0]) ? $spType[0] : null);

        return $spType;
    }

    /**
     * getDistance()
     *
     * get distance to queried object in parsec
     *
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   distance to queried object in parsec
     */
    public function getDistance() {
        $distance = $this->xml->xpath($this->xpathPrefix . "/plx/v");
        $distance = (isset($distance[0]) ? 1 / ($distance[0] / 1000) : null);

        return $distance;
    }

    /**
     * getXml()
     *
     * get the entire SOAP reply (as XML)
     *
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return string   entire SOAP reply
     */
    public function getXml() {
        return $this->xml->asXML();
    }
}