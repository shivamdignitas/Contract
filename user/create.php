<?php
	include '../api/common/common.php';

	session_start();
	if(empty($_SESSION) || !isset($_SESSION['logged_in']) || ($_SESSION['logged_in']!=true) || ($_SESSION['type']!=1)) {
		header("Location: ".$host_url."index.php");
		die();
	}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include '../includes/user-header-path.php';?>
</head>

<body>

	<div class="container-fluid create">
		
		<?php include '../includes/nav.php'; ?>

		<div class="main-container">
			<div class="row sub-heading">
				<div class="col-sm-12">
					<h2>Create a new Contract</h2>
				</div>
			</div>
			<div class ="create_con">
			<div class="success-alert-overlay">
				<div class="row success-alert">
					<div class="col-sm-12">
						<div class="alert alert-success" role="alert">
							<h4 class="alert-heading">Well done!</h4>
							<p>Contract has been successfully added.</p>
							<hr>
							<p class="mb-0">
								<a id="downpdf_link" target="_blank">Click here</a> to download the PDF.</p>
						</div>
					</div>
				</div>
			</div>
		</div>	

			<form id="create_contract" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-sec entclint">

							<h3>Enter the Client Details</h3>

							<div class="chosbox">
								<p>Choose from Existing Client: </p>

								<select id="existing_client_list" class="nav nav-pills">
								</select>
							</div>

							<div class="addnewbox">

								<p>Or Add New: </p>

								<ul>
									<li>
										<label for="client_name">Client Name<span style="color:red">*</span></label>
										<input type="text" id="client_name" name="client_name" required>
									</li>

									<li>
										<label for="client_spoc">Client SPOC<span style="color:red">*</span></label>
										<input type="text" id="client_spoc" name="client_spoc" required>
									</li>
									<li>
										<label for="client_contact_no">Client Contact Number<span style="color:red">*</span></label>
										<input type="text" id="client_contact_no" name="client_contact_no" required>
									</li>
									<li>
										<label for="client_pan">Client PAN<span style="color:red">*</span></label>
										<input type="text" id="client_pan" name="client_pan" size='10' required>
									</li>
									<li>
										<label for="client_GSTN">Client GSTN<span style="color:red">*</span><span style="color:red">*</span></label>
										<input type="file" id="client_gstn_upload">
										<input type="hidden" id="client_gstn" name="client_gstn" required>
										<input type="hidden" id="gstn_name" name="gstn_name">
										<br />
										<a id='gstn_preview' download='' href=''></a>
									</li>
									<li>
										<label for="client_billing_address">Client Billing Address<span style="color:red">*</span></label>
										<input type="text" id="client_billing_address" name="client_billing_address" required>
									</li>
									<li>
										<label for="client_payment_terms">Client Payment Terms (enter the number of days only)</label>
										<input type="text" id="client_payment_terms" name="client_payment_terms" required>
									</li>
									<li>
										<label for="client_email_address">Client Email id<span style="color:red">*</span></label>
										<input type="text" id="client_email_address" name="client_email_address" required>
									</li>

									<input type="hidden" id="client_id" name="client_id" value="">
									<br>
									<br>
								</ul>
							</div>

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">

						<div class="form-sec">
							<div class="addnewbox">

								<h3>Contract Details</h3>

								<ul>
									<li>
										<label for="contract_name">Contract Name</label>
										<input type="text" id="contract_name" name="contract_name" required>
									</li>
									<li>
										<label for="contract_type">Contract Type</label>
										<select id="contract_type" name="contract_type">
											<option value="1">Digital Marketing</option>
											<option value="2">Techincal</option>
											<option value="3">Both</option>
										</select>
									</li>

									<li>
										<label for="contract_start_date">Contract Start Date</label>
										<input readonly size="16" type="text" data-date="" data-link-format="yyyy-mm-dd" class="form_datetime control" required name="contract_start_date"
										 id="contract_start_date">
									</li>
									<li>
										<label for="contract_end_date">Contract End Date</label>
										<input readonly size="16" type="text" data-date="" data-link-format="yyyy-mm-dd" class="form_datetime control" required name="contract_end_date"
										 id="contract_end_date">
									</li>
									<li>
										<label for="contract_description">Contract Description</label>
										<textarea type="text" id="contract_description" name="contract_description"></textarea>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">

						<div class="form-sec seobox">

							<h3>Scope Details</h3>

							<ul id="scope_list" name="contract_scope"></ul>

						</div>

					</div>
				</div>
				
						<div class="form-sec">
							<h3>Legal</h3>
							<ul id="legal" name="legal_terms"></ul>
						</div>
						<div class="form-sec">
                            <h3>Service Level Agreement</h3>
                            <ul id="sla" name="sla_terms"></ul>
                        </div>
						<div class="clr"></div>
						<div class="upsubtn">
							<input type="submit" id="submit" value="Create" class="btn btn-primary">
						</div>
				


			</form>
		</div>

	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="../js/common.js"></script>
	<script src="../js/app_create.js"></script>

</body>

</html>