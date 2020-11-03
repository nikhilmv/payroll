<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Rental Listings Management
        <small>Add New Listing</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Listing Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addFaculty" action="<?php echo base_url() ?>Listings/addNewListing" method="post" role="form" enctype="multipart/form-data" >
                        <!-- /.box-body -->
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Listing Title</label>
                                        <input type="text" class="form-control" id="listing_title" placeholder="Listing Title" name="listing_title" >  
                                    </div>
                                    
                                </div>
								     <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qualification">Category</label>
										<select id="category_id" name="category_id" style="width: 100%;">
										<option selected="selected" value="1">Flat</option>
										<option value="2" >House</option>
										</select>
										                                        
                                    </div>
                                </div>
                                
                            </div>
							
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <label for="designation">Listing Short Descrition</label>
										 <textarea rows="8" style="width: 100%;" class="form-control required" id="tinymce" name="listing_short_descrition" ></textarea>
										 
                                        
                                    </div>
                                </div>
								
								
                                
                            </div>
							
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qualification">Listing Location</label>
                                        <input type="text" class="form-control" id="listing_location" placeholder="Listing Location" name="listing_location">
                                    </div>
                                </div>
								
								</div>
								
								
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="designation">Listing Monthly Rent</label>
                                        <input type="text" class="form-control" id="listing_monthly_rent" placeholder="Listing Monthly Rent" name="listing_monthly_rent">
                                    </div>
                                </div>
								
								
                                
                            </div>
							
							 <div class="row">
                             							
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qualification">Listing Rental Date</label>
                                        <input type="date" class="form-control" id="listing_rental_date" placeholder="Listing Rental Date" name="listing_rental_date" >  
                                    </div>
                                </div>
								
								</div>
								
								
							
                            <div class="row">
                             
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="designation">Listing Annual Increment</label>
										
										 <input type="text" class="form-control" id="listing_annual_increment" placeholder="Listing annual increment" name="listing_annual_increment">
                                        
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="designation">Listing Status</label>
										 <select id="listing_status" name="listing_status">
										<option selected="selected" value="For Rent Available">For Rent Available</option>
										<option value="Delivered for Rent" >Delivered for Rent</option>
										</select>
                                    </div>
                                </div>
								
                                
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="designation">Listing Created Date</label>
<input type="date" class="form-control" id="listing_created_date" placeholder="Listing Created Date" name="listing_created_date" >  

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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>