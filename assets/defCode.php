<?php

	$siteURL		= "";
	
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
	{
		$siteURL 	= "https";
	}     
	else
	{
		$siteURL 	= "http"; 
	}    
  
	$siteURL 		.= "://"; 						/* Here append the common URL characters. */
	$siteURL 		.= $_SERVER['HTTP_HOST']; 		/* Append the host(domain name, ip) to the URL. */	 
	/*$link .= $_SERVER['REQUEST_URI']; 		 Append the requested resource location to the URL */
	
	/*----------------------------------------------------------------------------------------------
	####	SITE SETTINGS CODES
	------------------------------------------------------------------------------------------------*/
	define("KEYCODE","310881");
	define("IV","1041371213610241");
	/*----------------------------------------------------------------------------------------------
	####	ERROR CODES
	------------------------------------------------------------------------------------------------*/
?>