<?php

include('ip2locationlite.class.php');
include_once('VisitEntry.php');
include_once('common.php');
 
//Load the class
$ipLite = new ip2location_lite;
$ipLite->setKey('adc052868906df816235a05f995cd0b86d59b89f424de685a98e1f6d51b806d7');
 
//Get errors and locations
$locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
$errors = $ipLite->getError();

 
//Getting the result
//echo $locations['longitude'].",".$locations['latitude'];

// Create a VisitEntry object
date_default_timezone_set("Australia/Brisbane");

$ve= new VisitEntry();
$ve->szIPAddress= $locations['ipAddress'];
$ve->szCity= $locations['cityName'];
$ve->szCountry= $locations['countryName'];
$ve->szDate= date("Y-m-d H:i:s");
$ve->szLocation= $locations['longitude'].",".$locations['latitude'];

//

//echo $ve->VEToString();


// debug
//echo loadFromText("data.txt");
//stringToVE("14.202.69.232#AUSTRALIA#PERTH#2012-08-31 05:57:10#115.833,-31.9333");
insertOneLocation($ve, "data.txt");



/*
if (!empty($locations) && is_array($locations)) {
  foreach ($locations as $field => $val) {
    //echo $field . ' : ' . $val . "<br />\n";
	
  }
}
echo "</p>\n";
*/

//dump($locations);
 
//Show errors
/*
echo "<p>\n";
echo "<strong>Dump of all errors</strong><br />\n";
if (!empty($errors) && is_array($errors)) {
  foreach ($errors as $error) {
    echo var_dump($error) . "<br /><br />\n";
  }
} else {
  echo "No errors" . "<br />\n";
}
echo "</p>\n";
*/

function dump($vars, $label = '', $return = false)
{
        if (ini_get('html_errors')) {
                $content = "<pre>\n";
                if ($label != '') {
                        $content .= "<strong>{$label} :</strong>\n";
                }
                $content .= htmlspecialchars(print_r($vars, true));
                $content .= "\n</pre>\n";
        } else {
                $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
}

?>