<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Enquiries extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        @parent::__construct();
        $this->load->model('enquiries_model');
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
	
    
    function enquiriesListing()
    {
    
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
		
		$userId = $this->session->userdata('userId');
		
 		$roleId=$this->enquiries_model->get_roleId($userId);
		
		$data['userId']=$userId;
		$data['roleId']=$roleId;
		
            $searchText = $this->security->xss_clean($this->input->post('searchText'));

            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
			
			
			if($roleId == 1)
			{
				$count = $this->enquiries_model->enquiriesListingsCount($searchText);
	
				$returns = $this->paginationCompress ( "Enquiries/enquiriesListing/", $count, 10, 3 );
	
				$data['enquirieslistingsRecords'] = $this->enquiries_model->Enquirieslistings($searchText, $returns["page"], $returns["segment"]);
			}
			
			
			else
			
			{
				$count = $this->enquiries_model->enquiriesListingsCount1($searchText, $userId);
	
				$returns = $this->paginationCompress ( "Enquiries/enquiriesListing/", $count, 10, 3 );
				$data['userId']=$userId;
				$data['enquirieslistingsRecords'] = $this->enquiries_model->Enquirieslistings1($searchText, $returns["page"], $returns["segment"], $userId );
			
			
			}
			
			
            $data['client_names']=$this->enquiries_model->get_client_names();	
            $data['sortEnable']="0";
            $this->global['pageTitle'] = 'Enquiries Listings';
			
	
            
            $this->loadViews("Enquirieslistings", $this->global, $data, NULL);
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
            $this->load->model('enquiries_model');
			
			$data['BRPInfo'] = $this->enquiries_model->getBRPInfo();
			
			
			$data['categoryInfo'] = $this->enquiries_model->getCategoryInfo();
			
			
			$data['clientInfo'] = $this->enquiries_model->getClientInfo();
			
			
			$data['contactpersonInfo'] = $this->enquiries_model->getContactpersonInfo();
			
			$userId= $this->session->userdata('userId');
			
			$data['userId']= $userId;
			$data['roleId']=$this->enquiries_model->get_roleId($userId);
			
		                        
            $this->global['pageTitle'] = 'Add New Enquiry';
            $this->loadViews("addNewEnquiry", $this->global,$data, NULL);
        }
    }
	
	
	
		
		
    function addNewEnquiry()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('project_title','Project Title','trim|required');
			$this->form_validation->set_rules('brp_id','BRP','required');
			$this->form_validation->set_rules('client_id','Client','required');
			$this->form_validation->set_rules('contact_person_id','Contact Person','required');
			$this->form_validation->set_rules('category_id','Category','required');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
			
               
			   
			   				
                $brp_id = $this->input->post('brp_id');
								
                $client_id = $this->input->post('client_id');
				
				$contact_person_id = $this->input->post('contact_person_id');
				
				$project_title = $this->input->post('project_title');
				
				$category_id = $this->input->post('category_id');
				
				$deadline = $this->input->post('deadline');
				
				
							
				
				//$image=$this->uplo();
				
                $enquiryInfo = array('brp_id'=>$brp_id, 'client_id'=>$client_id,'contact_person_id'=>$contact_person_id,'project_title'=>$project_title,'category_id'=>$category_id,'deadline'=>$deadline);
                
                $this->load->model('enquiries_model');
                $result = $this->enquiries_model->addNewEnquiry($enquiryInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Enquiry created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Enquiry creation failed');
                }
                
                redirect('Enquiries/enquiriesListing');
            }
        }
    }
   
    /**
     * This function is used load delegate edit information
     * @param number $Id : Optional : This is  id
     */
    function editEnquiryListing($id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('Enquiries/enquiriesListing');
            }
            
            $data['EnquiryInfo'] = $this->enquiries_model->getEnquiryListingInfo($id);

            $data['BRPInfo'] = $this->enquiries_model->getBRPInfo();
			
			
			$data['categoryInfo'] = $this->enquiries_model->getCategoryInfo();
			
			
			$data['clientInfo'] = $this->enquiries_model->getClientInfo();
			
			
			$data['contactpersonInfo'] = $this->enquiries_model->getContactpersonInfo();
			
			$userId= $this->session->userdata('userId');
			
			$data['userId']= $userId;
			
			$data['roleId']=$this->enquiries_model->get_roleId($userId);
			
			
			
            $this->global['pageTitle'] = 'Edit Enquiry Listing';
            
            $this->loadViews("editEnquiryListing", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editEnquiryListingNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
     
            else
            {
			
			   	$id = $this->input->post('id');	
					
                $brp_id = $this->input->post('brp_id');
								
                $client_id = $this->input->post('client_id');
				
				$contact_person_id = $this->input->post('contact_person_id');
				
				$project_title = $this->input->post('project_title');
				
				$category_id = $this->input->post('category_id');
				
				$deadline = $this->input->post('deadline');
		
				
				
 $enquiryInfo = array('brp_id'=>$brp_id, 'client_id'=>$client_id,'contact_person_id'=>$contact_person_id,'project_title'=>$project_title,'category_id'=>$category_id,'deadline'=>$deadline);
				
                $result = $this->enquiries_model->editEnquiryListing($enquiryInfo, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Enquiry Listing updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Enquiry Listing updation failed');
                }
                
                redirect('Enquiries/enquiriesListing');
            }
        }
		
		
		
			
	function EnquiriesSort()
	  {
  
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
		
        {   
            $id = $this->security->xss_clean($this->input->post('id'));

			if($id != '')
			{
			$_SESSION["id"] = $id;
			}
			if($id == '')
			{
			 $id=$_SESSION["id"];
			 
			}

            $data['id'] = $id;
			
            $this->load->library('pagination');
         	$count = $this->enquiries_model->Client_Category_SortCount($id);
			$returns = $this->paginationCompress("Enquiries/enquiriesListing/", $count, 10, 3 );
            $data['enquirieslistingsRecords'] = $this->enquiries_model->Client_Category_Sort($id, $returns["page"], $returns["segment"]);
			$data['client_names']=$this->enquiries_model->get_client_names();	
			
			
			$data['sortEnable']="1";
            $this->global['pageTitle'] = 'Enquiries Listings';
            $this->loadViews("Enquirieslistings", $this->global, $data, NULL);
        }
    
  }
    /**
     * This function is used to delete the faculty using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteenquiryListing()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->enquiries_model->deleteenquiryListing($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	
	
	
	
			function ProjectBriefDocument($id)
			{
					   
						 $data['EnquiryInfo'] = $this->enquiries_model->getEnquiryInfo($id);
						
						 $data['prompts'] = $this->enquiries_model->getPrompts($id);
						 
						$this->global['pageTitle'] = 'Project Brief Document';
						$this->loadViews("ProjectBriefDocument", $this->global,$data, NULL);
			}							 
			
			function createProjectBriefDocument($id)
			
			{
		   
		     $data['EnquiryInfo'] = $this->enquiries_model->getEnquiryInfo($id);

			
			 $data['prompts'] = $this->enquiries_model->getPromptsQuestion();
			 
            $this->global['pageTitle'] = 'Project Brief Document';
            $this->loadViews("ProjectBriefDocument", $this->global,$data, NULL);
			}
			
			function SendProjectBriefDocument()
			
			{
				$enquiry_id= $this->input->post('enquiry_id');
				$project_title= $this->input->post('project_title');
				$client_name = $this->input->post('client_id');
				
				$file=$this->do_upload();
				
				//print_r($file);exit();
				$file_count=count($file);
				
				
				for($d=0;$d<$file_count;$d++)
				{
				
					$fileInfo = array('enquiryId'=>$enquiry_id, 'file'=>$file[$d]['file_name']);
					
					
					$this->enquiries_model->insert($fileInfo);
				}
		

														
							$change_doc_created_status = array('doc_created_status'=>'1');
							
							
                            $this->enquiries_model->upadteDocCreatedStatus($change_doc_created_status,$enquiry_id);
							
							
							
							 $this->enquiries_model->deletePBD($enquiry_id);
							 
							
			
							 $bd_form_field_id= $this->input->post('bd_form_field_id');
							 					 
							 $count=count($bd_form_field_id);
							 
							 $prompt_answer= $this->input->post('prompt_answer');
							 
					         for($i=0;$i<$count;$i++)
							 {					
								$projectbdocInfo = array('enquiry_id'=>$enquiry_id, 'bd_form_field_id'=>$bd_form_field_id[$i],'prompt_answer'=>$prompt_answer[$i]);
								$result = $this->enquiries_model->InsertToProjectBriefDoc($projectbdocInfo);
							}
				
		
				
		$data['PbdDocPdfInfo'] = $this->enquiries_model->getPbdDocPdfInfo($enquiry_id);
		
		$data['PbdDocPdfInfo1'] = $this->enquiries_model->getPbdDocPdfInfo1($enquiry_id);
		

	

		//load the view and saved it into $invoice variable
		 $PBDocPDF=$this->load->view('PBDocPDF', $data, true);
		
         $pdfFilePath = "PBD-".$enquiry_id.".pdf";
		 
	     $savefile=$_SERVER['DOCUMENT_ROOT']."/processflow/ProjectBriefDocument/".$pdfFilePath;
        //load mPDF library
		$this->load->library('m_pdf');
		
		$path = $_SERVER['DOCUMENT_ROOT'].'/processflow/ProjectBriefDocument/'.$pdfFilePath;
		
				if (file_exists($path))  
				{ 
					unlink($path);
				} 
     	
       //generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($PBDocPDF);
        //download it.
		//$this->m_pdf->pdf->Output($pdfFilePath, "D");	
		//save it.
		
		$this->m_pdf->pdf->Output($savefile,'F');   
		
		
		$data = array('project_brief_document_name'=>$pdfFilePath);
		$this->enquiries_model->PBDocUpdate($enquiry_id,$data);
		
		
		
		
		
		//send email to GM
		
		$to_email=$this->enquiries_model->getAdminEmail();
	
		$to_email=$to_email->email;
		//$to_email='asd@mail.com';
		
		
		
		$subject = $enquiry_id . "-" . $client_name . "-" . $project_title;
		
		$message = " - Project Brief Document";
	
	    
	
	 
		$this->load->library('email');
		
		$this->email->from('info@organicbps.com', 'Processflow Enquiry');
        $this->email->to($to_email); 
        //$this->email->cc('sreejithkongolil@gmail.com'); 
       // $this->email->bcc('sreejithkongolil@hotmail.com'); 
        $this->email->subject($subject);
        $this->email->message($message); 
	/* This function will return a server path without symbolic links or relative directory structures. */
	$path = $_SERVER['DOCUMENT_ROOT'].'/processflow/ProjectBriefDocument/'.$pdfFilePath;
	
	
	
	$fileDocument = $this->enquiries_model->getfileName($enquiry_id);
	$file_count1 = $this->enquiries_model->getfileCount($enquiry_id);
	
	for($k=0;$k<$file_count1;$k++)
	{
		$filName=$fileDocument[$k]['file'];
		
		
		$path2 = $_SERVER['DOCUMENT_ROOT'].'/processflow/pdf/pdfs/'.$filName;
		
		$this->email->attach($path2);
	}
	
	
		
	$this->email->attach($path);
	$this->email->send();
	
  	
				
				
				
				
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'PBD inserted successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'PBD  updation failed');
                }
                
                redirect('Enquiries/enquiriesListing');
							 
							
			
			}
			
			
			
			
			
		public function getContactDetails(){
		// POST data
		//client_id gets here
		$postData = $this->input->post();
		//load model
		$this->load->model('enquiries_model');
		// get data											 //client_id
		$data = $this->enquiries_model->getContactDetails($postData);
		echo json_encode($data);
	}
			
			
			
		function do_upload()
	{       
		$this->load->library('upload');
	
		$files = $_FILES;
		$cpt = count($_FILES['delegate_photo']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['userfile']['name']= $files['delegate_photo']['name'][$i];
			$_FILES['userfile']['type']= $files['delegate_photo']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['delegate_photo']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['delegate_photo']['error'][$i];
			$_FILES['userfile']['size']= $files['delegate_photo']['size'][$i];    
	
			$this->upload->initialize($this->set_upload_options());
			$delegate_photo[$i] = $this->upload->do_upload();
			$fileData = $this->upload->data();
            $uploadData[$i]['file_name'] = $fileData['file_name'];
			
		}
		
		return $uploadData;
	}
	private function set_upload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = 'pdf/pdfs';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|GIF|JPG|PNG|PDF|DOC';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
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