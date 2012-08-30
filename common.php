<?php

include_once('VisitEntry.php');

// convert a standard string into a location visitEntry Object
function stringToVE($szLocation)
{
	if($szLocation!="")
	{
		$ve= new VisitEntry();
		
		$arrar_ve= explode("#",$szLocation);

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
// return an array list of VisitEntry objects

function loadFromText($filePath)
{
	$array_locations= array();
	
	if(!file_exists($filePath))
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
			//echo $szLocation;

			$ve= new VisitEntry();
			$ve= stringToVE($szLocation);
			
			array_push($array_locations, $ve);
			//return $ve;
		} 

		fclose($fp);
		
		return $array_locations;
	}
}


// write one time to the end of the file
// treate the $location as a string

function insertOneLocation($VELocation, $filePath)
{
	if(!file_exists($filePath))
	{
		echo("Can't find the data file!");
	}
	else
	{
		$fp= fopen($filePath, "a+");
		
		// VE object to string and write to the end of the file
		fWrite($fp, $VELocation->VEToString());
		fWrite($fp,"\n");
		fclose($fp);
	}
	
	
}


































?>