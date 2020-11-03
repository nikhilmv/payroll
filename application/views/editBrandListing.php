<?php

$id = $brandInfo->id;
$name = $brandInfo->name; 
$website_url = $brandInfo->website_url; 
$description = $brandInfo->description; 
$address = $brandInfo->address;
$logo = $brandInfo->logo; 

?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>Edit Brand 

        <small> Edit Brand</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

             
                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter Brand Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form name="form" action="<?php echo base_url() ?>Brands/editBrandListingNew" method="post" id="editBrand" enctype="multipart/form-data" > 

				
						<!-- /.box-body -->
						
						
						
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" id="name" name="name"  value="<?php echo $name; ?>">
										<input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />
                                    </div>
                                    
                                </div>
                                
                            </div>
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website_url"> Website URL</label>
                                        <input type="text" class="form-control required" id="website_url"  name="website_url" maxlength="128" value="<?php echo $website_url; ?>">
                                    </div>
                                </div>
								</div>
								
							
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea rows="3" style="width: 100%;" class="form-control required" id="tinymce" name="description"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
								
								
								
                                    
                            </div>
							
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Address</label>
                                        <textarea rows="3" style="width: 100%;" class="form-control required" id="tinymce" name="address"><?php echo $address; ?></textarea>
                                    </div>
                                </div>
								
								
								
                                    
                            </div>
							
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                         <label for="logo"> Upload Logo</label>

<input type="file" name="userfile">
<input type="hidden" class="form-control" id="current_photo" placeholder="Photo" name="current_photo" value="<?php echo $logo; ?>" maxlength="128"><br><br />
										<img src="<?php echo site_url(); ?>images/brands/<?php echo $logo; ?>" style="height: 75px;">
                                        										
								
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