
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Invoice Listing Management 
        <small>  </small>
      </h1>
    </section>
   <section class="content">
        
        <div class="row">
		
            <div class="col-xs-12">

              <div class="box">
			  
                <div class="box-header">
				
                    <h3 class="box-title">Invoice List</h3>


						
					<form action="<?php echo base_url() ?>ProjectShedule/projectSort" method="POST" id="project_id" style="float:right;padding-top: 10px;">
					<span style="float:left; margin-right: 5px; padding-top: 5px;"><strong>Project Sort: </strong></span>
							<select id="project_status" name="project_status"  style="width:150px; float: left; margin-right: 5px;"  class="form-control">
							<option value="All">Select Status</option>
							<option value="All">All</option>
							<option <?php if(isset($_SESSION["project_status"])) { if($_SESSION["project_status"] == 0) { echo "selected"; } }?> value="0">Pending</option>
							<option <?php if(isset($_SESSION["project_status"])) { if($_SESSION["project_status"] == 1) { echo "selected"; } }?> value="1">Paid</option>
							</select>
                      
							<select id="project_id" name="project_id"  style="width:250px; float: left; margin-right: 5px;"  class="form-control">
							<option value="">Select Project</option>
							<option value="All">All</option>
							
							<?php 					
							if(!empty($ProjectDetails))
							{
								foreach($ProjectDetails as $record)
								{
								
							?>		
						<option <?php if(isset($_SESSION["project_id"])) { if($_SESSION["project_id"] == $record->id) { echo "selected"; } }?> value="<?php echo $record->id ?>"><?php echo $record->projectTitle ?></option>
							<?php 	
								}		
							}
								?>
							</select>
							
							<input class="btn btn-primary" style="float: left;" type="submit" value="Submit">
                          
                        </form>
					<div id="autoUpdate" style="display:none;">
					<form role="form" id="statusUpdate" action="<?php echo base_url() ?>ProjectShedule/statusUpdate" method="post" role="form" enctype="multipart/form-data" >
					
					<select id="status" name="status"  style="width:10%;"   >
					
						<option value="">select</option>
						<option value="0">Pending</option>
						<option value="1">Paid</option>
			
					</select>
					<input type="submit" style="" class="btn btn-primary btn-sm" value="Submit" />
					</div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
					    <th>Select</th>
						
                        <th>Project Name</th>

                        <th>Invoice pdf</th>
						
						<th>Payment Due Date</th>
						
						<th>Currency</th>
						
						<th>Status</th>
						
						<th>Amount</th>
                        <th style="width: 140px;" class="text-center">Actions</th>
                    </tr>
					&nbsp;&nbsp;&nbsp;<input type="checkbox" class="chkbox" onClick="toggle(this)" /> Check All<br/>
                    <?php
                    if(!empty($invoice_pdf_details))
                    {
                        foreach($invoice_pdf_details as $record)
                        {$status=$record->status;
                    ?>

                    
				  		
						<td><input type="checkbox" name="myCheckboxes[]" id="myCheckboxes" class="chkbox"  value="<?php echo $record->id; ?>"></td>
						<td><?php echo $record->projectTitle ?></td>
						<td><?php echo $record->invoice_pdf ?></td>
						<td><?php echo $record->payment_due_date ?></td>
						<td><?php echo $record->currency?></td>
						<td><?php if($status=="" OR $status=="0"){ echo "Pending"; } else { echo "Paid"; }?></td>
						<td><?php echo $record->totalInvoiceAmount?></td>
						
                        <td class="text-center">
						
			<?php /*?><a class="btn btn-sm btn-info" href="<?php echo base_url().'ProjectShedule/editProjectInvoice/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a><?php */?>
					
			<a class="btn btn-sm btn-danger " href="<?php echo base_url()."invoice/". $record->invoice_pdf; ?>" target="_blank" title="download"><i class="fa fa-download"></i></a>  
			
			<a class="btn btn-sm btn-danger deleteInvoiceListing" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>


                        </td>
						
                    </tr>
                    <?php

                        }
						
                    }
					
                    ?>
                  </table>
</form>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
		
<p style="color:red;font-size:20px">Total Amount : <?php echo $total_amount; ?></p>  
<p style="color:red;font-size:20px">Total Paid Amount : <?php echo $total_amount - $pending_amount; ?></p>  
<p style="color:red;font-size:20px">Total Pending Amount : <?php echo $pending_amount; ?></p>  
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
            jQuery("#project_id").attr("action", baseURL + "ProjectShedule/projectSort/" + value);
			jQuery("#project_id").submit();
			
			<?php } else { ?>
			
			jQuery("#project_id").attr("action", baseURL + "ProjectShedule/InvoiceListing/" + value);
            jQuery("#project_id").submit();
			
			<?php } ?>
        });
    });
	


$('.chkbox').change(function(){
        if (this.checked) {
            $('#autoUpdate').fadeIn('slow');
        }
        else {
            $('#autoUpdate').fadeOut('slow');
        }                   
    });

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}



</script>