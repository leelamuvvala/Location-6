<?php

class VisitEntry
{
	var $szIPAddress;
	var $szCountry;
	var $szCity;
	var $szLocation;
	var $szDate;
	
	
	function VEToString()
	{
		//var $szVE="";
		

		$szVE= $this->szIPAddress."#".$this->szCountry."#".$this->szCity."#".$this->szDate."#".$this->szLocation;
		return $szVE;
		
	}
	
}

?>