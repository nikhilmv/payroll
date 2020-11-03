<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Team Member Report Listings 

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

                    <h3 class="box-title">Team Member Report Listings</h3>

                    <div class="box-tools">
					
					
					
					<form action="<?php echo base_url() ?>TeamMemberReport/MemberSort" method="POST" id="member_id" style="width:110px;float:left;padding-top: 10px;">
                        <div class="input-group">
							<select id="member_id" name="member_id"  style="width:100%"   onchange='this.form.submit()'>
							<option >Filter By Member</option>
							<option value="">All</option>		
							<?php 					
							if(!empty($member_names))
							{
								foreach($member_names as $record)
								{
								
							?>		
						<option value="<?php echo $record->userId ?>"><?php echo $record->name ?></option>
							<?php 	
								}		
							}
								?>
							</select>
                            </div>
                        </form>

                        <form action="<?php echo base_url() ?>TeamMemberReport/MemberReportListing/" method="POST" id="searchList" enctype="multipart/form-data" style="width:200px;float:left;padding-top: 10px;">

                            <div class="input-group">

                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>

                              <div class="input-group-btn">

                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>

                              </div>

                            </div>

                        </form>

                    </div>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">

                  <table class="table table-hover">

                    <tr>

					    <th>Sl.No</th>
						
						<th>Member Id</th>

                        <th>Member Name</th>
						
						<th>Enquiry Number</th>
						
						<th>Grade</th>
						
						<th>Project Id</th>
	
                      <!--  <th style="width: 140px;" class="text-center">Actions</th>-->

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
					
					
                    if(!empty($TeamMemberListingsRecords))

                    {

                        foreach($TeamMemberListingsRecords as $record)

                        {
						$i = $i + 1;

                    ?>

                    <tr>
						
						<td><?php  echo $i;?></td>
                        <td><?php  echo $record->member_id ?></td>
						<td><?php  echo $record->member_name ?></td>
						<td><?php  echo $record->enquiryNo ?> - <?php  echo $record->project_title ?></td>
						<td><?php  echo $record->grade ?></td>
						<td><?php  echo $record->projectId ?></td>



                        <!--<td class="text-center">
						

                <a class="btn btn-sm btn-info" href="<?php echo base_url().'ProjectShedule/editProjectShedule/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>|  

                            <a class="btn btn-sm btn-danger deleteProjectShedule" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>-->

                    </tr>

                    <?php

                        }

                    }

                    ?>

                  </table>

                  

                </div><!-- /.box-body -->

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

            jQuery("#searchList").attr("action", baseURL + "TeamMemberReport/MemberReportListing/" + value);

            jQuery("#searchList").submit();

        });

    });

</script>

