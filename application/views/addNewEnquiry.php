<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Enquiry Management
        <small>Add New Enquiry</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Enquiry Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form name="form" id="addEnquiry" action="<?php echo base_url() ?>Enquiries/addNewEnquiry" method="post"  enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">BRP&nbsp;&nbsp;&nbsp;</label>
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
										<option value="<?php echo $record->userId ?>" <?php if($userId==$record->userId){echo 'selected';}?>><?php echo $record->name ?></option>

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
                                       <select id="client_id" name="client_id" style="width:72%;" class="form-control required">
									   <option value="">Select Client</option>
										
					<?php 					
                   
                        foreach($clientInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>

										<?php }?>

										</select>
                                    </div>
                                </div>
								</div>
								
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person &nbsp;&nbsp;&nbsp;</label>
										
										 <select id="contact_person_id" name="contact_person_id" style="width:72%;" class="form-control required">
									   <option value="">Select Contact Person</option>
										
					<?php 					
                   
                        foreach($contactpersonInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>

										<?php }?>

										</select>
										 
                         
                                    </div>
                                </div>
								
								
								
                                    
                            </div>
							
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="project_title">Project Title</label>

 <input type="text" class="form-control required" id="project_title" name="project_title" maxlength="128" style="width:72%;">
                                        										
								
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
									 <label for="category">Category&nbsp;&nbsp;</label>
									
                                         <select id="category_id" name="category_id" style="width:72%;" class="form-control required">
										<option value="">Select Category</option>
					<?php 					
                   
                        foreach($categoryInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>"><?php echo $record->category_name ?></option>

										<?php }?>

										</select>
                                        										
								
                                    </div>
                                </div>
                           </div>
						   
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Deadline</label>

 <input type="date" class="form-control required" id="deadline" name="deadline" maxlength="128" style="width:72%;">
                                        										
								
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

<script type='text/javascript'>
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
                
                // client change
                $('#project_number_id').change(function(){
                    var project_number_id = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>DeliveryShedule/getClientDetails',
                        method: 'post',
                        data: {project_number_id: project_number_id},
                        dataType: 'json',
                        success: function(response){

                            // Remove options
                            
                           // $('#sel_depart').find('option').not(':first').remove();

                            // Add options
							var toAppend = '';
							 $('#contact_person_id').empty();
                            $.each(response,function(index,data){
							var x=parseInt(data['client']);
							
							
							
							var contact_id=parseInt(data['contactPerson']);
							
							var name=data['name'];
							
							toAppend += '<option value="'+ contact_id +'">'+name+'</option>';

							
							$("#client_id").val(x);
                               
                            });
							$('#contact_person_id').append(toAppend);
                        }
                    });
                });
                
                // contact change
                $('#client_id').change(function(){
                    var client_id = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>Enquiries/getContactDetails',
                        method: 'post',
                        data: {client_id: client_id},
                        dataType: 'json',
                        success: function(response){
						
						console.log(response);
						var toAppend = '';
						 $('#contact_person_id').empty();
                            // Remove options
                            
                           // $('#sel_depart').find('option').not(':first').remove();

                            // Add options
							
                            $.each(response,function(index,data){
							toAppend += '<option value="'+ data.id +'">'+data.name+'</option>';
						 
							 	
	
                               
                            });
							 $('#contact_person_id').append(toAppend);
                        }
                    });
                });
			
                
            });
        </script>
