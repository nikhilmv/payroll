<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i>Expense Listing Management

      
      </h1>

    </section>

    <section class="content">

        

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header">

                    <h3 class="box-title">Expense List</h3>

                    <div class="box-tools">
					
					<form action="<?php echo base_url() ?>Expenses/monthSort" method="POST" id="monthId" style="width:110px;float:left;padding-top: 0px; margin-left: 700px;">
                        <div class="input-group">
							<input type="date" class="form-control required" id="date" name="Date" id="Date" onchange='this.form.submit()' >
                         </div>
                    </form>

                        <form action="<?php echo base_url() ?>JobCategories/JobCategoriesListing/" method="POST" id="searchList" enctype="multipart/form-data">

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

					    <th>NO</th>

                        <th>Expense Title</th>
						
						<th>Category Name</th>
						 
						<th>Description</th>
						  
						<th>Amount</th>
						   
						<th>Date</th>

                        <th style="width: 140px;" class="text-center">Actions</th>

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
                    if(!empty($ExpenseListingsRecords))

                    {

                        foreach($ExpenseListingsRecords as $record)

                        {
						$i = $i + 1;

                    ?>

                    <tr>
						
						<td><?php  echo $i;?></td>
                        <td><?php  echo $record->expense_title; ?></td>
						<td><?php  echo $record->name; ?></td>
						<td><?php  echo $record->description; ?></td>
						<td><?php  echo $record->amount; ?></td>
						<td><?php  echo $record->date; ?></td>


                        <td class="text-center">
						

                <a class="btn btn-sm btn-info" href="<?php echo base_url().'Expenses/editExpenseListing/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>|  

                            <a class="btn btn-sm btn-danger deleteExpenseListing" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>

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
		
<?php if(isset($ExpenseListings)){  ?><div style="margin-left: 500px;"> <?php  echo $ExpenseListings; ?></div> <?php  }   ?>

<p style="color:red;font-size:20px">Total Amount : <?php echo $total_amount; ?></p>
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
            jQuery("#searchList").attr("action", baseURL + "Expenses/ListExpenses/" + value);
            jQuery("#searchList").submit();
			<?php } else { ?>
			jQuery("#searchList").attr("action", baseURL + "Expenses/monthSort/" + value);
            jQuery("#searchList").submit();
			<?php }?>



        });

    });

</script>

