<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



/**

 * Class : Delegate Controller

 * Delegate Class to control all delegate related operations.

 */

class exportProjectShedule extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        parent::__construct();

        $this->load->model('ProjectShedule_model');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the user

     */

    public function index()

    {

        $this->global['pageTitle'] = 'ISC: Project Schedule Export';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	
	



        function exportProjectShedule()
		{
		 
		$fileName = 'ProjectShedule-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $exportProjectShedule = $this->ProjectShedule_model->getExportInfo();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Enquiry No');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Client');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact Person');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Project Number');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Project Title');  
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Category'); 
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Team'); 
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Deadline');   
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Estimated Budget'); 
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Status');  
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Delivery Date'); 
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Bill No');  
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Bill Date');  
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Income');  
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'client FeedBack');  
 
		$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Created');  
		$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Modified'); 
		 
		
        // set Row
        $rowCount = 2;
        foreach ($exportProjectShedule as $val) 
        {
 			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $val['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val['enquiryNo']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val['date']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $val['client']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $val['contactPerson']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $val['projectNumber']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $val['projectTitle']);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $val['category']);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $val['team']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $val['deadline']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $val['estimatedBudget']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $val['status']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $val['deliveryDate']);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $val['billNo']);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $val['billDate']);
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $val['Income']);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $val['clientFeedBack']);
		
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $val['created']);
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $val['modified']);
			
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
         redirect(site_url().$fileName);              
    }
		
    /**

     * Page not found : error 404

     */

    function pageNotFound()

    {

        $this->global['pageTitle'] = 'SCMS : 404 - Page Not Found';

        

        $this->loadViews("404", $this->global, NULL, NULL);

    }

  

}



?>