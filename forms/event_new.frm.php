<?php
	$htmlOP		= "";
	
	$htmlOP	='	<div id="profile-container" class="clearfix">
					<div class="form-container">
						<form name="newEvent" method="post" enctype="multipart/form-data">								
							<div class="flex-row clearfix">
								<div class="col-fill">
									<div class="row clearfix">
										<span class="form-label" data-label="*">EVENT TITLE</span>
										<span class="counter">(0 / 300)</span>
									</div>
									<div class="row clearfix">
										<input name="evtTitle" type="text" class="required" maxValue="300">
										<span class="error-box"></span>
									</div>
								</div>
							</div>
							<div class="flex-row clearfix">
								<div class="col-fill">
									<div class="row clearfix">
										<span class="form-label" data-label="">BILLING STATEMENT</span>
										<span class="counter">(0 / 120)</span>
									</div>
									<div class="row clearfix">
										<input name="evtBillTitle" type="text" maxValue="120">
										<span class="error-box"></span>
									</div>
								</div>
							</div>
							<div class="flex-row clearfix">
								<div class="col-fill">
									<div class="row clearfix">
										<span class="form-label" data-label="*">EVENT DESCRIPTION</span>
										<span class="counter">(0 / 1000)</span>
									</div>
									<div class="row clearfix">
										<textarea name="evtDescript" class="required" maxValue="1000"></textarea>
										<span class="error-box"></span>
									</div>
								</div>
							</div>
							<div class="flex-row clearfix">
								<div class="col-fill">
									<div class="row clearfix">
										<span class="form-label" data-label="*">LOCATION</span>
										<span class="counter">(0 / 200)</span>
									</div>
									<div class="row clearfix">
										<input name="evtLocation" type="text" class="required" maxValue="200">
										<span class="error-box"></span>
									</div>
								</div>
							</div>
							<div class="flex-row clearfix">	
								<div class="col-33pc">
									<div class="row clearfix">
										<span class="form-label" data-label="*">CATEGORY</span>
									</div>
									<div class="row clearfix">
										<select name="evtCategory" class="required">
											<option value="Select an option..">Select an option..</option>
											<option value="conference">Conference</option>
											<option value="campaign">Campaign</option>
											<option value="deputation">Deputaion</option>										
											<option value="seminar">Seminar</option>
											<option value="Other">Other</option>
										</select>
										<span class="error-box"></span>
									</div>
								</div>
								<div class="col-33pc">
									<div class="row clearfix">
										<span class="form-label" data-label="*">VISIBILITY</span>
									</div>
									<div class="row clearfix">
										<select name="evtVisibility" class="required">
											<option value="Select an option..">Select an option..</option>
											<option value="Internal">Internal</option>
											<option value="Global">Global</option>
										</select>
										<span class="error-box"></span>
									</div>
								</div>
							</div>
							<div class="flex-row clearfix">
								<div class="col-33pc">
									<div class="row clearfix">
										<span class="form-label" data-label="*">START DATE</span>
									</div>
									<div class="row clearfix">
										<input id="newEvtStartDate" name="evtStartDate" class="inpCalendar required" type="text" nature="date">
										<span class="error-box"></span>
									</div>
								</div>
								<div class="col-33pc">
									<div class="row clearfix">
										<span class="form-label" data-label="">END DATE</span>
									</div>
									<div class="row clearfix">
										<input id="newEvtEndDate" name="evtEndDate" class="inpCalendar" type="text" nature="date">
										<span class="error-box"></span>
									</div>
								</div>								
							</div>
							<div id="ledgerRow" class="row clearfix">
								<div class="row">
									<input id="chkDonation" type="checkbox" name="donationCheck" value="yes">
									<label class="chkBoxLabel" for="chkDonation">Donation Collect ?</label>
								</div>
								<div class="row">
									<input id="chkSeminar" type="checkbox" name="seminarCheck" value="yes">
									<label class="chkBoxLabel" for="chkSeminar">Seminar Fees ?</label>
								</div>
								<div class="row">
									<input id="chkAdvertisement" type="checkbox" name="advertiseCheck" value="yes">
									<label class="chkBoxLabel" for="chkAdvertisement">Advertisement Collection ?</label>
								</div>
							</div>													
							<div class="flex-row flex-nowrap flex-center clearfix">
								<input class="bttnPositive" type="submit" value="SUBMIT"/>
								<input class="bttnNegative" type="reset" value="RESET"/>
							</div>
							<div class="row clearfix">
								<div id="user-error" class="error-msg"><span></span></div>
							</div>
							<div class="clearfix"></div>
						</form>								
					</div>
				</div>';
	echo $htmlOP;
?>