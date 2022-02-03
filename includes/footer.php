<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/assets/db.php';
	$statement		= '	SELECT
							COUNT(vis_sess_id)+1000
						FROM
							visit_session';
							
	$qryVisitor		= $dbh->prepare($statement);
	$qryVisitor 	-> 	execute();
	$rowVisitor		= $qryVisitor -> fetch(PDO::FETCH_NUM);
	$visitorCount	= $rowVisitor[0];
	
?>
<div class="footer-wrapper">
	<div class="footer">
		<div class="container">
			<h1>ABOUT</h1>
			<p>We start all of our projects by positioning you for the right audience, learning how to communicate your unique value.</p>
		</div>
		<div class="container">
			<h1>CONTACT</h1>
			<p>Bankura, Pin-700000, WB, INDIA <br>
			9876543210 <br>
			care@abc.net.in
			</p>
		</div>
		<div class="container">
			<h1>QUICK LINKS</h1>
			<div class="links">
				<ul>
					<li><i class="fy fy-next"></i> <a href="">Home</a></li>
					<li><i class="fy fy-next"></i> <a href="">About</a></li>
					<li><i class="fy fy-next"></i> <a href="">Services</a></li>
					<li><i class="fy fy-next"></i> <a href="">Products</a></li>
					<li><i class="fy fy-next"></i> <a href="">Contact</a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<h1>SOCIALS</h1>
			<div class="icon">
				<i class="fy fy-facebook" aria-hidden="true"></i>
				<i class="fy fy-twitter" aria-hidden="true"></i>
				<i class="fy fy-youtube" aria-hidden="true"></i>
				<i class="fy fy-instagram" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="upArrow">
		<a href=""><span>
			<i class="fy fy-arrow-up"></i>
		</span>
		</a>
	</div>
</div>

<div class="bottom-wrapper">
	<div class="bottom">
		<div class="left">
			<p>&copy; 2021 | All Rights Reserved </p>
		</div>

		<div class="middle">
<?php
	$html	= "";
	$html	.='	<div class="visitor-counter">
					<ul>
						<li>Visitor Count:</li>';
					
	for($i=0;$i<strlen($visitorCount);$i++)
	{
		$html	.= '	<li>'.$visitorCount[$i].'</li>';
	}
	$html	.='	<div class="clearfix"></div>
					</ul>
				</div>';
	echo $html;
?>
		</div>

		<div class="right">
			<p>Powered by </p>
		</div>
			
	</div>
</div>