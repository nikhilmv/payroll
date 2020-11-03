<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class ProjectShedule extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        @parent::__construct();

        $this->load->model('ProjectShedule_model');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'Project Shedule Listings';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }

	

    

    /**

     * This function is used to load the delegate

     */

    function sheduleListing()

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

            

           $count = $this->ProjectShedule_model->sheduleListingCount($searchText);

			

			

			$returns = $this->paginationCompress ( "ProjectShedule/sheduleListing/", $count, 10, 3 );

			

            

            $data['sheduleListingRecords'] = $this->ProjectShedule_model->sheduleListing($searchText, $returns["page"], $returns["segment"]);

			$data['brand_names']=$this->ProjectShedule_model->get_brand_names();	

			//print_r($data['sheduleListingRecords']);exit();

            $this->global['pageTitle'] = 'Project Shedule Listings';

            $data['sortEnable']=0;

            $this->loadViews("sheduleListing", $this->global, $data, NULL);

        }

    }

  

   	

  function BrandSort()

  {

  

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {        

            $category_id = $this->security->xss_clean($this->input->post('category_id'));

          

			if($category_id != '')

			{

			$_SESSION["category_id"] = $category_id;

			}

			if($category_id == '')

			{

			 $category_id=$_SESSION["category_id"];

			 

			}

			$data['category_id']=$category_id;

            $this->load->library('pagination');

         	$count = $this->ProjectShedule_model->Sponsor_Category_SortCount($category_id);

			$returns = $this->paginationCompress ( "ProjectShedule/sheduleListing/", $count, 10, 3 );

            $data['sheduleListingRecords'] = $this->ProjectShedule_model->Sponsor_Category_Sort($category_id, $returns["page"], $returns["segment"]);

			$data['brand_names']=$this->ProjectShedule_model->get_brand_names();

			$data['sortEnable']=1;	

            $this->global['pageTitle'] = 'Project Shedule Listings';

            $this->loadViews("sheduleListing", $this->global, $data, NULL);

        }

    

  }

  

  

  

  function projectSort()

  {

  

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {      

		  



            $project_id = $this->input->post('project_id');

			$project_status = $this->input->post('project_status');

			

			



			if($project_id != '')

			{

				if($project_id == "All")

				{

					unset($_SESSION['project_id']);

					$project_id = "";

				}

				else

				{

					$_SESSION["project_id"] = $project_id;

				}

			}

			if($project_id == '')

			{

				if(isset($_SESSION["project_id"]))

				{

			 		$project_id=$_SESSION["project_id"];

				}	

			}

			

			

			

			if($project_status != '')

			{

				if($project_status == "All")

				{

					unset($_SESSION['project_status']);

					$project_status = "";

				}

				else

				{

					$_SESSION["project_status"] = $project_status;

				}

			}

			if($project_status == '')

			{

				if(isset($_SESSION["project_status"]))

				{

			 		$project_status=$_SESSION["project_status"];

				}

			}

			



			

			$data['project_id']=$project_id;

            $this->load->library('pagination');

         	$count = $this->ProjectShedule_model->project_SortCount($project_id,$project_status);

			$returns = $this->paginationCompress ( "ProjectShedule/InvoiceListing/", $count, 10, 3 );

            $data['invoice_pdf_details'] = $this->ProjectShedule_model->project_Sort($project_id, $project_status, $returns["page"], $returns["segment"]);

			$data['total_amount']=$this->ProjectShedule_model->get_sorted_total($project_id);

			$data['pending_amount']=$this->ProjectShedule_model->get_pending_total($project_id);

			$data['sortEnable']=1;


			$data['ProjectDetails'] = $this->ProjectShedule_model->getProjectDetails();

            $this->global['pageTitle'] = 'Invoice Listings';

            $this->loadViews("invoiceListing", $this->global, $data, NULL);

        }

    

  }

   

  

   

    function addNew()

    {

	

	 $this->load->model('ProjectShedule_model');

   	 $result['enquiry_details']=$this->ProjectShedule_model->get_enquiry_details();

	 $result['client_details']=$this->ProjectShedule_model->get_client_details();

	 $result['contact_details']=$this->ProjectShedule_model->get_contact_details();

	 $result['category_details']=$this->ProjectShedule_model->get_category_details();

	 $result['team_details']=$this->ProjectShedule_model->get_member_details();

	 $result_id=$this->ProjectShedule_model->last_id();

	

	 $result['last_id'] = $result_id['AUTO_INCREMENT'];

	 

	 

	 

	 

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            $this->load->model('ProjectShedule_model');

                      

            $this->global['pageTitle'] = 'Add New Shedule';

            $this->loadViews("addNewProjectShedule", $this->global, $result);

        }

    }

	

	

	

		

		

    function addNewProjectShedule()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            $this->load->library('form_validation');

            

            $this->form_validation->set_rules('enquiry_id','Enquiry','trim|required');

			$this->form_validation->set_rules('client_id','Enquiry','trim|required');

			//$this->form_validation->set_rules('contact_person_id','Contact Person','trim|required');

			$this->form_validation->set_rules('category_id','Category','trim|required');

	

           

            

            if($this->form_validation->run() == FALSE)

            {

                $this->addNew();

            }

            else

            {



			    $enquiryNo = $this->input->post('enquiry_id');

				$date = $this->input->post('date');

				$client_id = $this->input->post('client_id');

				

				$project_number = $this->input->post('project_number');

				$project_title = $this->input->post('project_title');

				$category_id = $this->input->post('category_id');

				$teams=$this->input->post('team_id');

				$contact_persons = $this->input->post('contact_person_id');

				

				

				$contact_person_id = implode(",",$this->input->post('contact_person_id'));

				$team_id = implode(",",$this->input->post('team_id'));

				

				$deadline = $this->input->post('deadline');

				

				$status_id = $this->input->post('status_id');

				$estiBudget = $this->input->post('estiBudget');

				$delivery_date = $this->input->post('delivery_date');

				$bill_no = $this->input->post('bill_no');

				$bill_date = $this->input->post('bill_date');

				$income = $this->input->post('income');

				$client_feedback = $this->input->post('client_feedback');

				$grade = $this->input->post('grade');





                $ProjectSheduleInfo = array('enquiryNo'=>$enquiryNo, 'date'=>$date, 'client'=>$client_id, 'contactPerson'=>$contact_person_id, 'projectNumber'=>$project_number, 'projectTitle'=>$project_title, 'category'=>$category_id, 'team'=>$team_id, 'deadline'=>$deadline, 'status'=>$status_id, 'estimatedBudget'=>$estiBudget, 'deliveryDate'=>$delivery_date, 'billNo'=>$bill_no, 'billDate'=>$bill_date, 'Income'=>$income, 'clientFeedBack'=>$client_feedback, 'created'=>date('Y-m-d H:i:s') );

				

                

                $this->load->model('ProjectShedule_model');

                $result = $this->ProjectShedule_model->addNewProjectShedule($ProjectSheduleInfo);

				

				

			

				$contactCount=count($contact_persons);

				for($i=0;$i<$contactCount;$i++)

				{

					$contactId=$contact_persons[$i];

					$data['contactName'] = $this->ProjectShedule_model->getConatctName($contactId);

					$contactName=$data['contactName'];

					$ProjectSheduleInfo2 =array('project_id'=>$result,'contactPerson'=>$contactId,'personName'=>$contactName);

					$result3 = $this->ProjectShedule_model->addmailSendContacts($ProjectSheduleInfo2);

					

				}

				

				$memberCount=count($teams);

				for($i=0;$i<$memberCount;$i++)

				{

					$TeamMemberId=$teams[$i];

					$data['MemberName'] = $this->ProjectShedule_model->getMemberName($TeamMemberId);

					$MemberName=$data['MemberName'];

              		$GradeInfo = array('member_id'=>$TeamMemberId, 'member_name'=>$MemberName, 'grade'=>'', 'enquiryNo'=>$enquiryNo,'projectId'=>$result);

					$result1 = $this->ProjectShedule_model->addNewProjectGrade($GradeInfo);

				}

				

                if($result > 0)

                {

                    $this->session->set_flashdata('success', 'New Project Shedule created successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'Project Shedule creation failed');

                }

               

			   //$enquiryNo = $this->input->post('enquiry_id');

			   $data['pdf_path'] = $this->ProjectShedule_model->getpdffileName($enquiryNo);

			   $pdfDocument=$data['pdf_path'];

			   

            //this block is used to send mail to brp   

			   $brpid=$this->ProjectShedule_model->getbrpid($enquiryNo);	 	

			   $brpName=$this->ProjectShedule_model->getbrpName($brpid);

			   $brpEmail=$this->ProjectShedule_model->getbrpEmail($brpid);

			   

				$message = "Project Number: ".$project_number."<br>";

				$message .="BRP: ".$brpName. "<br>";

			   

			   $memberCount=count($teams);

			   $message .="Team Members: ";

			   	for($i=0;$i<$memberCount;$i++)

				{

					 $TeamMemberId=$teams[$i];

					 $data['name'] = $this->ProjectShedule_model->getMemberrName($TeamMemberId);

					 $message .=$data['name'].", ";

					

				}

				

				$clint_name = $this->ProjectShedule_model->getclintInfo($client_id);



			  

			   $subject = $project_number . "-" . $clint_name->name . "-" . $project_title;

		

								

	

								//$to_email = $brpEmail;

								$to_email = 'mail@mail.com';

							

							

								$this->load->library('email');

								

								$this->email->from('info@pioneercodes.com', 'Processflow');

								$this->email->to($to_email); 

								

						

								$this->email->subject($subject);

								$this->email->message($message); 

								

								$this->email->set_header('Header1', 'Value1');

								

						

							$this->load->helper('path');

							

							$path = $_SERVER['DOCUMENT_ROOT'].'/ProjectBriefDocument/'.$pdfDocument;

							

							

						

							if ($pdfDocument!='') 

							{

								

								$fileDocument = $this->ProjectShedule_model->getfileName($enquiryNo);

								$file_count1 = $this->ProjectShedule_model->getfileCount($enquiryNo);

								

								for($k=0;$k<$file_count1;$k++)

								{

									$filName=$fileDocument[$k]['file'];

									

									

									$path2 = $_SERVER['DOCUMENT_ROOT'].'/pdf/pdfs/'.$filName;

									

									$this->email->attach($path2);

								}

	

	

	

								//echo "found";exit();	

									$this->email->attach($path); 

									$this->email->set_mailtype("html");

									$this->email->send();

									

							}

							else

							{

									//echo "not found";exit();

									$this->email->set_mailtype("html");

									$this->email->send();

							}

			  

			  //this block is used to send mail to the team members 

			  $memberCount=count($teams);

			  $memberCountNew=count($teams);



				for($j=0;$j<$memberCountNew;$j++)

				{

				

				

				 $TeamMemberId=$teams[$j];

				 

				 $data['email'] = $this->ProjectShedule_model->getMemberEmail($TeamMemberId);

				 $mailId=$data['email'];

				 

				 $brpid=$this->ProjectShedule_model->getbrpid($enquiryNo);		

			     $brpName=$this->ProjectShedule_model->getbrpName($brpid);

				 $brpEmail=$this->ProjectShedule_model->getbrpEmail($brpid);

				 

				 

				 

								$subject = $project_number . "-" . $clint_name->name . "-" . $project_title;



							   

								$message = "Project Number: ".$project_number."<br>";

								$message .="BRP: ".$brpName. "<br>";

								

								$memberCount=count($teams);

								$message .="Team Members: ";

								for($i=0;$i<$memberCount;$i++)

								{

									 $TeamMemberId=$teams[$i];

									 $data['name'] = $this->ProjectShedule_model->getMemberrName($TeamMemberId);

									 $message .= $data['name'].", ";

									

								}

								$to_email = $mailId;

								//$to_email = 'mail@mail.com';

											

								$this->load->library('email');

								

								$this->email->from('info@pioneercodes.com', 'Processflow');

								$this->email->to($to_email); 

								

						

								$this->email->subject($subject);

								$this->email->message($message); 

								

								$this->email->set_header('Header1', 'Value1');

								

						

							$this->load->helper('path');

							

							$path = $_SERVER['DOCUMENT_ROOT'].'/ProjectBriefDocument/'.$pdfDocument;

							if ($pdfDocument!='') 

							{

							

								$fileDocument = $this->ProjectShedule_model->getfileName($enquiryNo);

								$file_count1 = $this->ProjectShedule_model->getfileCount($enquiryNo);

								

								for($k=0;$k<$file_count1;$k++)

								{

									$filName=$fileDocument[$k]['file'];

									

									

									$path2 = $_SERVER['DOCUMENT_ROOT'].'/pdf/pdfs/'.$filName;

									

									$this->email->attach($path2);

								}

								//echo "found";exit();	

									$this->email->attach($path); 

									$this->email->set_mailtype("html");

									$this->email->send();

									

							}

							else

							{

									//echo "not found";exit();

									$this->email->set_mailtype("html");

									$this->email->send();

							}



				

						

				}

			 

							

                redirect('ProjectShedule/sheduleListing');

            }

        }

    }

	

	

	

	

	/*function sendEmailToContact($prj_id) 

	{

	

	$data['sheduleListingRecordsAll'] = $this->ProjectShedule_model->sheduleListingAll($prj_id);



	$to_email=$data['sheduleListingRecordsAll']->email;

	

	$pdf=$data['sheduleListingRecordsAll']->invoice_pdf;



	

	//$to_email = "sreejith.kongolil@pioneercodes.com";

					

	

		$this->load->library('email');

		

		$this->email->from('info@pioneercodes.com', 'Processflow');

		$this->email->to($to_email); 

		

		$subject ="Invoice";

		$message="Invoice Email";

		

		$this->email->subject($subject);

		$this->email->message($message); 

		

		$path = $_SERVER['DOCUMENT_ROOT'].'/processflow/invoice/'.$pdf;

		

		 $this->email->attach($path); 

			

		 $this->email->send();

		 

		 redirect('ProjectShedule/sheduleListing');



	}*/

	

	

   

    /**

     * This function is used load delegate edit information

     * @param number $Id : Optional : This is  id

     */

    function editProjectShedule($id = NULL)

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            if($id == null)

            {

                redirect('ProjectShedule/sheduleListing');

            }

            

            $data['ProjectSheduleInfo'] = $this->ProjectShedule_model->getProjectSheduleListingInfo($id);	

			

			$data['categoryInfo'] = $this->ProjectShedule_model->getCategoryInfo();	

			

			

			

			$data['clientInfo'] = $this->ProjectShedule_model->getClientInfo();

					

			$data['contactpersonInfo'] = $this->ProjectShedule_model->getContactpersonInfo();

			

			$data['teamInfo'] = $this->ProjectShedule_model->getTeamInfo($id);

			

			$data['allTeams'] = $this->ProjectShedule_model->getallTeams();

		

			

			

			$data['enquiryInfo'] = $this->ProjectShedule_model->getEnquiryInfo();

			

			$data['gradeInfo'] = $this->ProjectShedule_model->getgradeInfo($id);

			

			

			

            

            $this->global['pageTitle'] = 'Edit Project Shedule Listing';

            

            $this->loadViews("editProjectShedule", $this->global, $data, NULL);

        }

    }

	

	 function editProjectSheduleNew()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

     

            else

            {

				$formSubmit = $this->input->post('submitForm');

				

				$id = $this->input->post('id');

			    $enquiryNo = $this->input->post('enquiry_id');

				$date = $this->input->post('date');

				$client_id = $this->input->post('client_id');

				$contact_person_id = $this->input->post('contact_person_id');

				$project_number = $this->input->post('project_number');

				$project_title = $this->input->post('project_title');

				$category_id = $this->input->post('category_id');

				$teams=$this->input->post('team_id');

				

				$team_id = implode(",",$this->input->post('team_id'));

				

				$deadline = $this->input->post('deadline');

				

				$status_id = $this->input->post('status_id');

				$estiBudget = $this->input->post('estiBudget');

				$delivery_date = $this->input->post('delivery_date');

				$bill_no = $this->input->post('bill_no');

				$bill_date = $this->input->post('bill_date');

				$income = $this->input->post('income');

				$client_feedback = $this->input->post('client_feedback');

				$brp_grade = $this->input->post('brp_grade');

				$grade = $this->input->post('grade');

				

				$gradeStatus= implode($grade);

				

	$IdNew="PN - ".$id;

	

                $Info = array();

               $ProjectSheduleInfo = array('enquiryNo'=>$enquiryNo, 'date'=>$date, 'client'=>$client_id, 'contactPerson'=>$contact_person_id, 'projectNumber'=>$project_number, 'projectTitle'=>$project_title, 'category'=>$category_id, 'team'=>$team_id, 'deadline'=>$deadline, 'status'=>$status_id, 'estimatedBudget'=>$estiBudget, 'deliveryDate'=>$delivery_date, 'billNo'=>$bill_no, 'billDate'=>$bill_date, 'Income'=>$income, 'clientFeedBack'=>$client_feedback,'brp_grade'=>$brp_grade,'modified'=>date('Y-m-d H:i:s') );

				



				 $result = $this->ProjectShedule_model->editProjectSheduleListing($ProjectSheduleInfo, $id);

				 

				 $ProjectTabelId=$result;

				

				$memberCount=count($teams);

				for($i=0;$i<$memberCount;$i++)

				{

					 $TeamMemberId=$teams[$i];

					 

					 $data = $this->ProjectShedule_model->getMemberName($TeamMemberId);

					 

					$MemberName=$data;

					

					@$TeamMemberGrade=$grade[$i];



					 

					 

					 $MemberGradeInfo = array('member_id'=>$TeamMemberId,'member_name'=>$MemberName, 'enquiryNo'=>$enquiryNo, 'grade'=>$TeamMemberGrade,'projectId'=>$result );

					 

					 $this->load->model('ProjectShedule_model');

					 $result1 =  $this->ProjectShedule_model->deleteMemberGrade($TeamMemberId,$result);

               		 $result2 = $this->ProjectShedule_model->addMemberGrade($MemberGradeInfo);

					 

					

					 

				}

				

				

               

                

                if($result == true)

                {

                    $this->session->set_flashdata('success', 'Project Shedule Listing updated successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'Project Shedule Listing updation failed');

                }

				

				$pdfDocument = $this->ProjectShedule_model->getpdffileName($enquiryNo);

			  

			if($formSubmit!='Submit')

				{

					$this->ProjectShedule_model->changeWorkingStatus($IdNew);

				}

				if($formSubmit=='End Project')

				{

					$this->ProjectShedule_model->changeWorkingStatus1($IdNew);

				}

				

				$WorkingStatus=$this->ProjectShedule_model->getWorkingStatus($id);

				

			   //this block is used to send mail to brp   

			   $brpid=$this->ProjectShedule_model->getbrpid($enquiryNo);	 	

			   $brpName=$this->ProjectShedule_model->getbrpName($brpid);

			   $brpEmail=$this->ProjectShedule_model->getbrpEmail($brpid);

			   $status_id = $this->input->post('status_id');

			   $brp_grade = $this->input->post('brp_grade');

			   $enquiryNo = $this->input->post('enquiry_id');

			   

				$message = "Project Number: ".$project_number."<br>";

				$message .="BRP: ".$brpName. "<br>";

				

				 $memberCount=count($teams);

			   $message .="Team Members: ";

			   	for($i=0;$i<$memberCount;$i++)

				{

					 $TeamMemberId=$teams[$i];

					 $name = $this->ProjectShedule_model->getMemberrName($TeamMemberId);

					 $message .=$name.", ";

					

					

				}

				

				if($status_id == '0')

				{

				  $message .="Status : Delivered <br>";

				}

				if($brp_grade !== '')

				{

					$brpGrade=$this->ProjectShedule_model->getbrpGrade($enquiryNo);

					$message .="<br>"."BRP Grade: ".$brpGrade. "<br>";

				}

				

				$memberCount=count($teams);

			   

			   

			  if(!empty($gradeStatus))

				{

			    	$message .="<br>"."Team Members Grade : "."<br>";

				}

			   	for($i=0;$i<$memberCount;$i++)

				{

					 $TeamMemberId=$teams[$i];

					 $name = $this->ProjectShedule_model->getMemberrName($TeamMemberId);

					 $grade = $this->ProjectShedule_model->getMemberrGrade($TeamMemberId,$ProjectTabelId);

					 if($grade !='')

					 {



					 	$message .=$name.": &nbsp;&nbsp; ".$grade."<br>";

					 }

					

					

				}

			if($WorkingStatus == 0)

			{

				$message .="<br>"."Project Status: Not Confirmed "."<br>";

			}

			else if($WorkingStatus == 1)

			{

				$message .="<br>"."Project Status: Confirmed & Activated "."<br>";

			}

			else

			{

				$message .="<br>"."Project Status: Ended "."<br>";

			}

			

				

			   

			  

				

				$clint_name = $this->ProjectShedule_model->getclintInfo($client_id);



			  

			   $subject = $project_number . "-" . $clint_name->name . "-" . $project_title;

		

								

	

								$to_email = $brpEmail;

							

							

								$this->load->library('email');

								

								$this->email->from('info@pioneercodes.com', 'Processflow');

								$this->email->to($to_email); 

								

						

								$this->email->subject($subject);

								$this->email->message($message); 

								

								$this->email->set_header('Header1', 'Value1');

								

						

							$this->load->helper('path');

							



							$path = $_SERVER['DOCUMENT_ROOT'].'/ProjectBriefDocument/'.$pdfDocument;

							

							if ($pdfDocument!='') 

							{

							

								$fileDocument = $this->ProjectShedule_model->getfileName($enquiryNo);

								$file_count1 = $this->ProjectShedule_model->getfileCount($enquiryNo);

								

								for($k=0;$k<$file_count1;$k++)

								{

									$filName=$fileDocument[$k]['file'];

									

									

									$path2 = $_SERVER['DOCUMENT_ROOT'].'/pdf/pdfs/'.$filName;

									

									$this->email->attach($path2);

								}

								//echo "found";exit();	

									$this->email->attach($path); 

									$this->email->set_mailtype("html");

									$this->email->send();

									

							}

							else

							{

									//echo "not found";exit();

									$this->email->set_mailtype("html");

									$this->email->send();

							}

						

							

			  //this block is used to send mail to the team members 

			  $memberCount=count($teams);

			  $memberCountNew=count($teams);



				for($j=0;$j<$memberCountNew;$j++)

				{

				

				

				 $TeamMemberId=$teams[$j];

				 

				 $email = $this->ProjectShedule_model->getMemberEmail($TeamMemberId);

				 $mailId=$email;

				

				 

				 $brpid=$this->ProjectShedule_model->getbrpid($enquiryNo);		

			     $brpName=$this->ProjectShedule_model->getbrpName($brpid);

				 $brpEmail=$this->ProjectShedule_model->getbrpEmail($brpid);

				 

				 $WorkingStatus=$this->ProjectShedule_model->getWorkingStatus($id);

				 

								$subject = $project_number . "-" . $clint_name->name . "-" . $project_title;



							   

								$message = "Project Number: ".$project_number."<br>";

								$message .="BRP: ".$brpName. "<br>";

								

								$memberCount=count($teams);

								$message .="Team Members: ";

								for($i=0;$i<$memberCount;$i++)

								{

									 $TeamMemberId=$teams[$i];

									 $name = $this->ProjectShedule_model->getMemberrName($TeamMemberId);

									 $message .= $name.", ";

									

								}

								

								

								if($status_id == '0')

				{

				  $message .="Status : Delivered <br>";

				}

				if($brp_grade !== '')

				{

					$brpGrade=$this->ProjectShedule_model->getbrpGrade($enquiryNo);

					$message .="<br>"."BRP Grade: ".$brpGrade. "<br>";

				}

				

				$memberCount=count($teams);

			   

			   

			    if(!empty($gradeStatus))

				{

					$message .="<br>"."Team Members Grade : "."<br>";

				}

	

			   	for($i=0;$i<$memberCount;$i++)

				{

					 $TeamMemberId=$teams[$i];

					 $name = $this->ProjectShedule_model->getMemberrName($TeamMemberId);

					 $grade = $this->ProjectShedule_model->getMemberrGrade($TeamMemberId,$ProjectTabelId);

					 if($grade !=''){

					 $flag=1;

					 	$message .=$name.": &nbsp;&nbsp; ".$grade."<br>";

					 }

					

					

				}

				

						if($WorkingStatus == 0)

						{

							$message .="<br>"."Project Status: Not Confirmed "."<br>";

						}

						else if($WorkingStatus == 1)

						{

							$message .="<br>"."Project Status: Confirmed & Activated "."<br>";

						}

						else

						{

							$message .="<br>"."Project Status: Ended "."<br>";

						}



								$to_email = $mailId;

											

								$this->load->library('email');

								

								$this->email->from('info@pioneercodes.com', 'Processflow');

								$this->email->to($to_email); 

								

						

								$this->email->subject($subject);

								$this->email->message($message); 

								

								$this->email->set_header('Header1', 'Value1');

								

						

							$this->load->helper('path');

							

					

							$path = $_SERVER['DOCUMENT_ROOT'].'/ProjectBriefDocument/'.$pdfDocument;

							

							if ($pdfDocument!='') 

							{

							

								$fileDocument = $this->ProjectShedule_model->getfileName($enquiryNo);

								$file_count1 = $this->ProjectShedule_model->getfileCount($enquiryNo);

								

								for($k=0;$k<$file_count1;$k++)

								{

									$filName=$fileDocument[$k]['file'];

									

									

									$path2 = $_SERVER['DOCUMENT_ROOT'].'/pdf/pdfs/'.$filName;

									

									$this->email->attach($path2);

								}

								//echo "found";exit();	

									$this->email->attach($path); 

									$this->email->set_mailtype("html");

									$this->email->send();

									

							}

							else

							{

									//echo "not found";exit();

									$this->email->set_mailtype("html");

									$this->email->send();

							}

							

						}

	

     

               redirect('ProjectShedule/sheduleListing');

            }

        }

    

    

    /**

     * This function is used to edit the user information

     */

    /*function editJobCategoryNew()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

     

            else

            {

			

			    $categoryId = $this->input->post('categoryId');

				$categoryName = $this->input->post('categoryName');

				

	

                $Info = array();

               $JobCategoryInfo = array('category_name'=>$categoryName);

				

                $result = $this->JobCategories_model->editJobCategoryListing($JobCategoryInfo, $categoryId);

                

                if($result == true)

                {

                    $this->session->set_flashdata('success', 'Job Category Listing updated successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'Job Category Listing updation failed');

                }

                

               redirect('ProjectShedule/sheduleListing');

            }

        }*/

    /**

     * This function is used to delete the faculty using userId

     * @return boolean $result : TRUE / FALSE

     */

