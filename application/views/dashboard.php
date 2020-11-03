	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
	
		<section class="content-header">
	
		  <h1>
	
			<i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
	
			<small>Control panel</small>
	
		  </h1>
	
		</section>
	
		
	
		<section class="content">
	
			<div class="row">
			
			<?php if($role == ROLE_ADMIN) { ?>
	
				<div class="col-lg-3 col-xs-6">
	
				  <!-- small box -->
	
				  <div class="small-box bg-aqua">
	
					<div class="inner">
	
					
	
					  <h3 style="font-size: 30px;">BRP</h3>
	
					  <p>BRP Management </p>
	
					</div>
	
					
	
					<a href="<?php echo base_url(); ?>User/userListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	
				  </div>
	
				</div><!-- ./col -->
				<?php } ?>
				
				<div class="col-lg-3 col-xs-6">
	
				  <!-- small box -->
	
				  <div class="small-box bg-aqua">
	
					<div class="inner">
	
					
	
					  <h3 style="font-size: 30px;">Brands</h3>
	
					  <p>Brands Management </p>
	
					</div>
	
	
					<a href="<?php echo base_url(); ?>Brands/brandsListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	
				  </div>
	
				</div>
				
				<div class="col-lg-3 col-xs-6">
	
				  <!-- small box -->
	
				  <div class="small-box bg-aqua">
	
					<div class="inner">
	
					
	
					  <h3 style="font-size: 30px;">Contacts</h3>
	
					  <p>Contacts Management </p>
	
					</div>
	
	
	
					<a href="<?php echo base_url(); ?>Contacts/Contacts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	
				  </div>
	
				</div>
				
				<div class="col-lg-3 col-xs-6">
	
				  <!-- small box -->
	
				  <div class="small-box bg-aqua">
	
					<div class="inner">
	
					
	
					  <h3 style="font-size: 30px;">Enquiries</h3>
	
					  <p>Enquiries Management </p>
	
					</div>
	
	
	
					<a href="<?php echo base_url(); ?>Enquiries/EnquiriesListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	
				  </div>
	
				</div>
	
			   
	
			  </div>
	
		</section>
	
	 
		 <section class="content">
	 <div class="row">
		 <div class="col-lg-8 col-xs-6" style="background-color:#CCCCCC;">
	<form name="form"  action="<?php echo base_url() ?>User/index" method="post"  enctype="multipart/form-data">	 
		<select name="month">
		  <option value="">select</option>
		  <option value="01" <?php if( $month== "01"){ echo "selected";} ?>>jan</option>
		  <option value="02" <?php if( $month== "02"){ echo "selected";} ?>>feb</option>
		  <option value="03" <?php if( $month== "03"){ echo "selected";} ?>>mar</option>
		  <option value="04" <?php if( $month== "04"){ echo "selected";} ?>>apr</option>
		  <option value="05" <?php if( $month== "05"){ echo "selected";} ?>>may</option>
		  <option value="06" <?php if( $month== "06"){ echo "selected";} ?>>jun</option>
		  <option value="07" <?php if( $month== "07"){ echo "selected";} ?>>jul</option>
		  <option value="08" <?php if( $month== "08"){ echo "selected";} ?>>aug</option>
		  <option value="09" <?php if( $month== "09"){ echo "selected";} ?>>sep</option>
		  <option value="10" <?php if( $month== "10"){ echo "selected";} ?>>oct</option>
		  <option value="11" <?php if( $month== "11"){ echo "selected";} ?>>nov</option>
		  <option value="12" <?php if( $month== "12"){ echo "selected";} ?>>dec</option>
		</select>
		
	<select name="year">
	<option value="">select</option>
	<?php	
	$starting_year  = $startYear;
	$ending_year    = date("Y");
	
	for($starting_year; $starting_year <= $ending_year; $starting_year++) 
	{ ?>
	
		
		<option value=<?php echo $starting_year; ?>  <?php if( $year == $starting_year ){ echo "selected";}?>><?php echo $starting_year; ?></option>
	
<?php 	}
	
	?>
	</select>	

	
		<input type="submit" class="btn btn-primary btn-sm" value="Submit" />
	</form>	
			 <h3>Total Earnings : <?php echo $totalEarnings; ?></h3> 
		 </div>
	 </div>

