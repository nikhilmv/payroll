<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Project Schedule Management
        <small>Add New Schedule</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Project Schedule Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form name="form" id="addEnquiry" action="<?php echo base_url() ?>ProjectShedule/addNewProjectShedule" method="post"  enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Enquiry Number&nbsp;&nbsp;&nbsp;</label><br>
									  <select id="enquiry_id" name="enquiry_id" style="width:72%;" class="enquiry form-control">
                                       
										<option  value="">Select Enquiry</option>
											<?php 
								 			
											foreach($enquiry_details as $row)
											{
											
											  echo '<option value="'.$row->id.'">'.$row->id.'</option>';
											}
											?>
											</select>
										
                                    </div>
                                    
                                </div>
								
								<div class="col-md-6">                                

                                    <div class="form-group">
									<label for="date">Date</label>
									
									<input type="text" class="form-control required" name="date" id="date" style="width:72%;" >
									
                                    </div>
 
                                </div>
                                
                            </div>
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client"> Brand &nbsp;&nbsp;&nbsp;</label><br>
            
												<select id="client_id" name="client_id" style="width:72%;" class="form-control">
												<option  value="">Select Brand</option>
												
											<?php 					
					   
											foreach($client_details as $record)
					
											{
											?>
											<option  value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
	
											<?php 
											}
											?>
											</select>		
											

                                    </div>
                                </div>
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="contact_person">Contact Person &nbsp;&nbsp;&nbsp;</label><br>
											
											 <select id="contact_person_id" name="contact_person_id[]" style="width:72%;" class="form-control" multiple required>
								
											
													<?php 					
							   
													foreach($contact_details as $record)
							
													{
													?>
													<option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
			
													<?php 
													}
													?>
	
											  </select>(press ctrl & select)
											 
							 
										</div>
									</div>
								
								</div>
								
		
							
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="project_title">Project Number</label>

 											<input type="text" readonly class="form-control required" id="project_number" name="project_number" style="width:72%;"  value="PN - <?php echo $last_id; ?>">
                                    </div>
                             </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="project_title">Project Title</label>

 											<input type="text" class="form-control required" id="project_title" name="project_title" style="width:72%;" placeholder="Project Title">
                                        										
                                    </div>
                                </div>
                          	 </div>
						   
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
									 <label for="category">Category</label><br>
                                         <select class="form-control" id="category_id" name="category_id" style="width:72%;" required>
										 <option  value="">Select Category</option>					
										<?php 			
										foreach($category_details as $record)
											{
											?>
											<option  value="<?php echo $record->id ?>"><?php echo $record->category_name ?></option>
	
											<?php 
											}
											?>
										</select>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
									 <label for="Team">Team</label><br>
                                         <select id="team_id" class="form-control" name="team_id[]" style="width:72%;" multiple required>					
										<?php 			
										foreach($team_details as $record)
											{
											?>
											<option  value="<?php echo $record->userId ?>"><?php echo $record->name ?></option>
	
											<?php 
											}
											?>
										</select>(press ctrl & select)
                                    </div>
                                </div>
								
                           </div>
						   
						   <div style="display:none;">
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Deadline</label>

 											<input type="date" class="form-control required" id="deadline" name="deadline" >
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Estimated Budget">Estimated Budget</label>

 											<input type="text" class="form-control required" id="estiBudget" name="estiBudget" placeholder="Estimated Budget" >
                                        										
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="status">status</label><br>

 											<select id="status_id" name="status_id" style="">
											  <option value="1">Active</option>
											  <option value="0">Deactive</option>
											</select>
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Delivery date">Delivery date</label>

 											<input type="date" class="form-control required" id="delivery_date" name="delivery_date" >
                                        										
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill No">Bill No</label>

 											<input type="text" class="form-control required" id="bill_no" name="bill_no" placeholder="Bill No">
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill Date">Bill Date</label>

 											<input type="date" class="form-control required" id="bill_date" name="bill_date" >
                                        										
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill No">Income</label>

 											<input type="text" class="form-control required" id="income" name="income" placeholder="Income" >
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill No">Client Feed Back</label>

 											<input type="text" class="form-control required" id="client_feedback" name="client_feedback" placeholder="Client Feedback">
                                        										
                                    </div>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<input type="text" id="mydate" />
  <!-- Script -->
        

        <script type='text/javascript'>
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
                
                // client change
                $('#enquiry_id').change(function(){
                    var enquiry_id = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>ProjectShedule/getClientDetails',
                        method: 'post',
                        data: {enquiry_id: enquiry_id},
                        dataType: 'json',
                        success: function(response){
console.log(response);
                            // Remove options
                            
                           // $('#sel_depart').find('option').not(':first').remove();

                            // Add options
							var toAppend = '';
							// $('#contact_person_id').empty();
                            $.each(response,function(index,data){
console.log(data);
							var x=parseInt(data['client_id']);
							var contact_id=parseInt(data['contact_person_id']);
							var name=data['name'];
							
							var category_id=parseInt(data['category_id']);
							var project_title=data['project_title'];
							//toAppend += '<option value="'+ contact_id +'">'+name+'</option>';

							
							$("#client_id").val(x);
							$("#category_id").val(category_id);
							$("#project_title").val(project_title);
							
                               
                            });
							//$('#contact_person_id').append(toAppend);
                        }
                    });
                });
                
                // contact change
 //               $('#client_id').change(function(){
//                    var client_id = $(this).val();
//
//                    // AJAX request
//                    $.ajax({
//                        url:'<?=base_url()?>ProjectShedule/getContactDetails',
//                        method: 'post',
//                        data: {client_id: client_id},
//                        dataType: 'json',
//                        success: function(response){
//						
//						console.log(response);
//						var toAppend = '';
//						 $('#contact_person_id').empty();
//                            // Remove options
//                            
//                           // $('#sel_depart').find('option').not(':first').remove();
//
//                            // Add options
//							
//                            $.each(response,function(index,data){
//							toAppend += '<option value="'+ data.id +'">'+data.name+'</option>';
//						 
//							 	
//	
//                               
//                            });
//							 $('#contact_person_id').append(toAppend);
//                        }
//                    });
//                });
			
                
            });
			
			$("#date").datepicker().datepicker("setDate", new Date());
        </script>