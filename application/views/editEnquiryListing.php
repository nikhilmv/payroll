<?php
$id = $EnquiryInfo->id;
$brp_id = $EnquiryInfo->brp_id;
$client_id = $EnquiryInfo->client_id;
$contact_person_id = $EnquiryInfo->contact_person_id;
$project_title = $EnquiryInfo->project_title;
$category_id = $EnquiryInfo->category_id;
$deadline = $EnquiryInfo->deadline;

?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>Edit Enquiry 

        <small> Edit Enquiry</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

             
                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter Enquiry Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form name="form" action="<?php echo base_url() ?>Enquiries/editEnquiryListingNew" method="post" id="editEnquiry" enctype="multipart/form-data" > 

				
				 
						<!-- /.box-body -->
						
						
						
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">BRP&nbsp;&nbsp;&nbsp;</label>
									   <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />
                                     <select id="brp_id" name="brp_id" style="width:72%;" class="form-control required" <?php if($roleId==2){echo 'readonly';}?>>
									   <?php if($roleId==1){ ?>
									   <option value="">Select BRP</option>
									   <?php } ?>
										
					<?php 					
                   
                        foreach($BRPInfo as $record)

                        {
						if($userId==$record->userId || $roleId == 1)
						{
					?>
		<option value="<?php echo $record->userId ?>" <?php if($userId==$record->userId || $record->userId==$brp_id){echo 'selected';}?>><?php echo $record->name ?>													</option>

										<?php
										}
										 }?>

										</select>
										
                                    </div>
                                    
                                </div>
                                
                            </div>
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client"> Brand &nbsp;&nbsp;&nbsp;</label>
                                       <select id="client_id" name="client_id" style="width:72%;" class="form-control">
									   <option value="Select">Select Brand</option>
										
					<?php 					
                   
                        foreach($clientInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>" <?php if( $record->id==$client_id){ echo "selected";} ?>><?php echo $record->name ?></option>

										<?php }?>

										</select>
                                    </div>
                                </div>
								</div>
								
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person &nbsp;&nbsp;&nbsp;</label>
										
										 <select id="contact_person_id" name="contact_person_id" style="width:72%;" class="form-control">
									   <option value="Select">Select Contact Person</option>
										
					<?php 					
                   
                        foreach($contactpersonInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>" <?php if( $record->id==$contact_person_id){ echo "selected";} ?>><?php echo $record->name ?>
										</option>

										<?php }?>

										</select>
										 
                         
                                    </div>
                                </div>
								
								
								
                                    
                            </div>
							
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="project_title">Project Title</label>

 <input type="text" class="form-control required" id="project_title" name="project_title" maxlength="128" style="width:72%;" value="<?php echo $project_title; ?>" >
                                        										
								
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
									 <label for="category">Category &nbsp;&nbsp;</label>
									
                                         <select id="category_id" name="category_id" style="width:72%;" class="form-control" >
										
					<?php 					
                   
                        foreach($categoryInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>" <?php if( $record->id==$category_id){ echo "selected";} ?>><?php echo $record->category_name ?></option>

										<?php }?>

										</select>
                                        										
								
                                    </div>
                                </div>
                           </div>
						   
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Deadline</label>

 <input type="date" class="form-control required" id="deadline" name="deadline" maxlength="128" style="width:72%;" value="<?php echo $deadline; ?>">
                                        										
								
                                    </div>
                                </div>
                           </div>
						   
                            
                        </div>

    

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