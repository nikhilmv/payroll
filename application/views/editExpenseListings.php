<?php

$Id = $ExpenseListingInfo->id;
$expense_title = $ExpenseListingInfo->expense_title; 
$category_id = $ExpenseListingInfo->category_id; 
$description = $ExpenseListingInfo->description; 
$amount = $ExpenseListingInfo->amount; 
$date = $ExpenseListingInfo->date; 




?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>Edit Expense Listing 

        <small> Edit Expense</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

             
                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Edit Expense Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form name="form" action="<?php echo base_url() ?>Expenses/editExpenseListingNew1" method="post" id="editBrand" enctype="multipart/form-data" > 

				
						<!-- /.box-body -->
						
						
						
										<div class="box-body">
					
											<div class="row">
											<div class="col-md-6">
													<div class="form-group">
														 <label for="project_title">Expense Title</label>
				
				 <input type="text" class="form-control required" id="expense_title" name="expense_title" value="<?php echo $expense_title; ?>" maxlength="128" style="width:72%;">
				 <input type="hidden" name="id" value="<?php echo $Id; ?>" >
																								
												
													</div>
												</div>
										   </div>
										   
										   <div class="row">
											<div class="col-md-6">
													<div class="form-group">
													 <label for="category">Expense Category</label>
													
														 <select id="category_id" name="category_id" style="width:72%;" class="form-control required">
														<option value="">Select Category</option>
									<?php 					
								   
										foreach($CategoryInfo as $record)
				
										{
				?>
										<option value="<?php echo $record->id ?>" <?php if( $record->id==$category_id){ echo "selected";} ?>><?php echo $record->name; ?></option>
											
				
														<?php }?>
				
														</select>
																								
												
													</div>
												</div>
										   </div>
										   
										   
										   <div class="row">
											<div class="col-md-6">
													<div class="form-group">
														 <label for="deadline">Description</label>
				
				 <input type="text" class="form-control required" id="description" name="description" value="<?php echo $description; ?>" maxlength="128" style="width:72%;">
																								
												
													</div>
												</div>
										   </div>
										   
										   <div class="row">
											<div class="col-md-6">
													<div class="form-group">
														 <label for="deadline">Amount</label>
				
				 <input type="text" class="form-control required" id="amount" name="amount" value="<?php echo $amount; ?>" maxlength="128" style="width:72%;">
																								
												
													</div>
												</div>
										   </div>
										   
										   <div class="row">
											<div class="col-md-6">
													<div class="form-group">
														 <label for="deadline">Amount</label>
				
				 <input type="date" class="form-control required" id="date" name="date" value="<?php echo $date; ?>" maxlength="128" style="width:72%;">
																								
												
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