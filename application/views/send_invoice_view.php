<?php
//$payment_due_date = $ProjectSheduleinvoice->payment_due_date;
//$currency = $ProjectSheduleinvoice->currency;
//$brand_id = $ProjectSheduleinvoice->client;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Project Shedule Send Invoice Management
        <small>Send Invoice</small>
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
					<form name="form" id="addContact" action="<?php echo base_url() ?>ProjectShedule/sendEmailToContact" method="post"  enctype="multipart/form-data">
                  		<div class="box-body">
						
							<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Project Number</label>
                                       <select id="project_id" name="project_id" style="width:72%;" class="form-control required">
									   <option value="Select">Select Project Number</option>
										
										<?php 			
										foreach($ProjectNumber as $record)
										{
										?>
										<option value="<?php echo $record->id ?>"><?php echo $record->projectNumber ?></option>

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
                                        <label for="name">PDF Document</label>
                                       <select id="pdfDocument" name="pdfDocument" style="width:72%;" class="form-control required">
									   <option value="Select">PDF Document</option>
										<?php 			
										foreach($PdfDetails as $record)
										{
										?>
										<option value="<?php echo $record->invoice_pdf ?>"><?php echo $record->invoice_pdf ?></option>
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
									 <label for="Team">Contact Person</label><br>
                                         <select id="Contact_id" class="form-control" name="Contact_id[]" style="width:72%;" multiple required>					
										<?php 			
										foreach($ContactPersons as $record)
											{
											?>
											<option  value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
	
											<?php 
											}
											?>
										</select>
                                    </div>
                                </div>
						</div>
				
				
					     </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Send Invoice" />
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
                
                // pdf change
                $('#project_id').change(function(){
                    var project_id = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>ProjectShedule/getPdfData1',
                        method: 'post',
                        data: {project_id: project_id},
                        dataType: 'json',
                        success: function(response){
//console.log(response);

							var toAppend = '';
							
							$('#pdfDocument').empty();
							
                            $.each(response,function(index,data){

							var invoice_pdf=data['invoice_pdf'];
							
							toAppend += '<option value="'+ invoice_pdf +'">'+invoice_pdf+'</option>';
	
							
							$("#pdfDocument").val(invoice_pdf);
							
                            });
						$('#pdfDocument').append(toAppend);
						}
                    });
                });
				
				
				  $('#project_id').change(function(){
                    var project_id = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>ProjectShedule/contactData1',
                        method: 'post',
                        data: {project_id: project_id},
                        dataType: 'json',
                        success: function(response){
console.log(response);

							var toAppend = '';
							
							$('#Contact_id').empty();
							
                            $.each(response,function(index,data){

							var contactPerson=data['contactPerson'];
							var personName=data['personName'];
							
							toAppend += '<option value="'+ contactPerson +'">'+personName+'</option>';
	
							
							$("#Contact_id").val(contactPerson);
							
                            });
						$('#Contact_id').append(toAppend);
						}
                    });
                });
				

                
           });
			
			
        </script>
