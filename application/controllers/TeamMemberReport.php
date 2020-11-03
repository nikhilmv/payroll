<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



class TeamMemberReport extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        @parent::__construct();

        $this->load->model('MemberReport_model');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'Team Member Report Listings';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	


    


    function MemberReportListing()

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

            

           $count = $this->MemberReport_model->memberListingsCount($searchText);

			
			$returns = $this->paginationCompress ( "TeamMemberReport/MemberReportListing/", $count, 10, 3 );

			

            

            $data['TeamMemberListingsRecords'] = $this->MemberReport_model->memberListings($searchText, $returns["page"], $returns["segment"]);
			
			$data['member_names']=$this->MemberReport_model->get_member_names();
			

            $this->global['pageTitle'] = 'Team Member Report Listings';

            

            $this->loadViews("TeamMemberReportListing", $this->global, $data, NULL);

        }

    }
	
 function MemberSort()
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

            $data['TeamMemberListingsRecords'] = $this->MemberReport_model->member_Category_Sort($member_id, $returns["page"], $returns["segment"]);
			$data['member_names']=$this->MemberReport_model->get_member_names();	
            $this->global['pageTitle'] = 'Team Member Report Listings';
            $this->loadViews("TeamMemberReportListing", $this->global, $data, NULL);
        }
    
  }
  
  
  	public function getProjectDetails(){

		// POST data //Enquiry number
		$postData = $this->input->post();
		//load model
		$this->load->model('ProjectShedule_model');

		// get data
		$data = $this->ProjectShedule_model->getProjectDetails($postData);

		echo json_encode($data);
	}


    function pageNotFound()

    {

        $this->global['pageTitle'] = '404 - Page Not Found';

        

        $this->loadViews("404", $this->global, NULL, NULL);

    }

  

}



?>