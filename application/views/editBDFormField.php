<?php

$id = $bdformfieldInfo->id;
$field_name = $bdformfieldInfo->field_name; 
$prompt = $bdformfieldInfo->prompt; 


?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>Edit BD Form Field 

        <small> Edit BD Form Field </small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

             
                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter BD Form Field Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form name="form" action="<?php echo base_url() ?>BDForm/editBDFormFieldNew" method="post" id="editBrand" enctype="multipart/form-data" > 

				
						<!-- /.box-body -->
						
						
						
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="field_name">Field Name</label>
                                        <input type="text" class="form-control required" id="field_name" name="field_name"  value="<?php echo $field_name; ?>">
										<input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />
                                    </div>
                                    
                                </div>
                                
                            </div>
							
							
								
							
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prompt">Prompt</label>
                                        <textarea rows="4" style="width: 100%;" class="form-control required" id="tinymce" name="prompt"><?php echo $prompt; ?></textarea>
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