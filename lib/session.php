<?php
/*
$_SESSION['FISCAL_ID']			--> Current Fiscal ID;
$_SESSION['SES_ID']				-->	Current Login Session;
$_SESSION['memSessionStat']		-->	Member Login Status; 	
$_SESSION['memID']				--> Current Logged Member ID; 		
$_SESSION['memCode']			--> Current Logged Member Code; 	
$_SESSION['memName']			--> Current Logged Member Name; 	
$_SESSION['memStatus']			--> Current Logged Member Status;	
$_SESSION['memImageTitle']		--> Current Logged Member Image Title; 	
$_SESSION['memLogintime']		--> Current Logged Member Login Time; 		
$_SESSION['memIpAddr']			--> Current Logged Member IP ; 		
$_SESSION['memLoginID']			--> Current Login ID;
*/
	session_start();
	if(!isset($_SESSION['sCheck']) || $_SESSION['sCheck'] != 1)
	{	
		require_once $_SERVER["DOCUMENT_ROOT"].'/assets/db.php' ;
		date_default_timezone_set('Asia/Calcutta');
		/*-----------------------------------------------------
		### Variable Setup
		-------------------------------------------------------*/
		$curTime 			= new DateTime();
		$sessStartTime		= $curTime -> format('Y-m-d H:i:s');		
		$ipAddress			= isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';
		$visSysType			= isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
		$visPageRef			= isset($_SERVER['SCRIPT_NAME'])?$_SERVER['SCRIPT_NAME']:'';
				
		/*-----------------------------------------------------
		### DB Query : Populate visitor table
		-------------------------------------------------------*/
		$statement				='	INSERT INTO visit_session(	vis_ip_address,
																vis_sys_type,
																vis_ref_page,
																vis_sess_start_time) VALUES(:ipAddr,
																							:sysType,
																							:page,
																							:accessTime)';
		
		$qryVisitor		= $dbh ->prepare($statement);		
		$qryVisitor		->bindValue(':ipAddr',$ipAddress,PDO::PARAM_STR);
		$qryVisitor		->bindValue(':sysType',$visSysType,PDO::PARAM_STR);
		$qryVisitor		->bindValue(':page',$visPageRef,PDO::PARAM_STR);
		$qryVisitor		->bindValue(':accessTime',$sessStartTime,PDO::PARAM_STR);		
		$qryVisitor		->execute();
		$sessionID		= $dbh->lastInsertId();
		
		/*-----------------------------------------------------
		### Session Update
		-------------------------------------------------------*/
		$_SESSION['SES_ID'] 		= $sessionID;
		$_SESSION['sCheck'] 		= 1;		
		$_SESSION['SESSION_ID'] 	= session_id();
	}
	else
	{
		;
	}
?>