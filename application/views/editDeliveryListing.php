<?php
$id = $DeliveryInfo->id;
$project_id = $DeliveryInfo->project_number_id;
$client_id = $DeliveryInfo->client_id;
$contact_person_id = $DeliveryInfo->contact_person_id;
$project_title = $DeliveryInfo->project_title;

$estimated_budget = $DeliveryInfo->estimated_budget;

?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>Edit Delivery Schedule & Estimate 

        <small> Edit Delivery Schedule & Estimate</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

             
                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter Delivery Schedule & Estimate Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form name="form" action="<?php echo base_url() ?>DeliveryShedule/editDeliveryListingNew" method="post" id="editEnquiry" enctype="multipart/form-data" > 

				
				 
						<!-- /.box-body -->
						
						
						
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="name">Project Number</label>
									   <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />
                                    </div>
                                    
                                </div>
								
								 <div class="col-md-8">                                
                                    <div class="form-group">
									
									 <select id="project_number_id" name="project_number_id" style="width:100%;" class="form-control required">
									   <option value="Select">Select Project Number</option>
										
					<?php 					
                   
                        foreach($projectInfo as $record)

                        {
?>
										<option value="<?php echo $record->id ?>" <?php if( $record->id==$project_id){ echo "selected";} ?>><?php echo $record->projectTitle ?></option>

										<?php }?>

										</select>
									</div>
								</div>	
                                
                            </div>
							
							<div class="row">
							<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="client"> Brand &nbsp;&nbsp;&nbsp;</label>                          
                                    </div>
                                </div>
								
								<div class="col-md-8">
								 <div class="form-group">
								 <select id="client_id" name="client_id" style="width:100%;" class="form-control required">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person &nbsp;&nbsp;&nbsp;</label>
                                    </div>
                                </div>
								
								 <div class="col-md-8">
                                    <div class="form-group">
									
									<select id="contact_person_id" name="contact_person_id" style="width:100%;" class="form-control required">
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

 <input type="text" class="form-control required" id="project_title" name="project_title"  value="<?php echo $project_title; ?>">
                                        										
								
                                    </div>
                                </div>
								
                           </div>
						   
						   
						   
						   
						 <?php  
						 $i= 0;
						foreach($deliverablesInfo as $record)

                        { 
						$i = $i +1; ?>
						
						 <div style="width:100%;" id="InputsWrapper">
						   <div class="row">
						   
						   <div class="col-md-6">
                                    <div class="form-group">
									 <label for="category">Deliverable <?php echo $i; ?></label>
									<input type="hidden" value="<?php echo $record->id; ?>" name="deliveryId[]">
                          <input type="text" class="form-control required" name="deliverables[]" id="deliverables" style="width:100%;" value="<?php echo $record->Deliverables; ?>">				
								
                                    </div>
                                </div>
								
							<div class="col-md-4">
                                    <div class="form-group">
                                         <label for="deadline">Deadline <?php echo $i; ?></label>

 							<input type="date" class="form-control required" id="timelines" name="timelines[]"  style="width:100%;" value="<?php echo $record->Timelines; ?>">
                                        										
								
                                    </div>
                                </div>	
								
							<div class="col-md-2" >
							
							<a style="" class=" deletedeliverable" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i style="font-size:20px; margin-top:30px;" class="fa fa-trash"></i></a>
							</div>
                           </div>
						 </div> 
						   
						<?php   } 
						   ?>
						   <div id="addd"></div>
						    <div class="row">
						   <div class="col-md-2">
								<a href="#" class="removeclass"></a>
									<div id="AddMoreFileId" class="col-md-12" style="padding-top: 25px;">
	
										<div class="form-group">
									   
											<input type="button" id="AddMoreFileBox" value=" + " style="background-color:#ff4d4d; color:#FFFFFF; border: #ff4d4d; width:40px; height:30px;" class="adbutn">
										</div>
									</div>
								</div>
								</div>
								
						  <div class="row">
						   <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Estimated Budget</label>

							<input type="text" class="form-control required" id="estimated_budget" name="estimated_budget"  value="<?php echo $estimated_budget; ?>">
                                        										
								
                                    </div>
                                </div>
                            </div>
                        </div>

    

                        <div class="box-footer">

                            <input type="submit" class="btn btn-primary" name="submitForm" value="Submit" />
							
							<input type="submit" class="btn btn-primary" name="submitForm" value="Submit & Email to GM" />

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

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
                            $.each(response,function(index,data){
							var x=parseInt(data['client']);

							
							$("#client_id").val(x);
                               
                            });
                        }
                    });
                });
                
                // contact change
                $('#client_id').change(function(){
                    var client_id = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>DeliveryShedule/getContactDetails',
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
			
			

$(document).ready(function() {


var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddMoreFileBox"); //Add button ID

var x = InputsWrapper.length;//initlal text box count
var FieldCount=<?php echo $i; ?>; //to keep track of text box added

//on add input button click
$(AddButton).click(function (e) {
        //max input box allowed

            FieldCount++; //text box added ncrement
            //add input box
            $(addd).append('<div class="row" id="row-'+FieldCount+'"><div class="col-md-6"> <div class="form-group"><label for="category">Deliverable '+FieldCount+'</label> <input type="text" class="form-control required" name="new_deliverables[]" ></div></div><div class="col-md-4"><div class="form-group"><label for="deadline">Deadline '+FieldCount+'</label><input type="date" class="form-control required"  name="new_timelines[]"></div></div><div class="col-md-2"><div style="margin-top:30px;"><a href="#" id="'+FieldCount+'" class="removeclass">remove</a></div></div></div>');
            x++; //text box increment
            
            $("#AddMoreFileId").show();
            
            $('AddMoreFileBox').html("Add field");
            
            // Delete the "add"-link if there is 3 fields.
           
    
        return false;
});

$("body").on("click",".removeclass", function(e){ //user click on remove text
        if( x > 1 ) {
		FieldCount=FieldCount-1;
		var id = $(this).attr('id');
		
                $('#row-'+id+'').remove(); //remove text box
                x--; //decrement textbox
           
            	$("#AddMoreFileId").show();
            
            	$("#lineBreak").html("");
            
                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
        }
	return false;
 }) 

 });
		
</script>