<?php
$enquiry_id = $EnquiryInfo->id;
$date = $EnquiryInfo->deadline;
$brp = $EnquiryInfo->name;
$client = $EnquiryInfo->client_name;
$contact_person = $EnquiryInfo->contact_person;
$project_title = $EnquiryInfo->project_title;
$category = $EnquiryInfo->category_name;
$project_brief_document_name=$EnquiryInfo->project_brief_document_name;
$doc_created_status=$EnquiryInfo->doc_created_status;


?>


<div class="content-wrapper">

<form action="<?php echo base_url() ?>Enquiries/SendProjectBriefDocument/" method="POST" id="searchList" enctype="multipart/form-data">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>  Project Brief Document 

        <small> PBD Form</small>

      </h1>

    </section>

    

    <section class="content">
	
    <div class="row">

            <!-- left column -->

            <div class="col-md-12">

              <!-- general form elements -->
			  
			<!--REGISTRATION DETAILS DETAILS STARTS HERE-->	
	
			<h3 class="box-title">PBD Form Details</h3> 
			<div class="box-body"> 
			
			<div class="row">
			<div class="col-md-12">
			
			<?php if($doc_created_status=="1"){ ?>
			<a target="_blank" class="btn btn-sm btn-info" style="background-color: #545557;border-color:#4e4f51;margin-left: 900px;font-size:14px;" href="<?php echo site_url();?>ProjectBriefDocument/<?php echo $project_brief_document_name;?>" title="Download PB Document">Download PBD</a>
			<?php } ?>
			</div>
			</div>
	
					<div class="row">

                                <div class="col-md-6" >                                

                                    <div class="form-group">

                                        <label for="name">Date:&nbsp;</label> <?php echo $date; ?> 

                                    </div>

                                </div>
								
							<div class="col-md-6">                                

                                <div class="form-group">

                                     <label for="isc_reg_id">BRP:&nbsp;&nbsp; </label><?php echo $brp; ?>

                                    </div>

                                </div>
								

           			</div>
					
					<div class="row">

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                         <label for="company_name">Brand:&nbsp;</label><?php echo $client; ?>

                                    </div>

                                </div>
								
							<div class="col-md-6">                                

                                <div class="form-group">

                                       <label for="email">Contact Person:&nbsp;</label><?php echo $contact_person; ?>

                                    </div>

                                </div>
								

           			</div>
					
					<div class="row">

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                       <label for="Name">Project Title:&nbsp;</label><?php echo $project_title; ?>

                                    </div>

                                </div>
								
							<div class="col-md-6">                                

                                <div class="form-group">

                                       <label for="photo1">Category:&nbsp;</label><?php echo $category; ?>

                                    </div>

                                </div>
								

           			</div>
					
					
					
					
			</div>
			<input type="hidden" name="enquiry_id" value="<?php echo  $enquiry_id;?>" />
			<input type="hidden" name="project_title" value="<?php echo  $project_title;?>" />
			<input type="hidden" name="client_id" value="<?php echo  $client;?>" />
			
			<input type="hidden" name="enquiry_idd" value="" />
			
	<!--PBD DETAILS STARTS HERE-->	
	 <h3 class="box-title"></h3>  


                        <div class="box-body">
						
						
						 <?php
                     $z = 0;
                    if(!empty($prompts))

                    {

                        foreach($prompts as $record)

                        {
						$z= $z +1;

                    ?>
						

                            <div class="row">

                                <div class="col-md-12">                                

                                    <div class="form-group">

                                        <label for="field_name"  style="font-size: 16px;"><?php echo $record->field_name ?></label> <br/>
										<label for="prompt"><?php echo $record->prompt ?></label> <br/>
										<input type="hidden" name="bd_form_field_id[]" value="<?php echo $record->id ?>" />
										
<!--										<input type="text" name="prompt_answer[]" value="<?php if(isset($record->prompt_answer) && $record->prompt_answer != "") {?>
										<?php echo  $record->prompt_answer;?>
										<?php }  else { echo ""; }?>" id="ID<?php echo $z; ?>_prompt_answer" style="width: 100%;">-->
										
										
										
										<textarea rows="4" class="item-required" cols="50" style="width: 100%;"  name="prompt_answer[]" required="true" id="ID<?php echo $z; ?>_prompt_answer"><?php if(isset($record->prompt_answer) && $record->prompt_answer != "") {?><?php echo  $record->prompt_answer;?><?php }  else { echo ""; }?></textarea>
										
										<div id="ID<?php echo $z; ?>_prompt_answer_validation" name="prompt_answer_validation[]" class="prompt_answer_validat"></div>
										

                                    </div>

                                </div>
								
							
								

           					 </div>
							 
							 
							 <?php }} ?>
							
							<div id="InputsWrapper">
							 <div class="row">
                                <div class="col-md-4"> 
                                    <div class="form-group">
                                        <input type="submit" id="project_submit_button"  value="Send To GM" style="color: #fff;background: #CD1A22;border-color: #CD1A22;border-radius: 5px;" > please upload referance document
                                    </div>
                                </div>
								
							<div class="col-md-2">    
                              <div class="form-group">
                                        <!--<input type="file"  name="delegate_photo[]" required>	-->
										
										 <input type="file"  name="delegate_photo[]" required>
										 
                               </div>
                              </div>
							  
							<div class="col-md-2">
							<a href="#" class="removeclass"></a>
							<div id="AddMoreFileId" class="col-md-12" style="">
									<div class="form-group">
										<input type="button" id="AddMoreFileBox" value=" + " style="" class="adbutn">
									</div>
								</div>
							</div>
							
           					 </div>
							</div> 
							
							 <u><b>Reference Document</b></u> <br>
							<?php  
							if(isset($path))
							{
							foreach ($path as $value)
							{ ?>
						
							 
							  <a target="_blank" href="<?php echo $value;?>"><?php echo $value;?></a><br>
							
							<?php } 
							}
							
							 ?> 
							 
							 
							 
							 
							  

				<!--PBD DETAILS ENDS HERE-->	 
			

				
				 
				
					

                        
</div>
    </section>
 </form>

</div>
 

<style>
.col-md-2 {
    width: 25%;
}
@media (min-width: 992px)
.col-md-2 {
    
	display: none; 
}
</style>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/project.js" type="text/javascript"></script>
<script>
$('#searchList').submit(function (event) {

    var errors = false;
    $(this).find('.item-required').each(function () {
        
        if ($(this).val().length < 1) {
            $(this).addClass('error');
            errors = true;
        }
        
    });
    
    if (errors == true) {
        event.preventDefault();
    }
    
    
});


$(document).ready(function() {
var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddMoreFileBox"); //Add button ID

var x = InputsWrapper.length; //initlal text box count
var FieldCount=1; //to keep track of text box added

//on add input button click
$(AddButton).click(function (e) {
        //max input box allowed

            FieldCount++; //text box added ncrement
            //add input box
            $(InputsWrapper).append('<div class="row" id="row-'+FieldCount+'"><div class="col-md-4"> <div class="form-group"></div></div><div class="col-md-2"><div class="form-group"><input type="file" class=""  name="delegate_photo[]" required></div></div><div class="col-md-2"><a href="#" id="'+FieldCount+'" class="removeclass">remove</a></div></div>');
            x++; //text box increment
            
            $("#AddMoreFileId").show();
            
            $('AddMoreFileBox').html("Add field");
            
            // Delete the "add"-link if there is 3 fields.
           
    
        return false;
});

$("body").on("click",".removeclass", function(e){ //user click on remove text
        if( x > 1 ) {
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