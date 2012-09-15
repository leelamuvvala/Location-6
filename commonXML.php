<?php

// Retrieve the data.txt file into organized data.xml

function ReverseToXML($filePath)
{
	if(!file_exists($filePath))
	{
		echo("Can't find the data file!");
	}
	
	else
	{
		$fp= fopen($filePath, "r");
		
		// file handle for data.xml.
		$fw= fopeb($filePath, "w");
		
		while(!(feof($fp))
		{
			$strParse= explode("#", fgets($fp));
			
			// using php to tranfer all the string into xml
			// 
		}
		
		fclose($fp);
		fclose($fw);
	}
	
}

?>