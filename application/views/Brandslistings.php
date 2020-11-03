<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Brand Management

        <small>Add, Edit, Delete</small>

      </h1>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-xs-12 text-right">

                <div class="form-group">
                   
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Brands/addNew"><i class="fa fa-plus"></i> Add New</a>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header">

                    <h3 class="box-title">Brand List</h3>

                    <div class="box-tools">

                        <form action="<?php echo base_url() ?>Brands/brandsListing/" method="POST" id="searchList" enctype="multipart/form-data">

                            <div class="input-group">

                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>

                              <div class="input-group-btn">

                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>

                              </div>

                            </div>

                        </form>

                    </div>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">

                  <table class="table table-hover" style="width: 100%;">

                    <tr>

					    <th style="width: 10%;">Sl No</th>

                        <th style="width: 10%;">Name</th>

                        <th style="width: 20%;">Website URL</th>

						<th style="width: 30%;">Description</th>
						
						<th style="width: 10%;">Logo</th>

                        <th style="width: 20%;" class="text-center">Actions</th>

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
					

                    if(!empty($brandslistingsRecords))

                    {

                        foreach($brandslistingsRecords as $record)

                        {
						$i = $i + 1;

                    ?>

                    <tr>

					    

                        <td style="width: 10%;"><?php  echo $i;?></td>

                        <td style="width: 10%;"><?php  echo $record->name ?></td>

						<td style="width: 20%;"><?php echo $record->website_url ?></td>

						<td style="width: 30%;"><?php echo $record->description ?></td>
						
						<td style="width: 10%;"><img src="<?php echo site_url(); ?>images/brands/<?php echo $record->logo ?>" style="width: 100%;"/></td>
					
						
                        <td style="width: 20%;" class="text-center">
						

                <a class="btn btn-sm btn-info" href="<?php echo base_url().'Brands/editbrandsListing/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>|  

                            <a class="btn btn-sm btn-danger deletebrandsListing" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>

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

            jQuery("#searchList").attr("action", baseURL + "Brands/brandsListing/" + value);

            jQuery("#searchList").submit();

        });

    });

</script>

