<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Project Schedule Management

        <small>Add, Edit, Delete</small>

      </h1>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-xs-12 text-right">

                <div class="form-group">
                   
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>ProjectShedule/addNew"><i class="fa fa-plus"></i> Add New</a>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header" style="padding: 19px;">

                    <h3 class="box-title">Project Schedule List</h3>

                    <div class="box-tools">
					
					<div class="input-group" style="width:110px;float:left;padding-top: 6px;">
                    
                  		  <a class="btn btn-primary btn-sm"  href="<?php echo base_url(); ?>ExportProjectShedule/exportProjectShedule"><i class="fa fa-plus"></i> export</a>

               		 </div>
					
					<form action="<?php echo base_url() ?>ProjectShedule/BrandSort" method="POST" id="category_id" style="width:110px;float:left;padding-top: 10px;">
                        <div class="input-group">
							<select id="category_id" name="category_id"  style="width:100%"   onchange='this.form.submit()'>
							<option value="">Filter By Brand</option>
							<option value="">All</option>		
							<?php 					
							if(!empty($brand_names))
							{
								foreach($brand_names as $record)
								{
								
							?>		
						<option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
							<?php 	
								}		
							}
								?>
							</select>
                            </div>
                        </form>

                        <form action="<?php echo base_url() ?>ProjectShedule/sheduleListing/" method="POST" id="searchList" enctype="multipart/form-data" style="width:200px;float:left;padding-top: 10px;">

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

					    <th>Sl. No</th>

                        <th>Project Number</th>
						
						<th>Project Title</th>
						
						<th>Working Status</th>
						
						<th>Category</th>
						
						<th>Brand</th>
						
						<th>Contact Person</th>
						
						
						
						

                        <th style="width: 290px;" class="text-center">Actions</th>

                    </tr>

                    <?php
					//print_r($sheduleListingRecords);
					
					$start_count = $this->uri->segment(3);
			
					
					if($start_count == "")
					{
						$i=0;
					}
					else
					{
						$i=$start_count;
					}
					
                    if(!empty($sheduleListingRecords))

                    {

                        foreach($sheduleListingRecords as $record)

                        {
						$i = $i + 1;

                    ?>

                    <tr>
						
						<td><?php  echo $i;?></td>
                        <td><?php  echo $record->projectNumber ?></td>
						<td><?php  echo $record->projectTitle ?></td>
						<td><?php  if(($record->workingStatus)==0){echo "Not Confirmed";}else if(($record->workingStatus)==1){echo "Work in Progress";}else {echo "Ended";} ?></td>
						<td><?php  echo $record->category_name ?></td>
						<td><?php  echo $record->client_name ?></td>
						
						<td><?php  echo $record->contact_person ?></td>



                        <td class="text-center">

						
						
						

                <a class="btn btn-sm btn-info" href="<?php echo base_url().'ProjectShedule/editProjectShedule/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |  

                            <a class="btn btn-sm btn-danger deleteProjectShedule" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>

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
			
			<?php if($sortEnable==1){?>
			jQuery("#searchList").attr("action", baseURL + "ProjectShedule/BrandSort/" + value);
			<?php }else { ?>
            jQuery("#searchList").attr("action", baseURL + "ProjectShedule/sheduleListing/" + value);
			<?php } ?>
            jQuery("#searchList").submit();

        });

    });

</script>

