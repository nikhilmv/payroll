
<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Enquiry Management

        <small>Add, Edit, Delete</small>

      </h1>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-xs-12 text-right">

                <div class="form-group">
                   
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Enquiries/addNew"><i class="fa fa-plus"></i> Add New </a>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header">

                    <h3 class="box-title">Enquiries List</h3>

                    <div class="box-tools">
					
					<form action="<?php echo base_url() ?>Enquiries/EnquiriesSort" method="POST" id="id" style="width:110px;float:left;padding-top: 10px;margin-left:770px;">
                        <div class="input-group">
							<select id="id" name="id"  style="width:100%"   onchange='this.form.submit()'>
							<option >Filter By Brands</option>
							<option value="">All</option>		
							<?php 					
							if(!empty($client_names))
							{
								foreach($client_names as $record)
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

                        <form action="<?php echo base_url() ?>Enquiries/enquiriesListing/" method="POST" id="searchList" enctype="multipart/form-data">

                            <div class="input-group">

                              <input type="text" name="searchText" value="<?php if(isset($searchText)){ echo $searchText; } ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>

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

					    <th>Enquiry Number</th>

                        <th>BRP</th>

                        <th>Brand</th>

						<th>Contact Person</th>
						
						<th>Project Title</th>
						
						<th>Category</th>
						
						<th>Deadline</th>

						

                       

                        <th style="width: 210px;" class="text-center">Actions</th>

                    </tr>

                    <?php

                    if(!empty($enquirieslistingsRecords))

                    {

                        foreach($enquirieslistingsRecords as $record)

                        {
						
					
						
					

                    ?>

                    <tr>

					    

                        <td><?php echo $record->id ?></td>

                        <td><?php  echo $record->name ?></td>

						<td><?php echo $record->client_name ?></td>

						<td><?php echo $record->contact_person ?></td>
						
						<td><?php echo $record->project_title ?></td>
						
						<td><?php echo $record->category_name ?></td>
						
						<td><?php echo $record->deadline ?></td>
						
												
						
					
						
                        <td class="text-center">
						 <?php if( $record->doc_created_status==0){ ?>
						 <a class="btn btn-sm btn-info" style="background-color: #CE171F;border-color: #CE171F; min-width: 115px;" href="<?php echo base_url().'Enquiries/createProjectBriefDocument/'.$record->id; ?>" title="Create PBD Form">Create PBD Form</a>|
						<?php } else {?>
						 <a class="btn btn-sm btn-info" style="background-color: #5a5b5d;border-color:#ebebeb; min-width: 115px;" href="<?php echo base_url().'Enquiries/ProjectBriefDocument/'.$record->id; ?>" title="Create PBD Form">Update PBD Form</a>|
						 <?php } ?>

                <a class="btn btn-sm btn-info" href="<?php echo base_url().'Enquiries/editEnquiryListing/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a><!--|  

                            <a class="btn btn-sm btn-danger deleteenquiryListing" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>-->

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

            <?php if($sortEnable==0){?>
            jQuery("#searchList").attr("action", baseURL + "Enquiries/enquiriesListing/" + value);
            jQuery("#searchList").submit();
			<?php } else { ?>
			jQuery("#searchList").attr("action", baseURL + "Enquiries/EnquiriesSort/" + value);
            jQuery("#searchList").submit();
			<?php }?>

        });

    });

</script>

