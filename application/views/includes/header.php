<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $pageTitle; ?></title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.4 -->

    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- FontAwesome 4.3.0 -->

    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Ionicons 2.0.0 -->

    <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->

    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins 

         folder instead of downloading all of them to reduce the load. -->

    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <style>

    	.error{

    		color:red;

    		font-weight: normal;

    	}

    </style>

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">

        var baseURL = "<?php echo base_url(); ?>";

    </script>

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script type="text/javascript" src="<?php echo base_url(); ?>js/tinymce/tinymce.min.js"></script>

<script>



$(document).ready(function() {



    tinymce.init({

        selector: "textarea#tinymce",

        theme: "modern",

        //width: 400,

        height: 300,

        plugins: [

             "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",

             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",

             "save contextmenu directionality emoticons template paste textcolor"

       ],

       content_css: "../assets/css/bootstrap.css",

       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify bullist numlist forecolor | outdent indent | l      ink | ", 

       style_formats: [

            {title: 'Bold text', inline: 'b'},

            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},

            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},

            {title: 'Example 1', inline: 'span', classes: 'example1'},

            {title: 'Example 2', inline: 'span', classes: 'example2'},

            {title: 'Table styles'},

            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}

        ]

    });

});



</script>



  </head>

  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

      

      <header class="main-header">

        <!-- Logo -->

        <a href="<?php echo base_url(); ?>" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini"><b>Admin</b></span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg"><img style="width: 150px; padding-right: 10px;" src="<?php echo base_url(); ?>images/logo.png"></span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->

         <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle navigation</span>

          </a>-->

          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <li class="dropdown tasks-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                  <i class="fa fa-history"></i>

                </a>

                <ul class="dropdown-menu">

                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>

                </ul>

              </li>

              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>

                  <span class="hidden-xs"><?php echo $name; ?></span>

                </a>

                <ul class="dropdown-menu">

                  <!-- User image -->

                  <li class="user-header">

                    

                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />

                    <p>

                      <?php echo $name; ?>

                      <small><?php echo $role_text; ?></small>

                    </p>

                    

                  </li>

                  <!-- Menu Footer-->

                  <li class="user-footer">
                    <!--
                    <div class="pull-left">

                      <a href="<?php // echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>

                    </div>