/*    function deletebrandsListing()

    {

        if($this->isAdmin() == TRUE)

        {

            echo(json_encode(array('status'=>'access')));

        }

        else

        {

            $id = $this->input->post('id');

                      

            $result = $this->brands_model->deletebrandsListing($id);

            

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

            else { echo(json_encode(array('status'=>FALSE))); }

        }

    }*/

	

	

	 function deleteProjectShedule()

    {

        if($this->isAdmin() == TRUE)

        {

            echo(json_encode(array('status'=>'access')));

        }

        else

        {

            $id = $this->input->post('id');

                      

            $result = $this->ProjectShedule_model->deleteProjectShedule($id);

            

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

            else { echo(json_encode(array('status'=>FALSE))); }

        }

    }

	

	

	function deleteInvoiceListing()

    {

        if($this->isAdmin() == TRUE)

        {

            echo(json_encode(array('status'=>'access')));

        }

        else

        {

            $id = $this->input->post('id');

                      

            $result = $this->ProjectShedule_model->deleteInvoiceListing($id);

			

            

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

            else { echo(json_encode(array('status'=>FALSE))); }

        }

    }

	

	

		function uplo()

		 {	

	

			$config['upload_path'] = 'images/brands';

	

			$config['allowed_types'] = 'gif|jpg|png';

	

			$this->load->library('upload', $config);

	

			

			if ( ! $this->upload->do_upload('userfile'))

	

			

	

			{

			//echo"haiiii74744";

			

						

			 $update['image']=$this->input->post('current_photo');

	

			 //echo  $update['image'];

	

			return "null.jpg";

		 	

				}

		

				else

		

				{

		

					//echo "haiii";

		

					$data = array('upload_data' => $this->upload->data());

		

					$pic=$data["upload_data"]["file_name"];

		

					

		

					//for image resize

		

				$img_array = array();

		

				$img_array['image_library'] = 'gd2';

		

				$img_array['maintain_ratio'] = TRUE;

		

				//you need this setting to tell the image lib which image to process

		

				$img_array['source_image'] = 'images/brands' . $pic;

		

				$img_array['width'] = 280;

		

				//$img_array['height'] = 297;

		

		

		

				$this->load->library('image_lib', $img_array);

		

				$this->image_lib->resize();

		

				

		

					return $pic;				

					

		}

	

		}

		

	public function getClientDetails()

	{



		// POST data //Enquiry number

		$postData = $this->input->post();

		//load model

		$this->load->model('ProjectShedule_model');



		// get data

		$data = $this->ProjectShedule_model->getClientDetails($postData);



		echo json_encode($data);

	}

	

	public function getPdfData1()

	{



		// POST data //Enquiry number

		$postData = $this->input->post();

		//load model

		$this->load->model('ProjectShedule_model');



		// get data

		$data = $this->ProjectShedule_model->getPdfData1($postData);



		echo json_encode($data);

	}

	

	public function contactData1()

	{



		// POST data //Enquiry number

		$postData = $this->input->post();

		//load model

		$this->load->model('ProjectShedule_model');



		// get data

		$data = $this->ProjectShedule_model->contactData1($postData);



		echo json_encode($data);

	}

	

	public function getGradeDetails(){



		// POST data //Enquiry number

		$postData = $this->input->post();

		//load model

		$this->load->model('ProjectShedule_model');



		// get data

		$data = $this->ProjectShedule_model->getGradeDetails($postData);



		echo json_encode($data);

	}

		

	public function getContactDetails(){



		// POST data

		//client_id gets here

		$postData = $this->input->post();

		//load model

		$this->load->model('ProjectShedule_model');



		// get data											 //client_id

		$data = $this->ProjectShedule_model->getContactDetails($postData);



		echo json_encode($data);

	}

	

	function Invoice()

   {

   		//$project_id = $this->uri->segment(3);

		//$data['project_id'] = $project_id;

		//$data['invoiceDescriptionInfo'] = $this->ProjectShedule_model->getinvoiceDescriptionInfo($project_id);

		//$data['ProjectSheduleinvoice'] = $this->ProjectShedule_model->getProjectSheduleListingInfo($project_id);

		$data['ProjectNumber'] = $this->ProjectShedule_model->getProjectNumber();

	

		$this->global['pageTitle'] = 'Create Project Invoice';

		$this->loadViews("project_invoice_view", $this->global, $data, NULL);

   

   }

   

	function SendInvoiceView()

   {

		

		$data['ProjectNumber'] = $this->ProjectShedule_model->getProjectNumber();

		$data['PdfDetails'] = $this->ProjectShedule_model->getPdfDetails();

		$data['ContactPersons'] = $this->ProjectShedule_model->getContactDeta();

		$this->global['pageTitle'] = 'Send Project Invoice';

		$this->loadViews("send_invoice_view", $this->global, $data, NULL);

   

   }

   	

	function sendEmailToContact() 

	{

	

	$prj_id = $this->input->post('project_id');

	$pdfDocument=$this->input->post('pdfDocument');

	$contact_persons = $this->input->post('Contact_id');

	$contactCount=count($contact_persons);

		   	for($i=0;$i<$contactCount;$i++)

				{

					 $contactId=$contact_persons[$i];

					 $data['email'] = $this->ProjectShedule_model->getContactEmail($contactId);

					 $to_email=$data['email'];

					

				}



					

		$this->load->library('email');

		

		$this->email->from('info@pioneercodes.com', 'Processflow');

		$this->email->to($to_email); 

		

		$subject ="Invoice";

		$message="Invoice Email";

		

		$this->email->subject($subject);

		$this->email->message($message); 

		

		$path = $_SERVER['DOCUMENT_ROOT'].'/invoice/'.$pdfDocument;

		

		$this->email->attach($path); 

			

		$this->email->send();

		 

		redirect('ProjectShedule/sheduleListing');

	

	}

	

		

		

	function DownloadInvoice()

   {

   

        //$data = [];

		$project_id = $this->input->post('project_id');

		

		$brand_id = $this->ProjectShedule_model->getBrandId($project_id);

		

		

		

		$description = $this->input->post('description');

		$quantity = $this->input->post('quantity');

		$amount = $this->input->post('amount');

		

		$payment_due_date = $this->input->post('payment_due_date');

		$currency = $this->input->post('currency');

		

		

		

		$description_count=count($description);

		

	if($description_count > 0)

		{

			$ProjectinvoiceData = array( 'project_id'=>$project_id,'payment_due_date'=>$payment_due_date,'currency'=>$currency);

			$Id = $this->ProjectShedule_model->addProjectinvoiceInfo($ProjectinvoiceData);

		}

		

        if($description_count > 0)

		{

			for($i=0;$i<$description_count;$i++)

			{

	

				$ProjectinvoiceInfo = array('description'=>$description[$i], 'quantity'=>$quantity[$i],'amount'=>$amount[$i],'invoicePdf_id'=>$Id,'project_id'=>$project_id);

				

				$this->ProjectShedule_model->addNewProjectinvoiceInfo($ProjectinvoiceInfo);

	

			}

		}	

		

		$amountSum = $this->ProjectShedule_model->getTotalInvoiceAmount($Id);

		$ProjectinvoiceData = array( 'totalInvoiceAmount'=>$amountSum);

		$this->ProjectShedule_model->editProjectinvoiceInfo($ProjectinvoiceData,$Id);

		

		

		

		if($payment_due_date != '')

		{

			$ProjectSheduleUpdateInfo = array('payment_due_date'=>$payment_due_date, 'currency'=>$currency);

			$this->ProjectShedule_model->editProjectSheduleListing($ProjectSheduleUpdateInfo, $project_id);

		}

		

		

		

		

		//$data['ProjectSheduleinvoice'] = $this->ProjectShedule_model->getProjectSheduleListingInfo($project_id);

		$data['payment_due_date']=$payment_due_date;

		$data['currency']=$currency;

		$data['invoiceTableInfo']=$this->ProjectShedule_model->get_project_invoice($Id);

		

		$data['CompanyInfo']=$this->ProjectShedule_model->getCompanyInfo();

		//print_r($data['CompanyInfo']);exit();

		$data['brandInfo']=$this->ProjectShedule_model->getclintInfo($brand_id);

		//print_r($data['brandInfo']);exit();

		$data['invoiceNumberInfo']=$this->ProjectShedule_model->getinvoiceNumberInfo();

		

		$invoiceNumberInfo_count = $data['invoiceNumberInfo'];



		$invoice_Number_Info = array('date'=>date('Y-m-d'), 'number'=>$invoiceNumberInfo_count+1);

		$this->ProjectShedule_model->addNewProjectinvoicenumber($invoice_Number_Info);





		$data['invoiceNumber']=$invoiceNumberInfo_count+1;

		



		

		

		



		

		

		//load the view and saved it into $invoice variable

		$invoice=$this->load->view('project_invoice', $data, true);

   $date=str_replace("-","",date('Y-m-d'));

         $pdfFilePath = "INV".$date.$data['invoiceNumber'].".pdf";

	      $savefile=$_SERVER['DOCUMENT_ROOT'].'/invoice/'.$pdfFilePath;

		



        //load mPDF library

		$this->load->library('m_pdf');



       //generate the PDF from the given html

		$this->m_pdf->pdf->WriteHTML($invoice);



		$this->m_pdf->pdf->Output($savefile,'F');

		

		$this->m_pdf->pdf->Output($pdfFilePath, "D");

		

		

		$data = array('invoice_pdf'=>$pdfFilePath);

		//$this->ProjectShedule_model->editProjectSheduleListing($data,$project_id);

		$this->ProjectShedule_model->editProjectSheduleListing($data,$Id);

		

		

        redirect('ProjectShedule/sheduleListing');

    

   

   }

   

   



   

   function editProjectInvoice($id = NULL)

   {

	 if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            if($id == null)

            {

                redirect('ProjectShedule/InvoiceListing');

            }

		 $data['invoiceInfo'] = $this->ProjectShedule_model->getProjectInvoiceInfo($id);

		 //print_r($data['invoiceInfo']);exit();

		 $data['project_invoice_info'] = $this->ProjectShedule_model->getProjectInvoiceInfo2($id);

		

		 $data['ProjectNumber'] = $this->ProjectShedule_model->getProjectNumber();

		 //print_r($data['invoiceInfo']);exit();

			

		 $this->global['pageTitle'] = 'Edit Project Invoice';

         $this->loadViews("editProjectInvoice", $this->global, $data, NULL);

        }

    }

	

	function editProjectInvoice2()

	{  

	if($this->isAdmin() == TRUE)

	{

		$this->loadThis();

	}

 

	else

	{



		$project_id = $this->input->post('project_id');

	

		$brand_id = $this->ProjectShedule_model->getBrandId($project_id);



		$description = $this->input->post('description');

		$quantity = $this->input->post('quantity');

		$amount = $this->input->post('amount');

		

		$payment_due_date = $this->input->post('payment_due_date');

		$currency = $this->input->post('currency');

		

		$description_count=count($description);



			$ProjectinvoiceData = array( 'project_id'=>$project_id,'payment_due_date'=>$payment_due_date,'currency'=>$currency);

			$Id = $this->ProjectShedule_model->editProjectinvoice3($ProjectinvoiceData,$project_id);

			

		if($description_count > 0)

		{

			for($i=0;$i<$description_count;$i++)

			{

				$ProjectinvoiceInfo[$i] = array('description'=>$description[$i], 'quantity'=>$quantity[$i],'amount'=>$amount[$i],'invoicePdf_id'=>$Id,'project_id'=>$project_id);

				

	

			}

		}

		

		$ProjectinvoiceInfoCount=count($ProjectinvoiceInfo);

		

		for($j=0;$j<$ProjectinvoiceInfoCount;$j++)

		{

		$this->ProjectShedule_model->editNewProjectinvoiceInfo($ProjectinvoiceInfo[$j],$project_id);	

			

		}

		





		

        redirect('ProjectShedule/sheduleListing');

    

   

   }

 }

   			



   

   function InvoiceListing()

   {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {        



			unset($_SESSION['project_id']);

			unset($_SESSION['project_status']);

			

            $this->load->library('pagination');

            $count = $this->ProjectShedule_model->getInvoice_pdf_Count();

			

			$returns = $this->paginationCompress ( "ProjectShedule/InvoiceListing/", $count, 10, 3 );

			

			$data['invoice_pdf_details'] = $this->ProjectShedule_model->getInvoice_pdf_details($returns["page"], $returns["segment"]);

			$data['ProjectDetails'] = $this->ProjectShedule_model->getProjectDetails();

			$data['ProjectNumber'] = $this->ProjectShedule_model->getProjectNumber();

			$data['total_amount']=$this->ProjectShedule_model->get_total_amount();

			$data['pending_amount']=$this->ProjectShedule_model->get_total_pending_amount();

			$data['sortEnable']=0;

			

			//print_r($data['sheduleListingRecords']);exit();

            $this->global['pageTitle'] = 'Project Invoice Listings';

            $this->loadViews("invoiceListing", $this->global, $data, NULL);

        }

	}	

    

		

	

	function statusUpdate()

    {

    $status = $this->input->post('status');

	if($status == '')

	{

	redirect('ProjectShedule/InvoiceListing');

	}

    $myCheckboxes = $this->input->post('myCheckboxes');

	

	$myCheckboxesCount=count($myCheckboxes);

	

		for($j=0;$j<$myCheckboxesCount;$j++)

		{

		$project_id=$myCheckboxes[$j];

		$ProjectStatusData = array('status'=>$status);

		$this->ProjectShedule_model->addStatus($ProjectStatusData,$project_id);	

			

		}

//	$id=$this->input->post('id');



//

//if (!empty($this->input->post('myCheckboxes'))) 

//{

//        foreach ($this->input->post('myCheckboxes') as $key => $val) 

//		{

//            $data[] = array(

//            'myCheckboxes' => $_POST['myCheckboxes'][$key]

//        );

//	}

//foreach ($data as $item) 

//{    

//       echo $item['myCheckboxes'];

//}



redirect('ProjectShedule/InvoiceListing');

  

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