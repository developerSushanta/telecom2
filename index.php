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
	<title> Welcome To Bluetel</title>
</head>
<body>
	<!-- **** HEADER SECTION **** -->
	<?php 
		include 'includes/header.php';
 	?>
 	<?php 
 		include "includes/meta.php";
 	 ?>

<!-- ****** BANNER PART ****** -->
<div class="banner-wrapper">
	<div class="banner">
		<img src="images/1.jpg" class="active">
		<img src="images/5.jpg">
		<img src="images/4.jpg">
	</div>
	<div class="leftArrow" onclick="changeSlide('prev')">
		<span class="arrow arrowLeft"></span>
	</div>
	<div class="rightArrow" onclick="changeSlide('next')">
		<span class="arrow arrowRight"></span>
	</div>
	<div class="text">
		<div class="textTop">
			<h1>Telecom</h1>
		</div>
		<div class="textBottom">
			<h2>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</h2>
			<h3>The purpose of lorem ipsum is to create a natural looking block of text</h3>
		</div>
	</div>
</div>

<!-- ****** CARD MODEL PART ****** -->
<div class="card-wrapper">
	<div class="card">
		<div class="container" style="background-color: #50B33C">
			<div class="icon">
				<i class="fy fy-telecom"></i>
			</div>
			<div class="heading">Product One</div>
			<div class="details">
				<p>We start all of our projects by positioning you for the right audience.</p>
			</div>
		</div>
		<div class="container" style="background-color: #F9AB46">
			<div class="icon">
				<i class="fy fy-telecom"></i>
			</div>
			<div class="heading">Product One</div>
			<div class="details">
				<p>We start all of our projects by positioning you for the right audience.</p>
			</div>
		</div>
		<div class="container" style="background-color: #D35AE1">
			<div class="icon">
				<i class="fy fy-telecom"></i>
			</div>
			<div class="heading">Product One</div>
			<div class="details">
				<p>We start all of our projects by positioning you for the right audience.</p>
			</div>
		</div>
		<div class="container" style="background-color: #5A87E1">
			<div class="icon">
				<i class="fy fy-telecom"></i>
			</div>
			<div class="heading">Product One</div>
			<div class="details">
				<p>We start all of our projects by positioning you for the right audience.</p>
			</div>
		</div>
	</div>
</div>

<!-- ****** SERVICE PART ****** -->
	<div class="service-wrapper">
		<div class="service">
			<div class="title">Services</div>
			<div class="topContainer">
				<div class="content">
					<figure>
						<img src="images/10.jpg">
					</figure>
					<div class="text">
						<h3>Service One</h3>
					</div>
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
				</div>
				<div class="content">
					<figure>
						<img src="images/13.jpg">
					</figure>
					<div class="text">
						<h3>Service Two</h3>
					</div>
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
				</div>
				<div class="content">
					<figure>
						<img src="images/12.jpg">
					</figure>
					<div class="text">
						<h3>Service Three</h3>
					</div>
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
				</div>
			</div>
			<div class="bottomContainer">
				<div class="content">
					<figure>
						<img src="images/7.jpg">
					</figure>
					<div class="text">
						<h3>Service Four</h3>
					</div>
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
				</div>
				<div class="content">
					<figure>
						<img src="images/10.jpg">
					</figure>
					<div class="text">
						<h3>Service Five</h3>
					</div>
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- ****** PRODUCT PART ****** -->
	<div class="product-wrapper">
		<div class="product">
			<div class="title">Products</div>
			<div class="container">
				<div class="content">
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
					<div class="heading">Product One</div>
					<div class="details">
						<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
					</div>
				</div>
				<div class="content">
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
					<div class="heading">Product Two</div>
					<div class="details">
						<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
					</div>
				</div>
				<div class="content">
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
					<div class="heading">Product Three</div>
					<div class="details">
						<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
					</div>
				</div>
				<div class="content">
					<div class="icon">
						<i class="fy fy-telecom"></i>
					</div>
					<div class="heading">Product Four</div>
					<div class="details">
						<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- ****** TEST PART ****** -->
	<div class="test-wrapper">
		<div class="test">
			<div class="title">Issues</div>
			<div class="carousel">
				<img src="images/19.jpg" class="current">
				<img src="images/20.jpg">
				<img src="images/21.jpg">
			</div>
			<div class="leftArrow" onclick="moveSlide('prev')">
				<span class="arrow arrowLeft"></span>
			</div>
			<div class="rightArrow" onclick="moveSlide('next')">
				<span class="arrow arrowRight"></span>
			</div>
			<div class="text">
				<div class="detail now">
					<h2> Test Code One</h2>
					<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
				</div>
				<div class="detail">
					<h2> Test Code Two</h2>
					<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
				</div>
				<div class="detail">
					<h2> Test Code Three</h2>
					<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
				</div>
			</div>
		</div>
	</div>

<!-- ****** FOOTER PART ****** -->
	<?php 
	 	include "includes/footer.php";
	 ?>
</body>
</html>
