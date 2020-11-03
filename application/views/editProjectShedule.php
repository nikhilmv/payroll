<?php

$id = $ProjectSheduleInfo->id;
$enquiryNo = $ProjectSheduleInfo->enquiryNo; 
$date = $ProjectSheduleInfo->date; 
$client = $ProjectSheduleInfo->client; 
$contactPerson= $ProjectSheduleInfo->contactPerson; 
$projectNumber = $ProjectSheduleInfo->projectNumber; 
$projectTitle = $ProjectSheduleInfo->projectTitle;
$category = $ProjectSheduleInfo->category; 

$deadline = $ProjectSheduleInfo->deadline; 
$estimatedBudget= $ProjectSheduleInfo->estimatedBudget; 
$status = $ProjectSheduleInfo->status; 
$deliveryDate = $ProjectSheduleInfo->deliveryDate;
$billNo = $ProjectSheduleInfo->billNo; 
$billDate = $ProjectSheduleInfo->billDate; 
$Income = $ProjectSheduleInfo->Income; 
$clientFeedBack= $ProjectSheduleInfo->clientFeedBack; 
$brp_grade= $ProjectSheduleInfo->brp_grade; 
$clientStatus= $ProjectSheduleInfo->clientStatus; 
$workingStatus= $ProjectSheduleInfo->workingStatus; 


$team=explode(",",$ProjectSheduleInfo->team);


