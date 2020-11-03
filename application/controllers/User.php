<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
		$brp_query = $this->db->query('SELECT * FROM tbl_users');
		$brp = $brp_query->num_rows();
		$data['brp'] = $brp;
		
		$members_query = $this->db->query('SELECT * FROM tbl_members');
		$members = $members_query->num_rows();
		$data['members'] = $members;
		
		$brands_query = $this->db->query('SELECT * FROM brands');
		$brands = $brands_query->num_rows();
		$data['brands'] = $brands;
		
		$contacts_query = $this->db->query('SELECT * FROM contact');
		$contacts = $contacts_query->num_rows();
		$data['contacts'] = $contacts;
		
		$categories_query = $this->db->query('SELECT * FROM category');
		$categories = $categories_query->num_rows();
		$data['categories'] = $categories;
		
		$enquiries_query = $this->db->query('SELECT * FROM enquiries');
		$enquiries = $enquiries_query->num_rows();
		$data['enquiries'] = $enquiries;
		
		$project_query = $this->db->query('SELECT * FROM project_shedule');
		$project = $project_query->num_rows();
		$data['project'] = $project;
		
/*		
		$project_query = $this->db->query('SELECT SUM(payment_due_date) FROM invoice_pdf');
		$project = $project_query->result_array();
		$invoiceSum=$project[0]['SUM(payment_due_date)'];
		$data['invoiceTotal'] = $invoiceSum;*/
		//jan

		
$yearGraph = $this->input->post('yearGraph');
$data['yearGraph'] = $yearGraph;	
$project_query1 = $this->db->query("SELECT month(payment_due_date) as month , SUM(totalInvoiceAmount) as totalInvoiceSum FROM invoice_pdf where year(payment_due_date)='".$yearGraph."' AND status=1 GROUP BY month(payment_due_date) ORDER BY month asc");
		$project1 = $project_query1->result();
	
		
		if(isset($project1))
		{
		foreach($project1 as $value)
		{
			$items[$value->month]=$value->totalInvoiceSum;
			
		}
		}
		if(!isset($items))
		{
			$data['months'] = "0";
		}
		else
		{
			$List = implode(',', $items);
			$data['months'] = $List;
		}

		
