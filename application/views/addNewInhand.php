<?php
if (isset($InhandAmountListingInfo->id)) 
{
$inhandId = $InhandAmountListingInfo->id;
}
if (isset($InhandAmountListingInfo->amount)) 
{
$inhandAmount = $InhandAmountListingInfo->amount;
} 
if (isset($InhandAmountListingInfo->startDate)) 
{
$startDate = $InhandAmountListingInfo->startDate; 
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Settings
        <small>Settings</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Settings</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form name="form" id="" action="<?php echo base_url() ?>Expenses/addNewInhandAmount" method="post"  enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Amount</label>
                                        <input type="text" class="form-control required" id="" name="InhandAmount" value="<?php if (isset($inhandAmount)) { echo $inhandAmount; }?>" maxlength="128">
										<input type="hidden" value="<?php if (isset($inhandId)) { echo $inhandId; }?>" name="inhandId" id="inhandId" />
                                    </div>
                                    
                                </div>
								
								<div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Starting Date</label>
                                        <input type="date" class="form-control " value="<?php if (isset($startDate)) { echo $startDate; } ?>" required id="startingDate" name="startingDate">
										
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>