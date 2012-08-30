<?php

include('VisitEntry.php');

// convert a standard string into a location visitEntry Object
function stringToVE($szLocation)
{
	if($szLocation!="")
	{
		$ve= new VisitEntry();
		$arrar_ve= explode($ve, "#");
		$ve->szIPAddress= $arrar_ve[0];
		$ve->szCountry= $arrar_ve[1];
		$ve->szCity= $arrar_ve[2];
		$ve->szDate= $arrar_ve[3];
		$ve->szLocation= $arrar_ve[4];
		
		return $ve;
	}
	else
		return null; 
}

// Take one parameter

function loadFromText($filePath)
{
	$array_locations= array();
	
	if(file_exists($filePath))
	{
		echo("Can't find the data file!");
	}
	else
	{
		
		// read the text file
		$fp= fopen($filePath, "r");
		
		while(!(feof($fp)))
		{
			$szLocation= fgets($fp);
			//echo $text;

			$ve= new VisitEntry();
			$ve= stringToVE($szLocation);
			
			return $ve;
		} 

		
		foreach($array_location as $location)
		{
			array_push($array_location, $location);
		}
		
		return $array_location;
	}
}


// write one time to the end of the file
// treate the $location as a string

function insertOneLocation($location)
{
	
}


?>