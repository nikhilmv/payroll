<?php
//$project_id = $invoiceInfo->project_id;
//$payment_due_date = $invoiceInfo->payment_due_date;
//$currency = $invoiceInfo->currency;
foreach($invoiceInfo as $record)
{
$project_id=$record->project_id;
$payment_due_date=$record->payment_due_date;
$currency=$record->currency;

}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Project Shedule Download Invoice Management
        <small>Project Shedule Invoice</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Project Shedule Invoice Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form name="form" id="addDelivery" action="<?php echo base_url() ?>ProjectShedule/editProjectInvoice2" method="post"  enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $project_id; ?>" name="project_id">
					<input type="hidden" value="<?php  ?>" name="brand_id">
                        <div class="box-body">



							<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Project Number</label>
                                       <select id="project_id" name="project_no" style="width:72%;" class="form-control required">
									   <option value="Select">Select Project Number</option>
										
										<?php 			
										foreach($ProjectNumber as $record)
										{
										?>
								<option value="<?php echo $record->id ?>" <?php if( $record->id==$project_id){ echo "selected";} ?>><?php echo $record->projectTitle ?></option>

										<?php 
										}
										?>

										</select>
										
                                    </div>
                                    
                                </div>
                                
                            </div>
							
							
							
	
						<div id="addd"></div>
						 <div class="row">
						   <div class="col-md-2">
								<a href="#" class="removeclass"></a>
									<div id="AddMoreFileId" class="col-md-12" style="padding-top: 25px;">
	
										<div class="form-group">
									   
											<input type="button" id="AddMoreFileBox" value=" + " style="background-color:#0096d6; color:#FFFFFF; border: #0096d6; width:40px; height:30px;" class="adbutn">
										</div>
									</div>
								</div>
						  </div>
						  
						 <?php  
						 $i= 0;
						foreach($project_invoice_info as $record)

                        { 
						$i = $i +1; ?>
						
						 <div style="width:100%;" id="InputsWrapper">
 
								
						  <div class="row" >
							<div class="col-md-6">
							
                                    <div class="form-group">
									 <label for="category">Description <?php ?></label>
									<input type="hidden" value="<?php echo $record->id; ?>" name="Id[]">
                                       <input type="text" class="form-control required" name="description[]" id="description_1" value="<?php echo $record->description; ?>">
                                        										
								
                                    </div>
                                </div>
 
							<div class="col-md-2">
                                    <div class="form-group">
                                         <label for="deadline">Quantity <?php  ?></label>

 										<input type="text" class="form-control required"  name="quantity[]" id="quantity_1" value="<?php echo $record->quantity; ?>">
                                        										
								
                                    </div>
                                </div>
								
							<div class="col-md-2">
                                    <div class="form-group">
                                         <label for="deadline">Amount <?php  ?></label>

 										<input type="text" class="form-control required"  name="amount[]" id="amount_1" value="<?php echo $record->amount; ?>">
                                        										
								
                                    </div>
                                </div>	
								
							<div class="col-md-2" >
							
							<a style="" class=" deletedeliverable" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i style="font-size:20px; margin-top:30px;" class="fa fa-trash"></i></a>
							</div>
                           </div>
						 </div> 
						   
						<?php   } 
						   ?> 
						   
						


						   
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Payment due date</label>

 								<input type="date" class="form-control required" id="payment_due_date" name="payment_due_date" value="<?php echo $payment_due_date ?>">
                                        										
								
                                    </div>
                                </div>
                           </div>
						   
						   <div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="deadline">Currency</label>
								
								<select class="form-control required" id="currency" name="currency">
								<option value="INR" <?php if( $currency=="INR"){ echo "selected";} ?>>INR</option>
								<option value="USD" <?php if( $currency=="USD"){ echo "selected";} ?>>USD</option>
								<option value="EUR" <?php if( $currency=="EUR"){ echo "selected";} ?>>EUR</option>
								<option value="AUD" <?php if( $currency=="AUD"){ echo "selected";} ?>>AUD</option>
								</select>
                                       										
								
                                    </div>
                                </div>
                           </div>
						   
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                           
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

$(document).ready(function() {


var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddMoreFileBox"); //Add button ID

var x = InputsWrapper.length; //initlal text box count
var FieldCount=<?php echo $i; ?>;//to keep track of text box added

//on add input button click
$(AddButton).click(function (e) {
        //max input box allowed

            FieldCount++; //text box added ncrement
            //add input box
            $(InputsWrapper).append('<div class="row" id="row-'+FieldCount+'"><div class="col-md-6"> <div class="form-group"><label for="category">Description  - '+FieldCount+'</label> <input type="text" class="form-control required" name="description[]" ></div></div><div class="col-md-2"><div class="form-group"><label for="deadline">Quantity - '+FieldCount+'</label><input type="text" class="form-control required"  name="quantity[]"></div></div><div class="col-md-2"><div class="form-group"><label for="deadline">Amount- '+FieldCount+'</label><input type="text" class="form-control required"  name="amount[]"></div></div><div class="col-md-2"><div style="margin-top:30px;"><a style="color:red;" href="#" id="'+FieldCount+'" class="removeclass">Remove</a></div></div></div>');
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