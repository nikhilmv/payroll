<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Contacts Management 
        <small> Add, Edit, Delete </small>
      </h1>
    </section>
   <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Contacts/addNew"><i class="fa fa-plus"></i> Add New</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Contacts List</h3>
                    <div class="box-tools">
	
					    <form action="<?php echo base_url() ?>Contacts/BrandSort" method="POST" id="category_id" style="width:110px;float:left;padding-top: 10px;">
                        <div class="input-group">
							<select id="category_id" name="category_id"  style="width:100%"   onchange='this.form.submit()'>
							<option >Filter By Brand</option>
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
						
                       <form action="<?php echo base_url() ?>Contacts/Contacts/" method="POST" id="searchList" enctype="multipart/form-data"  style="width:200px;float:left;padding-top: 10px;">
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
					    
                        <th>Name</th>
                        <th>Email</th>
						<th>Mobile</th>
						<th>Brand Name</th>
						<th>Created</th>
                        <th style="width: 140px;" class="text-center">Actions</th>
                    </tr>

                    <?php
                    if(!empty($ContactsListingsRecords))
                    {
                        foreach($ContactsListingsRecords as $record)
                        {
                    ?>

                    <tr>
				    <!--<td><img src="<?php //echo str_replace("admin/","",site_url()); ?>uploads/faculty/<?php //echo $record->image ?>" style="height: 75px;"/></td>-->
                        
                        <td><?php  echo $record->name ?></td>
						<td><?php echo $record->email ?></td>
						<td><?php echo $record->mobile ?></td>
						<td><?php echo $record->brand_name?></td>
						<td><?php echo $record->created?></td>
                        <td class="text-center">
						
						<a class="btn btn-sm btn-info" href="<?php echo base_url().'Contacts/editContactListing/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>|  
                        <a class="btn btn-sm btn-danger deleteContactListing" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
            jQuery("#searchList").attr("action", baseURL + "Contacts/Contacts/" + value);
            jQuery("#searchList").submit();
			<?php } else { ?>
			jQuery("#searchList").attr("action", baseURL + "Contacts/BrandSort/" + value);
            jQuery("#searchList").submit();
			<?php }?>
        });
    });
</script>

