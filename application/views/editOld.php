<?php
$userId = $userInfo->userId;
$name = $userInfo->name;
$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;

$company_name = $userInfo->company_name;
$company_address = $userInfo->company_address;
$bank_details = $userInfo->bank_details;
$paypal_email = $userInfo->paypal_email;
$logo = $userInfo->logo;

$company_phone1 = $userInfo->company_phone1;
$company_phone2 = $userInfo->company_phone2;

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Business Manager Management
        <small>Add / Edit Business Manager</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Business Manager Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
					
                    <form role="form" action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form" enctype="multipart/form-data">
                        <div class="box-body">
						<input type="hidden" id="role" name="role" value="<?php echo $roleId; ?>"> 
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile; ?>" maxlength="10">
                                    </div>
                                </div>
								
								
                            </div>
							<?php if($roleId == 1) { ?>
							
							<div class="row">
								
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Logo">Company Logo</label>
                                        <input type="file" name="userfile">
										<input type="hidden"  id="logo" placeholder="Logo" name="logo" value="<?php echo $logo; ?>">
										<?php if($logo != "") {?>
										<br><br />
										<img src="<?php echo site_url(); ?>images/<?php echo $logo; ?>" style="width: 200px;">
										<?php } ?>
                                    </div>
                                </div>
								
								
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CompanyName">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name" value="<?php echo $company_name; ?>" >
                                    </div>
                                </div>
								
								
								
								
                            </div>
							
							
							<div class="row">
							<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="CompanyAddress">Company Address</label>
                            <textarea rows="4" style="width: 100%;" class="form-control required" id="company_address" name="company_address"><?php echo $company_address; ?>

</textarea>
                                    </div>
                                </div>
								</div>
								
								<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CompanyPhone">Company Phone Number 1</label>
                                        <input type="text" class="form-control" id="company_phone1" placeholder="Company Phone Number" name="company_phone1" value="<?php echo $company_phone1; ?>" >

                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CompanyPhone">Company Phone Number 2</label>
                                        <input type="text" class="form-control" id="company_phone2" placeholder="Company Phone Number" name="company_phone2" value="<?php echo $company_phone2; ?>" >

                                    </div>
                                </div>
								</div>
								
								
								
							<div class="row">
							<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="BankDetails">Bank Details</label>
                            <textarea rows="4" id="tinymce" style="width: 100%;" class="form-control required" id="bank_details" name="bank_details"><?php echo $bank_details; ?>

</textarea>
                                    </div>
                                </div>
								</div>
								
								
								
								<div class="row">
							<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="PaypalEmail">Paypal Email</label>
                                        <input type="text" class="form-control" id="paypal_email" placeholder="Paypal Email" name="paypal_email" value="<?php echo $paypal_email; ?>" >

                                    </div>
                                </div>
								</div>
								
								<?php } ?>
								
								
							
							
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>