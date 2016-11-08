<?php
	//This is the config file
	
	//site status variables
	$maintenance 				= FALSE;
	
	//site definition variables
	$pretitle 					= 'Sola';
	$seperator 					= ' - ';
	$posttitle 					= 'Lands';
	$title 						= $pretitle . $seperator . $posttitle;

	define("DB_HOST", "localhost");     // The host you want to connect to.
	define("DB_USER", "root");    // The database username. 
	define("DB_PASSWORD", "");    // The database password. 
	define("DB_DATABASE", "game_data");    // The database name.
 
	define("LOGIN_CAN_REGISTER", "any");
	define("LOGIN_DEFAULT_ROLE", "member");
 
	define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
?>