?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>  Edit Project Schedule 

        <small> Edit Project Schedule</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

             
                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter Project Schedule Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form name="form" action="<?php echo base_url() ?>ProjectShedule/editProjectSheduleNew" method="post" id="editContact" enctype="multipart/form-data" > 

				
						<!-- /.box-body -->
						
						
						
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
     
								<div class="form-group">
									<label for="name">Enquiry Number&nbsp;&nbsp;&nbsp;</label>
								   <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />
								   <select id="enquiry_id" name="enquiry_id" class="form-control"style="width:72%;">
								   <option value="Select">Select Enquiry</option>
										
									<?php 					
			   
									foreach($enquiryInfo as $record)
			
									{
									?>
									<option value="<?php echo $record->id ?>" <?php if( $record->id==$enquiryNo){ echo "selected";} ?>><?php echo $record->id; ?></option>

										<?php }?>

									</select>
										
                               </div>
                                    
                            </div>
								

								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Date</label>

 										<input type="text" class="form-control required" name="date" id="date" style="width:72%;" value="<?php echo $date; ?>">
                                        										
								
                                    </div>
                                </div>
								
                                
                            </div>
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client"> Brand &nbsp;&nbsp;&nbsp;</label><br>
            
												<select id="client_id" name="client_id" class="form-control" style="width:72%;">
												<option  value="Select">Select Brand</option>
												
											<?php 					
					   
											foreach($clientInfo as $record)
					
											{
											?>
								
								<option value="<?php echo $record->id ?>" <?php if( $record->id==$client){ echo "selected";} ?>><?php echo $record->name ?></option>
	
											<?php 
											}
											?>
											</select>		
											

                                    </div>
                                </div>
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="contact_person">Contact Person &nbsp;&nbsp;&nbsp;</label><br>
											
											 <select id="contact_person_id" name="contact_person_id" class="form-control" style="width:72%;" required>
										  		 <option  value=""></option>
											
													<?php 					
							   
													foreach($contactpersonInfo as $record)
							
													{
													?>
													
								<option value="<?php echo $record->id ?>" <?php if( $record->id==$contactPerson){ echo "selected";} ?>><?php echo $record->name ?></option>
			
													<?php 
													}
													?>
	
											  </select>
											 
							 
										</div>
									</div>
								
								</div>
								
		
							
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="project_title">Project Number</label>

 											<input type="text" class="form-control required" style="width:72%;" id="project_number" name="project_number" value="<?php echo $projectNumber; ?>" readonly >
                                    </div>
                             </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="project_title">Project Title</label>

 											<input type="text" class="form-control required" style="width:72%;" id="project_title" name="project_title" value="<?php echo $projectTitle; ?>">
                                        										
                                    </div>
                                </div>
                          	 </div>
						   
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
									 <label for="category">Category</label><br>
                                         <select id="category_id" class="form-control" name="category_id" style="width:72%;" required>
										 <option  value="Select">Select Category</option>					
										<?php 			
										foreach($categoryInfo as $record)
											{
											?>
								<option value="<?php echo $record->id ?>" <?php if( $record->id==$category){ echo "selected";} ?> ><?php echo $record->category_name ?></option>
	
											<?php 
											}
											?>
										</select>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
									 <label for="Team">Team</label><br>
                                         <select id="team_id" name="team_id[]" class="form-control" style="width:72%;" multiple required>					
										<?php 			
										foreach($allTeams as $record)
											{
											?>
							<option value="<?php echo $record->userId ?>" <?php if (in_array($record->userId, $team)) { echo "selected";} ?>><?php echo $record->name ?></option>
	
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
                                         <label for="deadline">Deadline</label>

 											<input type="date" class="form-control required" style="width:72%;" id="deadline" name="deadline" value="<?php echo $deadline; ?>" >
											
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Estimated Budget">Estimated Budget</label>

 											<input type="text" class="form-control required" style="width:72%;" id="estiBudget" name="estiBudget" value="<?php echo $estimatedBudget; ?>" >
                                        										
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<!--<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="status">Status</label><br>

 											<select id="status_id" name="status_id" class="form-control" style="width:72%;">
											  <option value="1" <?php if( $status==1){ echo "selected";} ?>>WIP</option>
											  <option value="0" <?php if( $status==0){ echo "selected";} ?>>Delivered </option>
											</select>
											
										
                                        										
                                    </div>
                                </div>-->
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Delivery date">Delivery date</label>

 										<input type="date" class="form-control required" id="delivery_date" name="delivery_date"style="width:72%;" value="<?php echo $deliveryDate; ?>" >
                                        										
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill No">Bill No</label>

 											<input type="text" class="form-control required" style="width:72%;" id="bill_no" name="bill_no" value="<?php echo $billNo; ?>" >
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill Date">Bill Date</label>
										<input type="date" class="form-control required" style="width:72%;" id="bill_date" name="bill_date" value="<?php echo $billDate; ?>" >
 											
                                        										
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill No">Income</label>

 											<input type="text" class="form-control required" style="width:72%;" id="income" name="income" value="<?php echo $Income; ?>">
                                        										
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Bill No">Client Feed Back</label>

 											<input type="text" class="form-control required" style="width:72%;" id="client_feedback" name="client_feedback" value="<?php echo $clientFeedBack; ?>">
                                        										
                                    </div>
                                </div>
								
								
                           </div>
						   
						   
						   <div class="row">
								<div class="col-md-6">
									 <div class="form-group">
										<label for="Grades No">Grades of  BRP </label> <br>
										<select id="brp_grade" name="brp_grade" class="form-control">
										<option value="" >Select Grade</option>
									  	<option value="Poor" <?php if( $brp_grade=="Poor"){ echo "selected";} ?>>Poor</option>
									  	<option value="Good" <?php if( $brp_grade=="Good"){ echo "selected";} ?>>Good</option>
									  	<option value="Average" <?php if( $brp_grade=="Average"){ echo "selected";} ?>>Average</option>
									  	<option value="Excellent" <?php if( $brp_grade=="Excellent"){ echo "selected";} ?>>Excellent</option>
										</select> 
									</div>
								 </div>
                          </div>
	
						   
								
								<div class="row">
								<div class="col-md-6">
										
											 <label for="Grades No">Grades of  Members </label> <br>
											 <?php 			
												foreach($teamInfo as $record)
												{ 
												if (in_array($record->userId, $team))
													{ 
													?>
													<div id="div-<?php echo $record->userId; ?>">
													
													<input style="border:none;" type="text" value="<?php echo $record->name; ?>" id="<?php echo $record->userId; ?>">
	
														<select id="grade" name="grade[]" style="" class="form-control">
														<option value="" >Select Grade</option>
														  <option value="Poor" <?php if( $record->grade=="Poor"){ echo "selected";} ?>>Poor</option>
														  <option value="Good" <?php if( $record->grade=="Good"){ echo "selected";} ?>>Good</option>
														  <option value="Average" <?php if( $record->grade=="Average"){ echo "selected";} ?>>Average</option>
														  <option value="Excellent" <?php if( $record->grade=="Excellent"){ echo "selected";} ?>>Excellent</option>
														</select> 
														
														
													</div>
													<br>
													<?php	
													}			
													
													
												}
											?>	

						
									
								 </div>
		
                          		 </div>
		
                           </div>
					
						   
					
											
                            
                        </div>

    

                        <div class="box-footer">

                            <input type="submit" class="btn btn-primary" name="submitForm" value="Submit" />
							<?php 
							if(($clientStatus == 1 && $workingStatus == 0) )
							{ ?>
							<input type="submit" class="btn btn-primary" name="submitForm" value="Activate This Project" style=" <?php if( $clientStatus == 0){ echo "display: none;";}  ?>" />
							
							<?php }else if(($clientStatus == 1 && $workingStatus == 1) )
							{ ?><input type="button" class="btn btn-success"  value="Activated"  style=" <?php if( $clientStatus == 0){ echo "display: none;";}  ?>"/>
						
						
						<?php }else if(($clientStatus == 1 && $workingStatus == 2) )
							{ ?><input type="button" class="btn btn-success"  value="Project Ended"  style=" <?php if( $clientStatus == 0){ echo "display: none;";}  ?>"/>
						<?php	}?>
						
							<?php
							if($workingStatus == 1)
							{ ?>
							<input type="submit" class="btn btn-primary" name="submitForm" value="End Project" />
							<?php }
							?>
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

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

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

                            // Remove options
                            
                           // $('#sel_depart').find('option').not(':first').remove();

                            // Add options
							var toAppend = '';
							 $('#contact_person_id').empty();
                            $.each(response,function(index,data){
console.log(data);
							var x=parseInt(data['client_id']);
							var contact_id=parseInt(data['contact_person_id']);
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
                        url:'<?=base_url()?>ProjectShedule/getContactDetails',
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
			
			$("#date").datepicker().datepicker();
        </script>
		
		<style>
		.box.box-primary { margin-bottom: 0px; }
		</style>