<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Organic BPS - Export Projects

        <small> </small>

      </h1>

    </section>

    <section class="content">

        <!--<div class="row">

            <div class="col-xs-12 text-right">

                <div class="form-group">
                   
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>ProjectShedule/addNew"><i class="fa fa-plus"></i> Add New</a>

                </div>

            </div>

        </div>-->

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header" style="padding: 19px;">

                    <h3 class="box-title">Export Projects</h3>

                    <div class="box-tools">
					
					
					
					

                        

                    </div>

                </div><!-- /.box-header -->

              
                  <div class="row">
				  <form action="<?php echo base_url() ?>ExportProjects/ExportProjectsDetails" method="POST" id="member_id" >
							<div class="col-md-5">
							
                                    <div class="form-group">
									 <label for="team_member_id"  style="margin-left: 30px;">Status</label><br>
                                         <select class="form-control" id="status_value" name="status_value" style="width:50%; margin-left: 30px;" required>
										 <option  value="">Select Status</option>	
										  <option  value="0">Not Confirmed</option>	
										  <option  value="1">Work in Progress</option>	
										  <option  value="2">Ended</option>					
				
										</select>
                                    </div>
								
                                </div>	
		
								<div class="col-md-2" style="padding-top:27px;position: relative;left: -197px;">
						
                                    <div class="form-group">
									 
           								   <input type="submit" class="btn btn-primary" value="Export" />
                                    </div>
									
                                </div>
								</form>
                           </div>

                  

               <!-- /.box-body -->

                <div class="box-footer clearfix">

                    

                </div>

              </div><!-- /.box -->

            </div>

        </div>

    </section>

</div>


