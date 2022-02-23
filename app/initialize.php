<?php

	// Turn on ouput buffering
	ob_start();

	// Classes
	require_once('classes/class.Ajax.php');
	require_once('classes/class.Database.php');
	require_once('classes/class.Harvest.php');
	require_once('classes/class.Harvest.Edit.php');
  require_once('classes/class.Harvest.Add.php');
	require_once('classes/class.Strain.php');
	require_once('classes/class.Strain.Add.php');
	require_once('classes/class.Destem.php');
	require_once('classes/class.Room.php');
	require_once('classes/class.Room.Add.php');
	require_once('classes/class.HarvestRoom.php');

    // Global App Fucntions
    require_once('functions.php');

	// Assign variables for global use;
    $companyName = "CC Buddy";
    $pageDescription = '';
    $pageTitle = '';

    $database = new Database();

?>
