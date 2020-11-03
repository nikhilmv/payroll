<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



class DeliveryShedule extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        @parent::__construct();

        $this->load->model('delivery_model');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'Enquiries Listings';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	


    


    function deliverySheduleListing()

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

            

           $count = $this->delivery_model->deliveryListingsCount($searchText);

			
			$returns = $this->paginationCompress ( "DeliveryShedule/Deliverylistings/", $count, 10, 3 );

			

            

            $data['deliverylistingsRecords'] = $this->delivery_model->Deliverylistings($searchText, $returns["page"], $returns["segment"]);
			

			

            $this->global['pageTitle'] = 'Enquiries Listings';

            

            $this->loadViews("deliverylistings", $this->global, $data, NULL);

        }

    }

  
   

   
  
   
    function addNew()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            $this->load->model('delivery_model');
			
			$data['projectInfo'] = $this->delivery_model->getprojectInfo();
			
			$data['clientInfo'] = $this->delivery_model->getClientInfo();
			
			$data['contactpersonInfo'] = $this->delivery_model->getContactpersonInfo();
			
				
						                          

            $this->global['pageTitle'] = 'Add New Delivery';



            $this->loadViews("addNewDelivery", $this->global,$data, NULL);

        }

    }
	
	
	
		
		
    function addNewDelivery()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            $this->load->library('form_validation');

            

            $this->form_validation->set_rules('client_id','Client','trim|required');

           

            

            if($this->form_validation->run() == FALSE)

            {

                $this->addNew();

            }

            else

            {
			
               
			   
			   				
                $project_number_id = $this->input->post('project_number_id');
								
                $client_id = $this->input->post('client_id');
				
				$contact_person_id = $this->input->post('contact_person_id');
				
				$project_title = $this->input->post('project_title');
				
				$deliverables = $this->input->post('deliverables');
				
				$timelines = $this->input->post('timelines');
				

				$estimated_budget = $this->input->post('estimated_budget');
				
				$deliverables=$this->input->post('deliverables');
				
				
				
                $deliveryInfo = array('project_number_id'=>$project_number_id, 'client_id'=>$client_id,'contact_person_id'=>$contact_person_id,'project_title'=>$project_title,'estimated_budget'=>$estimated_budget);

                
			
				 

                $this->load->model('delivery_model');

                $result = $this->delivery_model->addNewDelivery($deliveryInfo);

    

                $count1=count($deliverables);

				for($i=0;$i<$count1;$i++)
				{
	
					
					$deliverablesInfo = array('deliveryId'=>$result, 'Deliverables'=>$deliverables[$i],'Timelines'=>$timelines[$i]);
					
					$result1 = $this->delivery_model->addNewDeliveryInfo($deliverablesInfo);
		
				}
				
				if($result > 0)

                {

                    $this->session->set_flashdata('success', 'New delivery shedule created successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'New delivery shedule creation failed');

                }

                

                redirect('DeliveryShedule/deliverySheduleListing');

            }

        }

    }
   

    /**

     * This function is used load delegate edit information

     * @param number $Id : Optional : This is  id

     */

    function editDliveryListing($id = NULL)

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            if($id == null)

            {

                redirect('DeliveryShedule/deliverySheduleListing');

            }

            

            $data['DeliveryInfo'] = $this->delivery_model->getDeliveryListingInfo($id);

           $data['projectInfo'] = $this->delivery_model->getprojectInfo();
			
			
			$data['clientInfo'] = $this->delivery_model->getClientInfo();
			
			
			$data['contactpersonInfo'] = $this->delivery_model->getContactpersonInfo();
			
			$data['deliverablesInfo'] = $this->delivery_model->getdeliverablesInfo($id);
			
			
            $this->global['pageTitle'] = 'Edit Delivery Shedule & Estimate Listing';

            

            $this->loadViews("editDeliveryListing", $this->global, $data, NULL);

        }

    }

    

    

    /**

     * This function is used to edit the user information

     */

    function editDeliveryListingNew()

    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
     
            else
            {
			
				$formSubmit = $this->input->post('submitForm');
				
			
			   	$id = $this->input->post('id');	
					
                $project_number_id = $this->input->post('project_number_id');
								
                $client_id = $this->input->post('client_id');
				
				$contact_person_id = $this->input->post('contact_person_id');
				
				$project_title = $this->input->post('project_title');
				
				$deliverables = $this->input->post('deliverables');
				
				$timelines = $this->input->post('timelines');
				
				$new_deliverables = $this->input->post('new_deliverables');
				
				$new_timelines = $this->input->post('new_timelines');
				
				$estimated_budget = $this->input->post('estimated_budget');
				
				$deliveryId = $this->input->post('deliveryId');
		
				
 $DeliveryyInfo = array('project_number_id'=>$project_number_id, 'client_id'=>$client_id,'contact_person_id'=>$contact_person_id,'project_title'=>$project_title,'estimated_budget'=>$estimated_budget);
				
                $result = $this->delivery_model->editDeliveryListing($DeliveryyInfo, $id);
                $count1=count($deliverables);
				
				for($i=0;$i<$count1;$i++)
				{
	
					
					$deliverablesInfo = array('deliveryId'=>$id, 'Deliverables'=>$deliverables[$i],'Timelines'=>$timelines[$i]);
				
					$result1 = $this->delivery_model->editNewDeliveryInfo($deliverablesInfo, $id,$deliveryId[$i]);
		
				}
				
				$new_deliverables_count=count($new_deliverables);
				for($i=0;$i<$new_deliverables_count;$i++)
				{
	
					
					$new_deliverablesInfo = array('deliveryId'=>$id, 'Deliverables'=>$new_deliverables[$i],'Timelines'=>$new_timelines[$i]);
					
					$result1 = $this->delivery_model->addNewDeliveryInfo($new_deliverablesInfo);
		
				}
				
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Delivery Shedule & Estimate Listing updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Delivery Shedule & Estimate Listing updation failed');
                }
               
				
				if($formSubmit!=='Submit')
				{
                	//redirect('DeliveryShedule/editDeliveryListingNew');
					
	
					$this->delivery_model->changeClientStatus($project_number_id);
				 	$this->EmailDeliveryShedule($id);
				}
				redirect('DeliveryShedule/deliverySheduleListing');
            }
        }







    /**

     * This function is used to delete the faculty using userId

     * @return boolean $result : TRUE / FALSE

     */

    function deletedeliveryListing()

    {

        if($this->isAdmin() == TRUE)

        {

            echo(json_encode(array('status'=>'access')));

        }

        else

        {

            $id = $this->input->post('id');

                      

            $result = $this->delivery_model->deletedeliveryListing($id);

            

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

            else { echo(json_encode(array('status'=>FALSE))); }

        }

    }
	
	 function deletedeliverable()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->delivery_model->deletedeliverable($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }


	public function getClientDetails(){

		// POST data
		$postData = $this->input->post();
		//load model
		$this->load->model('Delivery_model');

		// get data
		$data = $this->Delivery_model->getClientDetails($postData);

		echo json_encode($data);
	}
	
	public function getContactDetails(){

		// POST data
		//client_id gets here
		$postData = $this->input->post();
		//load model
		$this->load->model('Delivery_model');

		// get data											 //client_id
		$data = $this->Delivery_model->getContactDetails($postData);

		echo json_encode($data);
	}
	
	
	
	
   function DownloadDeliveryShedule($id)
	{

	
	$this->load->model('Delivery_model');
	$data['DeliverySheduleInfo'] = $this->delivery_model->getDeliverySheduleInfo($id);
	$data['DeliveryData'] = $this->delivery_model->getdeliverablesInfo($id);
	
		 $DeliverySheduleDoc=$this->load->view('DeliverySheduleDocument', $data, true);
		 $pdfFilePath = "DeliverySchedule-".$id.".pdf";
		 $this->load->library('m_pdf');
		 //generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($DeliverySheduleDoc);
		 //download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "D");	
		
	
	}
	
	function EmailDeliveryShedule($id)
	{

		$this->load->model('Delivery_model');
		$data['DeliverySheduleInfo'] = $this->delivery_model->getDeliverySheduleInfo($id);
		$data['DeliveryData'] = $this->delivery_model->getdeliverablesInfo($id);

		 $DeliverySheduleDoc=$this->load->view('DeliverySheduleDocument', $data, true);
		 $pdfFilePath = "DeliverySchedule-".$id.".pdf";
		 $this->load->library('m_pdf');
		 //generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($DeliverySheduleDoc);
		 //download it.
		
		$this->m_pdf->pdf->Output($_SERVER['DOCUMENT_ROOT'].'/processflow/DeliverySheduleDoc/'.$pdfFilePath, "F");
		
		$subject = "Delivery Shedule Document";
		
		$message = "Delivery Shedule Document";
	
		
	
		$admin_email = $this->delivery_model->getAdmin_emailId();
		
	
		$this->load->library('email');
		//info@internationalspice.com
		$this->email->from('info@organicbps.com');
		$this->email->to($admin_email); 
	
		$this->email->subject($subject);
		$this->email->message($message); 
		
		$this->email->set_header('Header1', 'Value1');
		
		$path = $_SERVER['DOCUMENT_ROOT'].'/processflow/DeliverySheduleDoc/'.$pdfFilePath;						
		$this->email->attach($path); 
		$this->email->send();
		unlink($_SERVER['DOCUMENT_ROOT'].'/processflow/DeliverySheduleDoc/'.$pdfFilePath);
		
		
		 redirect('DeliveryShedule/deliverySheduleListing');
	}
	
	
    /**

     * Page not found : error 404

     */

    function pageNotFound()

    {

        $this->global['pageTitle'] = '404 - Page Not Found';

        

        $this->loadViews("404", $this->global, NULL, NULL);

    }

  

}



?>