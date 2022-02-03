<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/assets/db.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/assets/defCode.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/lib/session.php';
	$htmlCode	="";
	
	if(isset($_GET["issue"]))
	{
		$issueID	= strip_tags(trim($_GET["issue"]));
		/*--------------------------------------------
		###	Decrypt GET data
		----------------------------------------------*/
		$issueID	= decryptUID($issueID,KEYCODE,IV);
		
		/*--------------------------------------------
		###	FETCH : Fetch issue data
		----------------------------------------------*/
		$statement	= "	SELECT
							issue_description,
							issue_vol,
							issue_serial_no,
							issue_no,
							issue_cover_url,
							issue_front_matter_url,
							issue_back_matter_url
						FROM
							issues
						WHERE
							issue_id = :issueID";
		$qryIS		= $dbh -> prepare($statement);
		$qryIS		-> bindValue(':issueID',(int)$issueID,PDO::PARAM_INT);
		$qryIS		-> execute();
		$rIS		= $qryIS -> fetch(PDO::FETCH_ASSOC);
		
		/*--------------------------------------------
		###	FETCH : Fetch articles
		----------------------------------------------*/
		$statement	= "	SELECT
							article_id,
							article_title,
							article_image_url
						FROM
							articles
						WHERE
							issue_id = :issueID
						ORDER BY article_order ASC";
						
		$qryART		= $dbh -> prepare($statement);
		$qryART		-> bindValue(':issueID',(int)$issueID,PDO::PARAM_INT);
		$qryART		-> execute();
		$rART		= $qryART -> fetchAll(PDO::FETCH_ASSOC);
		
	}
	else
	{
		header('Refresh:1;URL=issues.php');
		die();
	}
	
/*===========================================================================================================
######	CUSTOM FUNCTIONS
=============================================================================================================*/
	/*---------------------------------------------------
	####	Encryption/Decryption :: Decryption          
	-----------------------------------------------------*/
	function decryptUID($id,$key,$iv)
	{
		$decrypted	= openssl_decrypt(hex2bin($id),'AES-128-CBC',$key,true,$iv);
		return $decrypted;
	}
	
	/*---------------------------------------------------
	####	Encryption/Decryption :: Encryption
	-----------------------------------------------------*/
	function encryptUID($id,$key,$iv)
	{	
		$encrypted 	= bin2hex(openssl_encrypt($id,'AES-128-CBC',$key,true,$iv));
		return $encrypted;
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>About Trivium Journal</title>

<?php include('./view/meta.php'); ?>
<script src="./scripts/about.js" type="text/javascript"></script>
</head>
<body>
<!-- =========================================================================================================================================================================
Header Section:
============================================================================================================================================================================ -->
	<?php include('./view/header.php'); ?>
	
<!-- =========================================================================================================================================================================
########	Banner Section:
============================================================================================================================================================================ -->	
	<div id="banner-wrapper" class="clearfix">
		<div id="banner" class="clearfix">
			<div class="banner-frame">
				<div class="banner-frame-content-image">
					<img src="./images/banner-about.jpg">
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
					<h1 class="main-title">Trivium : Vol - <?php echo $rIS["issue_vol"]; ?> : No - <?php echo $rIS["issue_serial_no"]; ?> : Issue - <?php echo $rIS["issue_no"]; ?></h1>
				</div>
				<div class="row clearfix">
					<span class="body-text"><?php echo $rIS["issue_description"]; ?></span>
				</div>
				<div class="row clearfix">
					<span class="body-text">Readers can find front matter and back matters of the issue by clicking respective buttons:</span>
				</div>
				<div class="row clearfix">
					<div class="bttnBlock">		
						<a class="bttnCTA" href="/inventory/issues/<?php echo $rIS["issue_front_matter_url"]; ?>" target="_BLANK">Front Matter</a>
						<a class="bttnCTA" href="/inventory/issues/<?php echo $rIS["issue_back_matter_url"]; ?>" target="_BLANK">Back Matter</a>
					</div>
				</div>
			</div>
			<div class="sideContent rightbar order02">
				<div class="sideBox">
					<div class="sideBoxBody clearfix">
						<div class="ad-image-container">
							<img src="images/covers/<?php echo $rIS["issue_cover_url"]; ?>">
						</div>					
					</div>									
				</div>			
			</div>
		</div>
		<div class="flex-content flex-sp-wrap clearfix">
			<div class="flex-row flex-xl-wrap flex-sp-wrap clearfix">
<?php
	$html	= "";
	foreach($rART AS $r)
	{		
		$encArtID	= encryptUID($r["article_id"],KEYCODE,IV);
		/*-------------------------------------------------
		###	Fetch Author Details
		---------------------------------------------------*/
		$statement	= "	SELECT 
							GROUP_CONCAT(A.author_name) AS AUTHS 
						FROM 
							authors AS A 
						WHERE A.author_id IN (SELECT AA.author_id FROM article_author AS AA WHERE AA.article_id = :artID)";						
		$qryAUT		= $dbh -> prepare($statement);
		$qryAUT		-> bindValue(':artID',(int)$r["article_id"],PDO::PARAM_INT);
		$qryAUT		-> execute();
		$rAUT		= $qryAUT -> fetch(PDO::FETCH_ASSOC);
		
		$html.='<div class="flex-xl-col flex-xl-col-wd-33p flex-sp-col-wd-full flex-xl-bottom-margin">
			 		<div class="issue-container">
			 			<div class="contentBlock">
			 				<div class="issue-image">
			 					<img src="images/covers/'.$r["article_image_url"].'">
			 					<div class="issue-auth-block">
			 						<span>Author:</span>
			 						<span>'.$rAUT["AUTHS"].'</span>
			 					</div>
			 				</div>
			 				<div class="issue-descriptor">
			 					<h3 class="title-sub-title">'.$r["article_title"].'</h3>
			 				</div>
			 			</div>
			 			<div class="bttnBlock">		
			 				<a class="bttnCTA" href="/article.php?article='.$encArtID.'">Read Article</a>
			 			</div>	
			 		</div>
			 	</div>';
	}
	
	echo $html;

?>				
			</div>			
		</div>
	</div>
<!-- =========================================================================================================================================================================
########	Footer
============================================================================================================================================================================ -->	
	<?php include('./view/footer.php'); ?>
</body>
</html>