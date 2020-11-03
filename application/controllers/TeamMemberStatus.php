<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



class TeamMemberStatus extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        @parent::__construct();

        $this->load->model('MemberStatusModel');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'Team Member Status Listings';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	


    


    function MemberStatusListing()

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
           // $count = $this->MemberStatusModel->memberListingsCount($searchText);
			//$returns = $this->paginationCompress ("TeamMemberStatus/MemberStatusListing/", $count, 10, 3 );
			$data['member_names']=$this->MemberStatusModel->get_member_names();
            $this->global['pageTitle'] = 'Team Member Status Listings';
            $this->loadViews("MemberStatusListing", $this->global, $data, NULL);

        }
    }
	
/* function MemberSort()
  {
  
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $member_id = $this->security->xss_clean($this->input->post('member_id'));
            $data['member_id'] = $member_id;
            $this->load->library('pagination');
         	$count = $this->MemberReport_model->member_Category_SortCount($member_id);
			$returns = $this->paginationCompress ( "TeamMemberReport/MemberReportListing/", $count, 10, 3 );

			$data['member_names']=$this->MemberStatusModel->get_member_names();
            $this->global['pageTitle'] = 'Team Member Report Listings';
            $this->loadViews("TeamMemberReportListing", $this->global, $data, NULL);
        }
    
  }*/
  
  
/*  	public function getProjectDetails(){

		// POST data //Enquiry number
		$postData = $this->input->post();
		echo 'hellow: ' . $postData; 
		
		//load model
		$this->load->model('MemberStatusModel');

		// get data
		$projectId = $this->MemberStatusModel->getProjectId($postData);
	 
		$data = $this->MemberStatusModel->getProjectDetails($projectId);

		echo json_encode($data);
	}*/
	
 function getProjectDetails()
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
           // $count = $this->MemberStatusModel->memberListingsCount($searchText);
			//$returns = $this->paginationCompress ("TeamMemberStatus/MemberStatusListing/", $count, 10, 3 );

			
			
           $team_member_id = $this->security->xss_clean($this->input->post('team_member_id'));
		   $status_id = $this->security->xss_clean($this->input->post('status_id'));
		   
		   if($team_member_id != '')
		   {
		   		$_SESSION["team_member_id"] = $team_member_id;
		   }
		   else
		   {
		   		$team_member_id = $_SESSION["team_member_id"];
		   }
		   
		   if($status_id != '')
		   {
		   		$_SESSION["status_id"] = $status_id;
		   }
		   else
		   {
		   		$status_id = $_SESSION["status_id"];
		   }
			
			
			
			
            $data['team_member_id'] = $team_member_id;
			
			$projectId=$this->MemberStatusModel->getAllProjectId($team_member_id);	
			
			
			$count = $this->MemberStatusModel->getProjectDetailsCount($projectId,$status_id);
			$returns = $this->paginationCompress ("TeamMemberStatus/getProjectDetails/", $count, 10, 3 );
			
			$data['ProjectDetails']=$this->MemberStatusModel->getProjectDetails($projectId,$status_id, $returns["page"], $returns["segment"]);	
	
			$data['member_names']=$this->MemberStatusModel->get_member_names();	
            
			$this->global['pageTitle'] = 'Team Member status Listings';
			
            $this->loadViews("MemberStatusListing", $this->global, $data, NULL);
        }
    
  }


    function pageNotFound()

    {

        $this->global['pageTitle'] = '404 - Page Not Found';

        

        $this->loadViews("404", $this->global, NULL, NULL);

    }

  

}



?>