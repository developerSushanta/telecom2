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
					WHERE
						issue_status = "Current"';
						
	$qryIssue	= $dbh -> prepare($statement);
	$qryIssue 	-> execute();
	$rsIssue	= $qryIssue -> fetch(PDO::FETCH_ASSOC);
	
	$issueID	= $rsIssue["issue_id"];
	$encIssueID	= encryptUID($issueID,KEYCODE,IV);
	
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
	<title>Bluetel | About</title>
	<?php include "./includes/meta.php" ?>
</head>
<body>

				<!---------------------------------------
				**** Header Part ****
				----------------------------------------->

	<?php 
		include "./includes/header.php" 
	?>

	<!-- =======================================================================================
	#### ABOUT US PART	####
	============================================================================================ -->
				<!---------------------------------------
				**** Banner Part ****
				----------------------------------------->
	<div class="bannerImg-wrapper">
		<img src="./images/20.jpg">
		<div class="bannerImg">
			<h1>About Us</h1>
		</div>
	</div>
				<!---------------------------------------
				**** Main About Us Content ****
				----------------------------------------->
	<div class="about-wrapper">
		<div class="about">
			<div class="img">
				<img src="./images/17.jpg">
			</div>
			<h2>About Organization</h2>
			<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The purpose of lorem ipsum is to create a natural looking block of text.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The purpose of lorem ipsum is to create a natural looking block of text.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The purpose of lorem ipsum is to create a natural looking block of text. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The purpose of lorem ipsum is to create a natural looking block of text.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The purpose of lorem ipsum is to create a natural looking block of text.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The purpose of lorem ipsum is to create a natural looking block of text. </p>


			<div class="ad-image-container">
				<div class="image-block"><img src="images/covers/<?php echo $rsIssue["issue_cover_url"]; ?>"></div>
				<div class="issue-descriptor">
					<h3 class="title-sub-title">VOL : <?php echo $rsIssue["issue_vol"]; ?></h3>
					<h3 class="title-sub-title-symbol">&#x26AB;</h3>
					<h3 class="title-sub-title">NO : <?php echo $rsIssue["issue_serial_no"]; ?></h3>
					<h3 class="title-sub-title-symbol">&#x26AB;</h3>
					<h3 class="title-sub-title">ISSUE : <?php echo $rsIssue["issue_no"]; ?></h3>
					<h3 class="title-sub-title-symbol">&#x26AB;</h3>
					<h3 class="title-sub-title"><?php echo $rsIssue["issue_month"].' '.$rsIssue["issue_year"]; ?></h3>
				</div>
				<div class="bttnBlock">		
					<a class="bttnCTA" href="view-issue.php?issue=<?php echo $encIssueID; ?>">Read more ...</a>
				</div>
			</div>
		</div>
	</div>

	

	<?php 
	 	include "./includes/footer.php";
	 ?>
</body>
</html>