-->
                    <div class="pull-right">

                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>

                    </div>

                  </li>

                </ul>

              </li>

            </ul>

          </div>

        </nav>

      </header>

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">

              <a href="<?php echo base_url(); ?>dashboard">

                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>

              </a>

            </li>

           </ul>
		   
		    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

            <?php if($role == ROLE_ADMIN) { ?>


<h4 class="sidebar-menu-h4" id="sidebar-menu-2">Super Admin</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-2-ul" style="display:none;">

			 

			  <li class="treeview <?php if (strpos($actual_link, 'User/superAdminListing') !== false ) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'User/superAdminListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url();?>User/superAdminListing">

                <i class="fa fa-users"></i>

                <span>Super Admin</span>

              </a>

            </li>
			
			<li class="treeview">

              <a class="<?php if (strpos($actual_link, 'Expenses/addNewInhand') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>Expenses/addNewInhand">

                <i class="fa fa-users"></i>

                <span>Settings</span>

              </a>

            </li>

		</ul>
		
		
		 <h4 class="sidebar-menu-h4" id="sidebar-menu-3">Resources</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-3-ul" style="display:none;">

			 

			  <li class="treeview <?php if (strpos($actual_link, 'User/userListing') !== false || strpos($actual_link, 'User/addNew') !== false || strpos($actual_link, '/editOld') !== false) { echo 'active'; } if(strpos($actual_link, 'User/addNewMember') !== false){echo '123';} ?>">

              <a class="<?php if (strpos($actual_link, 'User/userListing') !== false || strpos($actual_link, 'User/addNew') !== false || strpos($actual_link, '/editOld') !== false) { echo 'active'; } ?>" href="<?php echo base_url();?>User/userListing">

                <i class="fa fa-users"></i>

                <span>Business Manager</span>

              </a>

            </li>
			
			<li class="treeview <?php if (strpos($actual_link, 'User/teamMemberListing') !== false || strpos($actual_link, 'User/addNewMember') !== false || strpos($actual_link, 'User/editMember') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'User/teamMemberListing') !== false || strpos($actual_link, 'User/addNewMember') !== false || strpos($actual_link, 'User/editMember') !== false) { echo 'active'; } ?>" href="<?php echo base_url();?>User/teamMemberListing">

                <i class="fa fa-users"></i>

                <span>Team Members</span>

              </a>

            </li>

		</ul>
		
		<?php } ?>
		
		
		<?php if($role == ROLE_ADMIN || $role == 2) { ?>
		<h4 class="sidebar-menu-h4" id="sidebar-menu-4">Brands</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-4-ul" style="display:none;">

			 

			  <li class="treeview <?php if (strpos($actual_link, 'Brands/brandsListing') !== false || strpos($actual_link, 'Brands/addNew') !== false || strpos($actual_link, 'Brands/editbrandsListing') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'Brands/brandsListing') !== false || strpos($actual_link, 'Brands/addNew') !== false || strpos($actual_link, 'Brands/editbrandsListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url();?>Brands/brandsListing">

                <i class="fa fa-users"></i>

                <span>Brands</span>

              </a>

            </li>

		</ul>
		
		
		 <h4 class="sidebar-menu-h4" id="sidebar-menu-5">Contacts</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-5-ul" style="display:none;">

			 

			  <li class="treeview <?php if (strpos($actual_link, 'Contacts/Contacts') !== false || strpos($actual_link, 'Contacts/addNew') !== false || strpos($actual_link, 'Contacts/editContactListing') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'Contacts/Contacts') !== false || strpos($actual_link, 'Contacts/addNew') !== false || strpos($actual_link, 'Contacts/editContactListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url();?>Contacts/Contacts">

                <i class="fa fa-users"></i>

                <span>Contacts</span>

              </a>

            </li>
			 

		</ul>
		<?php } ?>
		
		<?php if($role == ROLE_ADMIN) { ?>
<h4 class="sidebar-menu-h4" id="sidebar-menu-6">Job Categories</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-6-ul" style="display:none;">

			 

			  <li class="treeview <?php if (strpos($actual_link, 'JobCategories/JobCategoriesListing') !== false || strpos($actual_link, 'JobCategories/addNew') !== false || strpos($actual_link, 'JobCategories/editJobCategory') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'JobCategories/JobCategoriesListing') !== false || strpos($actual_link, 'JobCategories/addNew') !== false || strpos($actual_link, 'JobCategories/editJobCategory') !== false) { echo 'active'; } ?>" href="<?php echo base_url();?>JobCategories/JobCategoriesListing">

                <i class="fa fa-users"></i>

                <span>Job Categories</span>

              </a>

            </li>
			 

		</ul>
	
		
		
		



<h4 class="sidebar-menu-h4" id="sidebar-menu-7">BD Form Fields</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-7-ul" style="display:none;">

			 
			 <li class="treeview <?php if (strpos($actual_link, 'BDForm/FormFields') !== false || strpos($actual_link, 'BDForm/addNew') !== false || strpos($actual_link, 'BDForm/editBDFormField') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'BDForm/FormFields') !== false || strpos($actual_link, 'BDForm/addNew') !== false || strpos($actual_link, 'BDForm/editBDFormField') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>BDForm/FormFields">

                <i class="fa fa-users"></i>

                <span>Form Fields</span>

              </a>

            </li>
		
</ul>
<?php } ?>
<?php if($role == ROLE_ADMIN || $role == 2) { ?>
<h4 class="sidebar-menu-h4" id="sidebar-menu-8">Enquiries</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-8-ul" style="display:none;">

			 
			 <li class="treeview <?php if (strpos($actual_link, 'Enquiries/enquiriesListing') !== false || strpos($actual_link, 'Enquiries/addNew') !== false || strpos($actual_link, 'Enquiries/editEnquiryListing') !== false || strpos($actual_link, 'Enquiries/ProjectBriefDocument') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'Enquiries/enquiriesListing') !== false || strpos($actual_link, 'Enquiries/addNew') !== false || strpos($actual_link, 'Enquiries/editEnquiryListing') !== false || strpos($actual_link, 'Enquiries/ProjectBriefDocument') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>Enquiries/EnquiriesListing">

                <i class="fa fa-users"></i>

                <span>Enquiries</span>

              </a>

            </li>
</ul>
<?php } ?>
<?php if($role == ROLE_ADMIN) { ?>
<h4 class="sidebar-menu-h4" id="sidebar-menu-9">Project Schedule</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-9-ul" style="display:none;">

			 
			 <li class="treeview <?php if (strpos($actual_link, 'ProjectShedule/sheduleListing') !== false || strpos($actual_link, 'ProjectShedule/addNew') !== false || strpos($actual_link, 'ProjectShedule/editProjectShedule') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'ProjectShedule/sheduleListing') !== false || strpos($actual_link, 'ProjectShedule/addNew') !== false || strpos($actual_link, 'ProjectShedule/editProjectShedule') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>ProjectShedule/sheduleListing">

                <i class="fa fa-users"></i>

                <span>Project Schedule</span>

              </a>

            </li>
			
			
		    <li class="treeview">

              <a class="<?php if (strpos($actual_link, 'ProjectShedule/Invoice') !== false ) { echo 'active'; } ?>" href="<?php echo base_url(); ?>ProjectShedule/Invoice">

                <i class="fa fa-users"></i>

                <span>Create Project Invoice</span>

              </a>

            </li>
			
			
		<li class="treeview ">

              <a class="<?php if (strpos($actual_link, 'ProjectShedule/InvoiceListing') !== false ) { echo 'active'; } ?>" href="<?php echo base_url(); ?>ProjectShedule/InvoiceListing">

                <i class="fa fa-users"></i>

                <span>Project Invoice Listing</span>

              </a>

          </li>
		  
		  <li class="treeview">

              <a class="<?php if (strpos($actual_link, 'ProjectShedule/SendInvoiceView') !== false ) { echo 'active'; } ?>" href="<?php echo base_url(); ?>ProjectShedule/SendInvoiceView">

                <i class="fa fa-users"></i>

                <span>Send Project Invoice</span>

              </a>

          </li>
			
		
</ul>

<?php } ?>

