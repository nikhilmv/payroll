<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



class ExportProjects extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {
ob_start();
        @parent::__construct();

        $this->load->model('ExportProjectsModel');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'Organic BPS : Export Projects Listings';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	


    


    function exportProjects()
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
			//$data['statuses']=$this->ExportProjectsModel->get_status_details();
            $this->global['pageTitle'] = 'Organic BPS : Export Projects';
            $this->loadViews("exportProjectsListing", $this->global, $data, NULL);

        }
    }
	
	function ExportProjectsDetails()
	{
        $status_value = $this->input->post('status_value');
		$fileName = 'ProjectShedule-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $exportProjectShedule = $this->ExportProjectsModel->getExportInfo($status_value);
		
		//print_r($exportProjectShedule);exit();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Project Number');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Project Title');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'BRP id');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Team');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Deadline');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Working Status');

        // set Row
        $rowCount = 2;
        foreach ($exportProjectShedule as $val) 
        {
		$brpID =  $val['brp_id'];
		$email=$this->ExportProjectsModel->getEmailBRP($brpID);
		$workingStatus =  $val['workingStatus'];
		if($workingStatus == 0)
		{
			$Status="Not Confirmed";
		}
		else if($WorkingStatus == 1)
		{
			$Status="Work in Process";
		}
		else if($WorkingStatus == 2)
		{
			$Status="Ended";
		}
		else
		{
		}
		
		$team=explode(',', $val['team']);
		$c=count($team);

		for($i=0;$i<$c;$i++)
		{
			$TeamMemberId=$team[$i];
			$TeamMemberName[$i]=$this->ExportProjectsModel->getTeamMemberName($TeamMemberId);
			
		}
		
		
		
		 $TeamMemberNames=implode(',', $TeamMemberName);
		

 			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $val['projectNumber']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val['client_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val['projectTitle']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $email);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $TeamMemberNames);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $val['deadline']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $Status);
         	
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
         redirect(site_url().$fileName);              
    
	}
	


    function pageNotFound()

    {

        $this->global['pageTitle'] = 'Organic BPS : 404 - Page Not Found';

        

        $this->loadViews("404", $this->global, NULL, NULL);

    }

  

}



?>