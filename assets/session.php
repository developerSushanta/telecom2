<?php
	session_start();

	$sessionData['loginstat']			= $_SESSION['loginstat'];
	$sessionData['userID'] 				= $_SESSION['userID'];
	$sessionData['userName']			= $_SESSION['userName'];
	$sessionData['userFullName']		= $_SESSION['userFullName'];
	$sessionData['userType']			= $_SESSION['userType'];
	$sessionData['imageTitle']			= $_SESSION['imageTitle'];
	$sessionData['logintime']			= $_SESSION['logintime'];
	$sessionData['ipAddr']				= $_SESSION['ipAddr'];
	$sessionData['sessionID']			= $_SESSION['sessionID'];		// 'log_sess_id' in 'login' table
	$sessionData['fiscalYearID']		= $_SESSION['fiscalYearID'];	// 'acam_id' in 'acam_years' table
	
	echo json_encode($sessionData);
?>