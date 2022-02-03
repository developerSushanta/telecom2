<?php

	// session_start();
	// require_once $_SERVER['DOCUMENT_ROOT'].'/assets/db.php';
	// require_once $_SERVER['DOCUMENT_ROOT'].'/assets/defCode.php';
	
	// if(!isset($_SESSION['sessionStat']) || $_SESSION['sessionStat']!=1)
	// {
	// 	session_destroy();
	// 	header('Refresh:1;URL=event.php');
	// 	die();
	// }
	// $loggedUserTypeID	= $_SESSION['loggedUserTypeID'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Telecom | Events</title>
	<?php include('./includes/meta.php'); ?>
</head>
<body>
<!-- =================================================================================================================
Header Section:                                                                                                       
======================================================================================================================-->
	<?php include('./includes/header.php'); ?>
	
<!-- =================================================================================================================
Content Section:	02                                                                                                
======================================================================================================================-->
	<div class="content-wrapper clearfix">
		<div class="left-panel clearfix">
			<div id="mainMenu" class="menu clearfix">
				<!-- <?php include('./includes/menu.inc.php'); ?> -->
			</div>
			<div class="row clearfix">
				<div class="error-msg"></div>
			</div>
		</div>
		<div class="content-panel clearfix">
			<div class="content-panel-header clearfix">
				<div class="flex-row clearfix">
					<div class="module-title">event dashboard</div>
				</div>
				<div class="flex-row clearfix">
					<div class="filter-block">
						<div class="filter-sub-block filter-rigid gradient-steen-gray">								
							<div class="filter-icon">
								<span><i class="fy fy-filter"></i></span>
								<span>Filters</span>
								<div class="clearfix"></div>
							</div>	
						</div>
						<div class="filter-sub-block filter-flex">
							<div class="filter-box">
								<select id="filterStatus">
									<option disabled selected>By Status ...</option>
									<option value="All">All</option>
									<option value="Scheduled">Scheduled</option>
									<option value="Completed">Completed</option>
									<option value="Cancelled">Cancelled</option>
								</select>
							</div>
							<div class="filter-box">
								<span id="filterButton" class="bttnFilter">Go</span>									
							</div>
							<div class="filter-box">
								<span id="resetButton" class="bttnFilter">Reset</span>
							</div>
						</div>									
					</div>
				</div>
				<div class="flex-row clearfix">
					<div class="filter-block">
<?php
			if($loggedUserTypeID == 1 || $loggedUserTypeID == 2)
			{
				echo '	<div class="filter-sub-block filter-flex">
							<div id="newEvent" class="bttnSPCCTA"><div><i class="fy fy-plus"></i></div><div><span>Add Event</span></div></div>
						</div>';
			}
?>					
						<div class="filter-sub-block filter-flex">
							<div id="paginator" class="data-pagination">											
								<div class="page-show">
									<span></span> 
								</div>
							</div>
						</div>
						<div class="filter-sub-block filter-flex">
							<div class="module-search-box">
								<input id="searchField" name="searchMember" type="text" placeholder="Search here...">
								<button id="searchButton" class="iconButton" data-tooltip-text="Search"><i class="fy fy-magnify"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="flex-row clearfix">
					<div id="status-strip" class="clearfix">
						<span></span>
						<button id="exitStatusStrip"><i class="fy fy-multiply"></i></button>
					</div>
				</div>
			</div>
			<div class="content-panel-body clearfix">						
				<div class="data-container clearfix">
				</div>						
			</div>
			<div id="sideModalContainer" class="side-modal-container">
				<div class="side-modal">					
					<div class="side-modal-close"><i class="fy fy-multiply"></i></div>
					<div class="side-modal-head"><h2></h2></div>
					<div class="side-modal-body"></div>
				</div>
			</div>
		</div>
	</div>
	
<!-- ========================================================================================================================================================== -->
	<?php include('./includes/footer.php'); ?>
</body>
</html>
