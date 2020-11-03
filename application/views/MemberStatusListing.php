<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Team Member Status Listings 

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

                    <h3 class="box-title">Team Member Status Listings</h3>

                    <div class="box-tools">
					
					
					
					

                        <form action="<?php echo base_url() ?>TeamMemberStatus/MemberStatusListing/" method="POST" id="searchList" enctype="multipart/form-data" style="width:200px;float:left;padding-top: 10px;">

                            <div class="input-group">

                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>

                              <div class="input-group-btn">

                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>

                              </div>

                            </div>

                        </form>

                    </div>

                </div><!-- /.box-header -->

              
                  <div class="row">
				  <form action="<?php echo base_url() ?>TeamMemberStatus/getProjectDetails" method="POST" id="member_id" >
							<div class="col-md-5">
							
                                    <div class="form-group">
									 <label for="team_member_id"  style="margin-left: 30px;">Team Members</label><br>
                                         <select class="form-control" id="team_member_id" name="team_member_id" style="width:50%; margin-left: 30px;" required>
										 <option  value="">Select Member</option>					
										<?php 			
										foreach($member_names as $record)
											{
											?>
											<option  value="<?php echo $record->userId ?>"><?php echo $record->name ?></option>
	
											<?php 
											}
											?>
										</select>
                                    </div>
								
                                </div>	
								
								<div class="col-md-5" style="padding-top:0px;left: -75px">
						
                                    <div class="form-group">
									 <label for="team_member_id" >Status</label><br>
              								<select id="status_id" name="status_id" class="form-control" style="width:30%; ">
											<option value="All" >Select Status</option>
											  <option value="1" >WIP</option>
											  <option value="0" >Delivered </option>
											</select>
                                    </div>
									
                                </div>		
								
								<div class="col-md-2" style="padding-top:27px;position: relative;left: -197px;">
						
                                    <div class="form-group">
									 
           								   <input type="submit" class="btn btn-primary" value="Submit" />
                                    </div>
									
                                </div>
								</form>
                           </div>
<div class="box-body table-responsive no-padding">

                  <table class="table table-hover">

                    <tr>

					    <th>No</th>

						<th>Project Number</th>
						
						<th>Project Title</th>


                    </tr>

                    <?php
					
					$start_count = $this->uri->segment(3);
			
					
					if($start_count == "")
					{
						$i=0;
					}
					else
					{
						$i=$start_count;
					}
					
                    if(!empty($ProjectDetails))

                    {

                        foreach($ProjectDetails as $record)

                        {
						$i = $i + 1;

                    ?>

                    <tr>
						
						<td><?php  echo $i;?></td>
						
						<td><?php  echo $record->projectNumber ?></td>
                        
						<td><?php  echo $record->projectTitle ?></td>
				


                   </tr>

                    <?php

                        }

                    }
			
                    ?>

                  </table>


                </div>
                  

               <!-- /.box-body -->

                <div class="box-footer clearfix">

                    <?php echo $this->pagination->create_links(); ?>

                </div>

              </div><!-- /.box -->

            </div>

        </div>

    </section>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script type="text/javascript">

    jQuery(document).ready(function(){

        jQuery('ul.pagination li a').click(function (e) {

            e.preventDefault();            

            var link = jQuery(this).get(0).href;            

            var value = link.substring(link.lastIndexOf('/') + 1);

            jQuery("#member_id").attr("action", baseURL + "TeamMemberStatus/getProjectDetails/" + value);

            jQuery("#member_id").submit();

        });

    });



 var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
                
                // client change
                $('#team_member_id').change(function(){
                    var team_member_id = $(this).val();
					

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>TeamMemberStatus/getProjectDetails',
                        method: 'post',
                        data: {team_member_id: team_member_id},
                        dataType: 'json',
                        success: function(response){
						
console.log(response);

                        }
                    });
                });
               });  
</script>