<div class="row">
	
<div class="col-lg-8 col-xs-6">
						
	
	<script src="<?php echo site_url(); ?>js/zingchart.min.js"></script>
	<style>#myChart { height:400px; width:100%;}
	zing-grid[loading]{height:450px;}
	#myChart-license-text{ display: none;}</style>
	
			<div id='myChart'></div>
		<script>ZC.LICENSE=["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];var myData = [<?php echo $brp; ?>,<?php echo $members; ?>,<?php echo $brands; ?>,<?php echo $contacts; ?>,<?php echo $categories; ?>,<?php echo $enquiries; ?>,<?php echo $project; ?>];
	
	var myConfig = {
		"graphset":[
			{
				"type":"bar",
				"title":{
					"text":"Project Brief Graph "
				},
				"scale-x":{
					"labels":["BRP","Members","Brands","Contacts","Categories","Enquiries","Project"]
				},
				"series":[
					{
						"values": myData
					}
				]
			}
		]
	};
	
	zingchart.render({ 
		id : 'myChart', 
		data : myConfig, 
		height : "100%", 
		width: "90%"
	});</script>
	
	
	</div>
</div>
			
<div class="row">

	<div class="col-lg-8 col-xs-6">
				
	<form name="form"  action="<?php echo base_url() ?>User/index" method="post"  enctype="multipart/form-data">					

	<select name="yearGraph">
		<option value="">select</option>
		<?php	
		$starting_year1  = $startYear;
		$ending_year1    = date("Y");
		
		for($starting_year1; $starting_year1 <= $ending_year1; $starting_year1++) 
		{ ?>
		
			
			<option value=<?php echo $starting_year1; ?>  <?php if( $yearGraph == $starting_year1 ){ echo "selected";}?>><?php echo $starting_year1; ?></option>
		
	<?php 	}
		
		?>
	</select>	

		<input type="submit" class="btn btn-primary btn-sm" value="Submit" />
	</form>

	<script src="<?php echo site_url(); ?>js/zingchart.min.js"></script>
	<style>
	#myChart2-license-text{ display: none !important;}
	</style>
	
			<div id='myChart2'></div>
	
	<?php 
	$items = array();
	$count = 0;
	$invoiceTotalDevided=$invoiceTotal/8;
	
	for($i=0;$i<=8;$i++)
	{
	$items[] = (round($invoiceTotalDevided*$i)); 
	}
	$List = implode('","', $items);
	// echo $List;
	
	?>

	<script>

	var myChart2 = {
	  "type": "bar",
	  "title": {
		"text": "Income Expense Graph"
	  },
	  "plot": {
		"value-box": {
		  "text": "%v"
		},
		"tooltip": {
		  "text": "%v"
		}
	  },
	  "legend": {
		"toggle-action": "hide",
		"header": {
		  "text": "Legend Header"
		},
		"item": {
		  "cursor": "pointer"
		},
		"draggable": true,
		"drag-handler": "icon"
	  },
	  "scale-x": {
		"values": [
		  "jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec"
		]
	  },
	  
	   
	  "series": [
		{
		  "values": [
			<?php echo $months;?>
		  ],
		  "text": "income"
		},
		{
		  "values": [
		   <?php echo $months2;?>
		  ],
		  "text": "expense"
		}
	  ]
	};
	
	window.pastelTheme = {
	palette : [
	['#FBFCFE', '#ff0000', '#ff0000', '#6FC9E3'], /* light blue */
	['#FBFCFE', '#33cc33', '#33cc33', '#5CD0B6'], /* light green */
	['#FBFCFE', '#D9D9D9', '#D9D9D9', '#CBCBCB'], /* light grey */
	['#FBFCFE', '#EB008B', '#EB008B', '#EB008B'], /* pink */
	],
	graph : {
	tooltip: {
	padding: '10px 15px',
	borderRadius: '3px'
	}
	}
	};
	
	zingchart.render({
	  id: "myChart2",
	  data: myChart2,
	  height: "480",
	  width: "90%",
	  defaults: pastelTheme,
	});
	</script>
	

	</div>
</div>
			
		</section>		
	
	</div>