$project_query2 = $this->db->query("SELECT month(date) as month , SUM(amount) as totalexpenses FROM expenses where year(date)= '".$yearGraph."' GROUP BY month(date) ORDER BY month asc");
		$project2 = $project_query2->result();
		
		
		if(isset($project2))
		{
		foreach($project2 as $value)
		{
			$items2[$value->month]=$value->totalexpenses;			
		}
		}
		
		if(!isset($items2))
		{
			$data['months2'] = "0";
		}
		else
		{
			$List2 = implode(',', $items2);
			$data['months2'] = $List2;
		}
	for($i=1;$i<=12;$i++)
		{
		if(!isset($items2[$i]))
		{
		$items2[$i]=0;
		}
		if(!isset($items[$i]))
		{
		$items[$i]=0;
		}
	}

		

		$project_query = $this->db->query('SELECT SUM(totalInvoiceAmount) FROM invoice_pdf');
		$project = $project_query->result_array();
		$invoiceSum=$project[0]['SUM(totalInvoiceAmount)'];
		
		$data['invoiceTotal'] = $invoiceSum;
		
		$project_query = $this->db->query('SELECT SUM(amount) FROM expenses');
		$project = $project_query->result_array();
		$expenseSum=$project[0]['SUM(amount)'];
		
		$data['expenseTotal'] = $expenseSum;
		
		//total earnings
		$project_query = $this->db->query('SELECT SUM(totalInvoiceAmount) as totalEarnings FROM invoice_pdf where status=1 ');
		$project = $project_query->result_array();
		$earningsSum=$project[0]['totalEarnings'];
		$data['totalEarnings'] = $earningsSum;
		
	$month = $this->input->post('month');
	$year = $this->input->post('year');
	$data['month'] = $month;
	$data['year'] = $year;


	if($month !="" && $year !="")
	{
	 $project_query = $this->db->query("select sum(totalInvoiceAmount) as sum from invoice_pdf where month(payment_due_date)='".$month."' AND year(payment_due_date)='".$year."' AND status=1");
	 $project = $project_query->result_array();
	 $project_query2 = $this->db->query("select sum(amount) as sum1 from expenses where month(date)='".$month."' AND year(date)='".$year."'"); 
	 $project2 = $project_query2->result_array();

	
	 $sum=$project[0]['sum'];
	 $sum1=$project2[0]['sum1'];
	 $total=$sum-$sum1;
	}
	else 
	{
	 $project_query = $this->db->query("select sum(totalInvoiceAmount) as sum from invoice_pdf where status=1 ");
	 $project = $project_query->result_array();
	 $project_query2 = $this->db->query("select sum(amount) as sum1 from expenses "); 
	 $project2 = $project_query2->result_array();
	 $project_query3 = $this->db->query("select sum(amount) as sum2 from settings ");
	 $project3 = $project_query3->result_array();
	 
	 $invoiceTotal=$project[0]['sum'];
	 $expenseTotal=$project2[0]['sum1'];
	 $inhand=$project3[0]['sum2'];
	
	 $total=$invoiceTotal-$expenseTotal+$inhand;
	}
	$data['totalEarnings'] = $total;
		
		$project_query5 = $this->db->query("SELECT year(startDate) as startYear FROM settings");
		$project5= $project_query5->result();
		 //$startYear=$project5[0]['startYear'];
		 $array = json_decode(json_encode($project5), true);
		$startYear=$array[0]['startYear'];
		$data['startYear'] = $startYear;
		

        $this->global['pageTitle'] = 'Dashboard';
        
        $this->loadViews("dashboard", $this->global, $data , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userListingCount($searchText);

			$returns = $this->paginationCompress( "User/userListing/", $count,10, 3 );
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'BRP Listing';
            
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }
	
	function totalEarning()
	{

	
	}
	
	function teamMemberListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->teamMemberListingCount($searchText);

			$returns = $this->paginationCompress( "User/teamMemberListing/", $count,10, 3 );
            
            $data['memberRecords'] = $this->user_model->teamMemberListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Team Member Listing';
            
            $this->loadViews("members", $this->global, $data, NULL);
        }
    }
	
	
	function superAdminListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->superAdminListingCount($searchText);

			$returns = $this->paginationCompress( "User/superAdminListing/", $count,10, 3 );
            
            $data['userRecords'] = $this->user_model->superAdminListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Super Admin Listing';
            
            $this->loadViews("superAdmin", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }
	
	 function addNewMember()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Add New User';

            $this->loadViews("addNewMember", $this->global, $data, NULL);
        }
    }
	
	 function addNewMembers()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
			$this->form_validation->set_rules('designation','Designation','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewMember();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $designation = ucwords(strtolower($this->security->xss_clean($this->input->post('designation'))));
				
                $userInfo = array('email'=>$email, 'name'=> $name,
                                    'mobile'=>$mobile,'designation'=>$designation, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewMembers($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Member created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Member creation failed');
                }
                
                redirect('User/teamMemberListing');
            }
        }
    }
	

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('User/userListing');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        /*
		if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
		*/
        //else
        //{
            if($userId == null)
            {
                redirect('User/userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
	
            
            $this->global['pageTitle'] = 'Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
 //  }
   
   
   
   
       function editMember($userId = NULL)
    {
        /*
		if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
		*/
        //else
        //{
            if($userId == null)
            {
                redirect('User/teamMemberListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getMemberInfo($userId);
	
            
            $this->global['pageTitle'] = 'Edit User';
            
            $this->loadViews("editMember", $this->global, $data, NULL);
        }
   // }
    
	function editMemberDetails()
	{
	
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
			$this->form_validation->set_rules('designation','Designation','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editMember($userId);
            }
            else
            {
                $name = $this->security->xss_clean($this->input->post('fname'));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
             
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
				$designation = ucwords(strtolower($this->security->xss_clean($this->input->post('designation'))));
                
                $userInfo = array();
                
 
                    $userInfo = array('email'=>$email,
                        'name'=>$name, 'mobile'=>$mobile, 'designation'=>$designation, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
            
                
                $result = $this->user_model->editMember($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Member updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Member updation failed');
                }
                
                redirect('User/teamMemberListing');
            }
        }
    
	}
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
				
				$company_name = $this->security->xss_clean($this->input->post('company_name'));
				$company_address = $this->security->xss_clean($this->input->post('company_address'));
				$bank_details = $this->security->xss_clean($this->input->post('bank_details'));
				$paypal_email = $this->security->xss_clean($this->input->post('paypal_email'));
				$company_phone1 = $this->security->xss_clean($this->input->post('company_phone1'));
				$company_phone2 = $this->security->xss_clean($this->input->post('company_phone2'));
				
				$current_photo= $this->input->post('logo');
				
				$logo=$this->uplo();	
				
				if($logo == 'null.jpg')

				{
				  if($current_photo != "")
				  {
				  	$logo = $current_photo;
				  } 

				}
				
				$data["company"] =  $this->user_model->getCompanyName($roleId);

				$this->load->view('includes/footer',$data);
				
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name, 'mobile'=>$mobile, 'company_name'=>$company_name, 'company_address'=>$company_address, 'bank_details'=>$bank_details, 'paypal_email'=>$paypal_email, 'company_phone1'=>$company_phone1, 'company_phone2'=>$company_phone2, 'logo'=>$logo, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=>ucwords($name), 'mobile'=>$mobile, 'company_name'=>$company_name, 'company_address'=>$company_address, 'bank_details'=>$bank_details, 'paypal_email'=>$paypal_email, 'company_phone1'=>$company_phone1, 'company_phone2'=>$company_phone2, 'logo'=>$logo, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
				if($roleId == 1)
				{
					redirect('User/superAdminListing');
				}
				else
				{
                	redirect('userListing','refresh');
				}
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
	   /*
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
		*/
        //else
       // {
            $userId = $this->input->post('userId');
           // $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
       // }
    }
	
	 function deleteMember()
    {
	   /*
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
		*/
        //else
       // {
            $userId = $this->input->post('userId');
           // $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteMember($userId);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
       // }
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = '404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'User Login History';
            
            $this->loadViews("loginHistory", $this->global, $data, NULL);
        }        
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? 'CodeInsect : My Profile' : 'CodeInsect : Change Password';
        $this->loadViews("profile", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|callback_emailExists');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('profile/'.$active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('profile/'.$active);
            }
        }
    }

    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
	
	
	function uplo()

		 {	
	
			$config['upload_path'] = 'images';
	
			$config['allowed_types'] = 'png|PNG';
			
			$config['file_name'] = "logo.png";
			
			$config['overwrite'] = TRUE;
	
			$this->load->library('upload', $config);
	
			
			if ( ! $this->upload->do_upload('userfile'))

			{
	
				 $update['image']=$this->input->post('logo');
		
				 return "null.jpg";
			}
		
		    else
		
			{
				$data = array('upload_data' => $this->upload->data());
	
				$pic=$data["upload_data"]["file_name"];
	
				$img_array = array();
		
				$img_array['image_library'] = 'gd2';
		
				$img_array['maintain_ratio'] = TRUE;
		
				$img_array['source_image'] = 'images' . $pic;
		
				$img_array['width'] = 280;

				$this->load->library('image_lib', $img_array);
		
				$this->image_lib->resize();

				return $pic;				

			}

	

		}
		
}

?>