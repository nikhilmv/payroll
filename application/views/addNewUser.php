<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> User 

        <small>Create Admin Users</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

                

                

                

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Basic Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    <?php $this->load->helper("form");  ?>

					

					

                    <form role="form" id="addUser" action="<?php echo base_url() ?>User/addNewUser" method="post" role="form" enctype="multipart/form-data"  >

                        

						

						

						<div class="box-body">

                            <div class="row">
							
							   

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="fname">User Name</label>

                                        <input type="text" class="form-control required"  id="name" name="name" maxlength="128" placeholder="Enter User Name">
										
										 <input type="hidden" class="form-control required"  id="createdDtm" name="createdDtm" value="<?php echo date("Y-m-d H:i:s"); ?>" >
										
										

                                    </div>

                                    

                                </div>

								</div>

								

								

								<div class="row">
								
								<div class="col-md-6">

                                    <div class="form-group">

                                        <label for="phone">Contact Number(Mobile)</label>

                                        <input type="text" class="form-control required" id="mobile" name="mobile"  placeholder="Mobile">

                                    </div>

                                </div>

                                

                            </div>

                            

							

                            <div class="row">
							
						<div class="box-header">

                        <h3 class="box-title">Login  Details</h3>

                    </div><!-- /.box-header -->
					
					
					<div class="col-md-6">

                                    <div class="form-group">

                                        <label for="email">Email</label>

                                        <input type="text" class="form-control required equalTo" id="email" name="email" placeholder="Email" >

                                    </div>

                                </div>
								
				    <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="password">Password</label>

                                        <input type="password" class="form-control required" id="password"  name="password" placeholder="Password">

                                    </div>

                                </div>				

                    

                                

                            </div>

                            <div class="row">
							
							<div class="box-header">

                        <h3 class="box-title">Other  Details</h3>

                    </div><!-- /.box-header -->

                                
								
								
								<div class="col-md-12">

                                    <div class="form-group">

                                        <label for="email">Address</label>

                                        <textarea rows="4" style="width: 100%;" class="form-control required" id="tinymce" name="address" ></textarea>

                                    </div>

                                </div>
								
								
								<div class="col-md-12">

                                    <div class="form-group">

                                        <label for="type">Role</label>

                                        <select name="roleId" id="roleId"> 

										<option value="1" selected="selected">System Administrator</option>

										</select>

                                    </div>

                                </div>
								
							

                            </div>

							

							<div class="row">
							
							
							<div class="box-header">

                        <h3 class="box-title">Profile Image</h3>

                    </div><!-- /.box-header -->

                                

								
								
								<div class="col-md-6">

                                    <div class="form-group">

                                        

                                         <label for="Image">Image </label>

								        <input type="file" name="userfile">

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