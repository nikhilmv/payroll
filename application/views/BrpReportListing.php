<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> BRP Report Listings 

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

                    <h3 class="box-title">BRP Report Listings</h3>

                    <div class="box-tools">
					
					
					
					<form action="<?php echo base_url() ?>BrpReport/MemberSort" method="POST" id="member_id" style="width:110px;float:left;padding-top: 10px;">
                        <div class="input-group">
							<select id="member_id" name="member_id"  style="width:100%"   onchange='this.form.submit()' >
							<option >Filter By BRP</option>
							<option value="">All</option>		
							<?php 					
							if(!empty($brp_names))
							{
								foreach($brp_names as $record)
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
						
						<th>BRP Name</th>

                        <th>Enquiry Number</th>
						
						<th>Project Title</th>
						
						<th>Project Number</th>
						
						<th>Grade</th>

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
					
					
                    if(!empty($BrpListingsRecords))

                    {

                        foreach($BrpListingsRecords as $record)

                        {
						$i = $i + 1;

                    ?>

                    <tr>
						
						<td><?php  echo $i;?></td>
                        <td><?php  echo $record->name ?></td>
						<td><?php  echo $record->enquiryNo ?></td>
						<td><?php  echo $record->projectTitle ?></td>
						<td><?php  echo $record->projectNumber ?></td>
						<td><?php  echo $record->brp_grade ?></td>

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

