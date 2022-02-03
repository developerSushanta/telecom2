<?php 

	require_once $_SERVER['DOCUMENT_ROOT'].'/assets/db.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/assets/defCode.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/lib/session.php';
	$htmlCode	="";
	
	$statement 	= '	SELECT
						issue_id,
						issue_description,
						issue_vol,
						issue_serial_no,
						issue_no,
						issue_year,
						issue_month,
						issue_cover_url,
						issue_pdf_url
					FROM
						issues
					ORDER BY issue_id DESC';
						
	$qryIssue	= $dbh -> prepare($statement);
	$qryIssue 	-> execute();
	$rsIssue	= $qryIssue -> fetchAll(PDO::FETCH_ASSOC);

/*===============================================================================================================
#### CUSTOM FUNCTION
=================================================================================================================*/	
	function encryptUID($id,$key,$iv)
	{	
		$encrypted 	= bin2hex(openssl_encrypt($id,'AES-128-CBC',$key,true,$iv));
		return $encrypted;
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Issues</title>
<?php include('./includes/meta.php'); ?>
<script src="./scripts/editor.js" type="text/javascript"></script>
</head>
<body>
<!-- =========================================================================================================================================================================
Header Section:
============================================================================================================================================================================ -->
	<?php include('./includes/header.php'); ?>
	
<!-- =========================================================================================================================================================================
########	Banner Section:
============================================================================================================================================================================ -->	
	<!-- <div id="banner-wrapper" class="clearfix">
		<div id="banner" class="clearfix">
			<div class="banner-frame">
				<div class="banner-frame-content-image">
					<img src="./images/banner-editorial.jpg">
				</div>
			</div>
		</div>
		<div class="banner-overlay">
			<div class="banner-overlay-content">
				<div class="web-title">TRIVIUM</div>
				<div class="web-sub-title">A Multi disciplinary Journal of Humanities of Chandernagore College</div>
				<div class="banner-overlay-button-container">
					<a href="ethics.php" class="bttn-primary">Ethics Policy</a>
					<a href="call-for-paper.php" class="bttn-primary">Call For Papers</a>
				</div>
			</div>
		</div>
	</div> -->
	<div class="bannerImg-wrapper">
		<img src="./images/12.jpg">
		<div class="bannerImg">
			<h1>Issues</h1>
		</div>
	</div>

<!-- =========================================================================================================================================================================
Content Section: Following are the home page specific sections
1. Fixer Section provides an outlook of the theme of Bharat Tirtha Darshan where the country starts from Himalaya
2. Highlighting Mission Statement
3. Touring Zone
4. Voice of Customer
============================================================================================================================================================================ -->
	
	<div class="content-wrapper">
		<div class="flex-content flex-sp-wrap clearfix">
			<div class="mainContent order01 right-padding">
				<div class="row clearfix">
					<h1 class="main-title">Trivium Issues</h1>
				</div>
				<div class="flex-row flex-xl-wrap flex-sp-wrap flex-xl-align-left clearfix">					
<?php
	$html	= "";
	foreach($rsIssue AS $r)
	{
		$issueID	= encryptUID($r["issue_id"],KEYCODE,IV);
		$html		.= '<div class="flex-col flex-xl-col-wd-30p flex-sp-col-wd-full flex-xl-bottom-margin">
							<div class="ad-image-container">
								<div class="contentBlock">	
									<div class="issue-image"><img src="images/covers/'.$r["issue_cover_url"].'"></div>
									<div class="issue-descriptor">
										<h3 class="title-sub-title">VOL : '.$r["issue_vol"].'</h3>
										<h3 class="title-sub-title-symbol">&#x26AB;</h3>
										<h3 class="title-sub-title">NO : '.$r["issue_serial_no"].'</h3>
										<h3 class="title-sub-title-symbol">&#x26AB;</h3>
										<h3 class="title-sub-title">ISSUE : '.$r["issue_no"].'</h3>
										<h3 class="title-sub-title-symbol">&#x26AB;</h3>
										<h3 class="title-sub-title">'.$r["issue_month"].' '.$r["issue_year"].'</h3>
									</div>
									<div class="c">		
										<a class="bttnCTA" href="view-issue.php?issue='.$issueID.'">Read more ...</a>
									</div>
								</div>									
							</div>
						</div>';
	}
	
	echo $html;

?>					
				</div>
			</div>
			<!--div class="sideContent rightbar order02">
				<div class="sideBox">
					<div class="sideBoxHead clearfix">
						<h2 class="content-header-title">CALL FOR PAPERS</h2>
					</div>
					<div class="sideBoxBody clearfix">
						<div class="row clearfix">
							<span class="body-text">
								Authors are requested to send their submissions in the prescribed format to trivium.cgc@gmail.com within the 
								<strong>30th of September, 2020</strong>. Abstracts and papers received later than this date 
								will be taken on a rolling basis and may be considered for later issues.
							</span>
							<span class="body-text">
								For more information, visit our Call for Papers page by clicking <a href="call-for-paper.php">here</a>.
							</span>
						</div>					
					</div>									
				</div>			
			</div-->
		</div>
	</div>
	
<!-- =========================================================================================================================================================================
########	Footer
============================================================================================================================================================================ -->	
	<?php include('./includes/footer.php'); ?>
</body>
</html>