<?php if($role == ROLE_ADMIN || $role == 2) { ?>
<h4 class="sidebar-menu-h4" id="sidebar-menu-10">Delivery Schedule</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-10-ul" style="display:none;">

			 
			 <li class="treeview <?php if (strpos($actual_link, 'deliveryShedule/deliverySheduleListing') !== false || strpos($actual_link, 'DeliveryShedule/addNew') !== false || strpos($actual_link, 'DeliveryShedule/editDliveryListing') !== false) { echo 'active'; } ?>">

              <a class="<?php if (strpos($actual_link, 'deliveryShedule/deliverySheduleListing') !== false || strpos($actual_link, 'DeliveryShedule/addNew') !== false || strpos($actual_link, 'DeliveryShedule/editDliveryListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>deliveryShedule/deliverySheduleListing">

                <i class="fa fa-users"></i>

                <span>Delivery Schedule & Estimate</span>

              </a>

            </li>
		
</ul>
<?php }?>

<?php if($role == ROLE_ADMIN) { ?>
<h4 class="sidebar-menu-h4" id="sidebar-menu-11">Reports</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-11-ul" style="display:none;">

			 
			 <li class="treeview">

              <a class="<?php if (strpos($actual_link, 'TeamMemberReport/MemberReportListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>TeamMemberReport/MemberReportListing">

                <i class="fa fa-users"></i>

                <span>Team Member Feedback</span>

              </a>

            </li>
			
			
			<li class="treeview">

              <a class="<?php if (strpos($actual_link, 'BrpReport/BrpReportListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>BrpReport/BrpReportListing">

                <i class="fa fa-users"></i>

                <span>BRP Feedback</span>

              </a>

            </li>
			
			<li class="treeview">

              <a class="<?php if (strpos($actual_link, 'TeamMemberStatus/MemberStatusListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>TeamMemberStatus/MemberStatusListing">

                <i class="fa fa-users"></i>

                <span>Team Member Status</span>

              </a>

            </li>
			
			<li class="treeview">
              <a class="<?php if (strpos($actual_link, 'ExportProjects/exportProjects') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>ExportProjects/exportProjects">
                <i class="fa fa-users"></i>
                <span>Export Projects</span>
              </a>
            </li>
		
</ul>

<?php }?>

<?php if($role == ROLE_ADMIN) { ?>
<h4 class="sidebar-menu-h4" id="sidebar-menu-12">Expense Manager</h4>

			 <ul class="sidebar-menu" id="sidebar-menu-12-ul" style="display:none;">

			 
			 <li class="treeview">

              <a class="<?php if (strpos($actual_link, 'Expenses/ExpenseCategoryListing') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>Expenses/ExpenseCategoryListing">

                <i class="fa fa-users"></i>

                <span>Expense Categories</span>

              </a>

            </li>
			
			
			<li class="treeview">

              <a class="<?php if (strpos($actual_link, 'Expenses/addExpenses') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>Expenses/addExpenses">

                <i class="fa fa-users"></i>

                <span>Add Expenses</span>

              </a>

            </li>
			
			<li class="treeview">

              <a class="<?php if (strpos($actual_link, 'Expenses/ListExpenses') !== false) { echo 'active'; } ?>" href="<?php echo base_url(); ?>Expenses/ListExpenses">

                <i class="fa fa-users"></i>

                <span>List Expenses</span>

              </a>

            </li>
			
			
				
			
</ul>
<?php }?>




		


          

        </section>

        <!-- /.sidebar -->

      </aside>