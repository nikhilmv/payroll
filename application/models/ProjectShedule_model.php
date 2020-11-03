<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class ProjectShedule_model extends CI_Model

{



    /**



     * This function is used to get the faculty listing count



     * @param string $searchText : This is optional search text



     * @return number $count : This is row count



     */



    function sheduleListingCount($searchText = '')



    {

		

        $this->db->select('*');



        $this->db->from('project_shedule');



		if(!empty($searchText)) {



            $likeCriteria = "(enquiryNo  LIKE '%".$searchText."%')";



            $this->db->where($likeCriteria);



        }



		$this->db->order_by('id','desc');



        $query = $this->db->get();

		//$this->db->group_by('reference');



        return $query->num_rows();



    }



	

function sheduleListing($searchText = '', $page, $segment)



{

		



		

$this->db->select('project_shedule.id,project_shedule.invoice_pdf,project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.client,project_shedule.workingStatus,project_shedule.contactPerson,project_shedule.category,enquiries.project_title,project_shedule.projectTitle,brands.name as client_name,category.category_name,contact.name as contact_person');    

$this->db->from('project_shedule');

$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');

$this->db->join('brands', 'project_shedule.client = brands.id');

$this->db->join('category', 'project_shedule.category = category.id');

$this->db->join('contact', 'project_shedule.contactPerson = contact.id');







	$this->db->limit($page, $segment);



	if(!empty($searchText)) {



		$likeCriteria = "(project_title  LIKE '%".$searchText."%')";



		$this->db->where($likeCriteria);



	}



	$this->db->order_by('id','asc');



	$query = $this->db->get();



	$result = $query->result();        



	return $result;



 }

 

 function sheduleListingAll($prj_id)

 {

       $this->db->select('project_shedule.id,project_shedule.invoice_pdf,contact.email,contact.name as contact_person');  

	   $this->db->from('project_shedule');

	   $this->db->join('contact', 'project_shedule.contactPerson = contact.id');

	   $this->db->where('project_shedule.id', $prj_id);

	   $query = $this->db->get();



	  return $query->row();

	

 }

 

 function getPaymentduedate($project_id)

    {



        $this->db->select('*');



        $this->db->from('project_shedule');



        $this->db->where('id', $project_id);



        $query = $this->db->get();



        return $query->row();



    }

 

 function getCompanyInfo()

    {



        $this->db->select('*');



        $this->db->from('tbl_users');



        $this->db->where('userId', 1);



        $query = $this->db->get();



        return $query->row();



    }

	function getinvoiceDescriptionInfo($project_id)



    {



        $this->db->select('*');



        $this->db->from('project_invoice');

		

		$this->db->where('project_id', $project_id);



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getProjectSheduleListingInfo($id)

    {



        $this->db->select('*');



        $this->db->from('project_shedule');



        $this->db->where('id', $id);



        $query = $this->db->get();



        return $query->row();



    }

	

		function getBrandId($id)

		{

			$this->db->where('id', $id);

			$query = $this->db->get('project_shedule');

			foreach ($query->result() as $row)

			{

				return $row->client;

			}

		}

	



	

		function getclintInfo($id)

    {



        $this->db->select('*');



        $this->db->from('brands');



        $this->db->where('id', $id);



        $query = $this->db->get();



        return $query->row();



    }

	

	function getinvoiceNumberInfo()

    {



        $this->db->select('*');



        $this->db->from('invoice_number');



        $this->db->where('date', date('Y-m-d'));



        $query = $this->db->get();



        return $query->num_rows();



    }



    /**



     * This function is used to get the user listing count



     * @param string $searchText : This is optional search text



     * @param number $page : This is pagination offset



     * @param number $segment : This is pagination limit



     * @return array $result : This is result



     */

	function Sponsor_Category_SortCount($category_id)

    {

	

	$this->db->select('project_shedule.id,project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.client,project_shedule.contactPerson,project_shedule.category,enquiries.project_title,brands.name as client_name,category.category_name,contact.name as contact_person');    

	$this->db->from('project_shedule');

	$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');

	$this->db->join('brands', 'project_shedule.client = brands.id');

	$this->db->join('category', 'project_shedule.category = category.id');

	$this->db->join('contact', 'project_shedule.contactPerson = contact.id');





		if(!empty($category_id))

		{



            $likeCriteria = "(brand_id  LIKE '%".$category_id."%')";



            $this->db->where($likeCriteria);



        }



		$this->db->order_by('id','desc');



        $query = $this->db->get();



		



        return $query->num_rows();



    }

	

	function Sponsor_Category_Sort($category_id, $page, $segment)

    {

	$this->db->select('project_shedule.id,project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.client,project_shedule.workingStatus,project_shedule.contactPerson,project_shedule.category,enquiries.project_title,brands.name as client_name,category.category_name,project_shedule.projectTitle,contact.name as contact_person');    

	$this->db->from('project_shedule');

	$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');

	$this->db->join('brands', 'project_shedule.client = brands.id');

	$this->db->join('category', 'project_shedule.category = category.id');

	$this->db->join('contact', 'project_shedule.contactPerson = contact.id');

        $this->db->limit($page, $segment);

		if(!empty($category_id)) 

		{

            $likeCriteria = "(contact.brand_id  LIKE '%".$category_id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','desc');

        $query = $this->db->get();

        $result = $query->result();     

        return $result;

    }

	

	

	

	

	function project_SortCount($project_id,$project_status)

    {

	$this->db->select('*');

	$this->db->from('invoice_pdf');

		if(!empty($project_id))

		{

            $likeCriteria = "(project_id  LIKE '".$project_id."')";

            $this->db->where($likeCriteria);

        }

		

		if($project_status != '')

		{

			if($project_status == 1)

			{

				$this->db->where('invoice_pdf.status', 1);

			}

			else

			{

				$this->db->where("invoice_pdf.status !=",1);

			}

		}	

		

		$this->db->order_by('id','desc');

        $query = $this->db->get();

		return $query->num_rows();

    }

	

	function project_Sort($project_id, $project_status, $page, $segment)

    {

	$this->db->select('invoice_pdf.id,invoice_pdf.project_id,invoice_pdf.invoice_pdf,invoice_pdf.payment_due_date,invoice_pdf.status,invoice_pdf.currency,invoice_pdf.totalInvoiceAmount,project_shedule.projectTitle,project_shedule.projectTitle');    

	$this->db->from('invoice_pdf');

	$this->db->join('project_shedule', 'invoice_pdf.project_id = project_shedule.id');

        $this->db->limit($page, $segment);

		if(!empty($project_id))

		{

            $likeCriteria = "(invoice_pdf.project_id  LIKE '".$project_id."')";

            $this->db->where($likeCriteria);

        }

		

		

		if($project_status != '')

		{

			if($project_status == 1)

			{

				$this->db->where('invoice_pdf.status', 1);

			}

			else

			{

				$this->db->where("invoice_pdf.status !=",1);

			}

		}	

            



		

		$this->db->order_by('id','desc');

        $query = $this->db->get();

		

		

  $str = $this->db->last_query();

   

    /*print_r($str);

    exit;*/

	

        $result = $query->result();    

        return $result;

    }





    function Brandslistings($searchText = '', $page, $segment)



    {



        $this->db->select('*');

		

        $this->db->from('brands');



        $this->db->limit($page, $segment);



		if(!empty($searchText)) {



            $likeCriteria = "(name  LIKE '%".$searchText."%')";



            $this->db->where($likeCriteria);



        }



		$this->db->order_by('id','desc');

	    //$this->db->group_by('reference');

        $query = $this->db->get();



        $result = $query->result();        



        return $result;



    }

	

	

	function get_project_invoice($project_id)



    {



        $this->db->select('*');

        $this->db->from('project_invoice');

		$this->db->where('invoicePdf_id', $project_id);

		$this->db->order_by('id','asc');

        $query = $this->db->get();



        $result = $query->result();        



        return $result;



    }



   function addNewJobCategory($JobCategoryInfo)



    {



        $this->db->trans_start();



        $this->db->insert('category', $JobCategoryInfo);



        



        $insert_id = $this->db->insert_id();



        



        $this->db->trans_complete();



        



        return $insert_id;



    }



    /**



     * This function used to get user information by id



     * @param number $userId : This is user id



     * @return array $result : This is user information



     */

	 

	 

	 





	



	



	





	

	



	



	

	

	 



    function getBrandListingInfo($id)



    {



        $this->db->select('*');



        $this->db->from('brands');



        $this->db->where('id', $id);



        $query = $this->db->get();



        



        return $query->row();



    }



    	function get_enquiry_details()

		{

				$this->db->select('*');

		

				$this->db->from('enquiries');

				

				$query = $this->db->get();

				

				$result = $query->result();        

		

				return $result;

		}	

		

		function get_client_details()

		{

				$this->db->select('*');

		

				$this->db->from('brands');

				

				$query = $this->db->get();

				

				$result = $query->result();        

		

				return $result;

		}

		

		function get_contact_details()

		{

				$this->db->select('*');

		

				$this->db->from('contact');

				

				$query = $this->db->get();

				

				$result = $query->result();        

		

				return $result;

		}

    

		function get_category_details()

		{

				$this->db->select('*');

		

				$this->db->from('category');

				

				$query = $this->db->get();

				

				$result = $query->result();        

		

				return $result;

		}



		function get_member_details()

		{

				$this->db->select('*');

		

				$this->db->from('tbl_members');

				

				$query = $this->db->get();

				

				$result = $query->result();        

		

				return $result;

		}

		





		function last_id()

		{

			$result=$this->db->query("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'project_shedule' AND table_schema = DATABASE( )");

		$fetch = $result->row_array();  

			return $fetch;

		}

		

		function getgradeInfo($id)

		{

				$this->db->select('*');

		

				$this->db->from('grade_members');

				

				$this->db->where('projectId', $id);

				

				$query = $this->db->get();

				

				$result = $query->result();        

		

				return $result;

		}

    /**



     * This function is used to update the faculty information



     * @param array $userInfo : This is faculty updated information



     * @param number $userId : This is faculty id



     */



    function editJobCategoryListing($JobCategoryInfo, $categoryId)



    {



        $this->db->where('id', $categoryId);



        $this->db->update('category', $JobCategoryInfo);



        



        return TRUE;



    }



    function deleteProjectShedule($id)

    {



        $this->db->where('id', $id);



        $this->db->delete('project_shedule'); 

		

		$this->db->where('projectId', $id);



        $this->db->delete('grade_members'); 

	

        return $this->db->affected_rows();

    }



    



    function deleteInvoiceListing($id)

    {

        $this->db->where('id', $id);



        $this->db->delete('invoice_pdf'); 

		

		$this->db->where('invoicePdf_id', $id);



        $this->db->delete('project_invoice'); 

		

        return $this->db->affected_rows();





    }





    /**



     * This function is used to delete the faculty information



     * @param number $userId : This is user id



     * @return boolean $result : TRUE / FALSE



     */



    function deletebrandsListing($id)



    {



	   



        $this->db->where('id', $id);



        $this->db->delete('brands'); 

		

        return $this->db->affected_rows();



    }



    function deleteJobCategory($id)



    {



	   



        $this->db->where('id', $id);



        $this->db->delete('category'); 

		

        return $this->db->affected_rows();



    }













    function getExportDelegatesInfo($uid,$mod_pay)



    {

	   

        $this->db->select('*');



        $this->db->from('delegate');

		

		if($mod_pay!="All"){

		



		

		$this->db->where('mod_pay', $mod_pay);

		

		}

		

		

		$likeCriteria = "(uid  LIKE '".$uid."%')";

		

		$this->db->where($likeCriteria);

		 



        $query = $this->db->get();

		//$str = $this->db->last_query();

		

		return $query->result_array();



        



        //return $query->row();



    }





   



   











    /**



     * This function used to get user information by id



     * @param number $userId : This is user id



     * @return array $result : This is user information



     */



    function getUserInfoById($userId)



    {



        $this->db->select('userId, name, email, mobile, roleId');



        $this->db->from('tbl_users');



        $this->db->where('isDeleted', 0);



        $this->db->where('userId', $userId);



        $query = $this->db->get();



        



        return $query->row();



    }





	function getTotalInvoiceAmount($Id)

		{



			 $this->db->select_sum('amount');

			 $this->db->from('project_invoice');

			 $this->db->where('invoicePdf_id',$Id);

			 $query=$this->db->get();

			 foreach ($query->result() as $row)

				{

					return $row->amount;

				}

		}

		

		

		function get_brand_id($brand)

		{

			$this->db->where('name', $brand);

			$query = $this->db->get('brands');

			foreach ($query->result() as $row)

			{

				return $row->id;

			}

		}

    

 function getGradeDetails($postData) 

 {

	$response = array();

	

	$this->db->select('*');    

	$this->db->from('tbl_members');

	$this->db->where('userId', $postData['member_id']);

	$query = $this->db->get();

	$response = $query->result_array();        

	return $response;

 }	

	

 function getClientDetails($postData)

 {

	$response = array();

	

	$this->db->select('enquiries.id,enquiries.client_id,enquiries.category_id,enquiries.project_title,enquiries.contact_person_id,contact.id,contact.name');    

	$this->db->from('enquiries');

	$this->db->join('contact', 'contact.id = enquiries.contact_person_id');

	$this->db->where('enquiries.id', $postData['enquiry_id']);



	

	$query = $this->db->get();

	$response = $query->result_array();        

	return $response;

 }	

 

  function getPdfData1($postData)

 {

	$response = array();

	

	$this->db->select('*');    

	$this->db->from('invoice_pdf');

	$this->db->where('project_id', $postData['project_id']);

	$query = $this->db->get();

	$response = $query->result_array();        

	return $response;

 }	

 

   function contactData1($postData)

 {

	$response = array();

	

	$this->db->select('*');    

	$this->db->from('mailSendContacts');

	$this->db->where('project_id', $postData['project_id']);

	$query = $this->db->get();

	$response = $query->result_array();        

	return $response;

 }

 

/* function contactData1($postData)

 {

	$response = array();

	

	$this->db->select('*');    

	$this->db->from('project_shedule');

	$this->db->where('id', $postData['project_id']);



	

	$query = $this->db->get();

	$response = $query->result_array();        

	return $response;

 }	

	*/

	

	

	



 

	

	

	

	

									//clien_id

	  function getContactDetails($postData){

        $response = array();

        

        // Select record

        $this->db->select('id,name');

        $this->db->where('brand_id', $postData['client_id']);

        $q = $this->db->get('contact');

        $response = $q->result_array();



        return $response;

    }

	

	function addNewProjectShedule($ProjectSheduleInfo)

    {

        $this->db->trans_start();

        $this->db->insert('project_shedule', $ProjectSheduleInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

	function addmailSendContacts($ProjectSheduleInfo2)

    {

        $this->db->trans_start();

        $this->db->insert('mailSendContacts', $ProjectSheduleInfo2);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

	

	function addProjectinvoiceInfo($ProjectinvoiceData)

    {

		$this->db->trans_start();

		

        $this->db->insert('invoice_pdf', $ProjectinvoiceData);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

  function editProjectinvoice3($ProjectinvoiceData,$project_id)

    {

        $this->db->where('project_id', $project_id);

        $this->db->update('invoice_pdf', $ProjectinvoiceData);

		

return $this->db->get('invoice_pdf')->row()->id;

    }

	

	function editNewProjectinvoiceInfo($ProjectinvoiceInfo,$project_id)

    {	

		$this->db->where('project_id', $project_id);

        $this->db->update('project_invoice', $ProjectinvoiceInfo);

		$updated_status = $this->db->affected_rows();

        

    }

	

	function editProjectinvoiceInfosum($ProjectinvoiceData, $Id)

    {

        $this->db->where('id', $Id);



        $this->db->update('invoice_pdf', $ProjectinvoiceData);

		$updated_status = $this->db->affected_rows();



    }

	

	function addNewProjectinvoiceInfo($ProjectinvoiceInfo)

    {

        $this->db->trans_start();

        $this->db->insert('project_invoice', $ProjectinvoiceInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

	function addNewProjectinvoicenumber($invoice_Number_Info)

    {

        $this->db->trans_start();

        $this->db->insert('invoice_number', $invoice_Number_Info);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

	function addNewProjectGrade($GradeInfo)

    {

        $this->db->trans_start();

        $this->db->insert('grade_members', $GradeInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

	



	

/*	function addMemberGrade($MemberGradeInfo, $result)



    {



        $this->db->where('projectId', $result);



        $this->db->update('grade_members', $MemberGradeInfo);

		





        return TRUE;



    }*/

	

	function addMemberGrade($MemberGradeInfo)

    {

        $this->db->trans_start();

        $this->db->insert('grade_members', $MemberGradeInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

	

	function deleteProjectinvoiceInfo($project_id)

    {



        $this->db->where('project_id', $project_id);



        $this->db->delete('project_invoice'); 

		

        return $this->db->affected_rows();



    }

	

	

	function deleteMemberGrade($TeamMemberId,$result)

    {



        $this->db->where('member_id', $TeamMemberId);

		

		$this->db->where('projectId', $result);



        $this->db->delete('grade_members'); 

		

        return $this->db->affected_rows();



    }

	

	 function getCategoryInfo()



    {



        $this->db->select('*');



        $this->db->from('category');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	 function getClientInfo()



    {



        $this->db->select('*');



        $this->db->from('brands');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getContactpersonInfo()



    {



        $this->db->select('*');



        $this->db->from('contact');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getTeamInfo($result)



    {



	$this->db->select('tbl_members.userId,tbl_members.name,tbl_members.email,tbl_members.mobile,tbl_members.designation,grade_members.id,grade_members.member_id,grade_members.member_name,grade_members.enquiryNo,grade_members.grade,grade_members.projectId');    

	$this->db->from('tbl_members');

	$this->db->join('grade_members', 'tbl_members.userId = grade_members.member_id','left');

	$this->db->where('projectId', $result);

	$this->db->order_by('member_id','asc');

    $query = $this->db->get();	

	return $query->result();



    }





	

	function getEnquiryInfo()



    {



        $this->db->select('*');



        $this->db->from('enquiries');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getallTeams()



    {



        $this->db->select('*');



        $this->db->from('tbl_members');

		

		$this->db->order_by('userId','asc');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getSheduleInfo()



    {



        $this->db->select('*');



        $this->db->from('project_shedule');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getProjectNumber()

    {



        $this->db->select('*');



        $this->db->from('project_shedule');



        $query = $this->db->get();

		

		return $query->result();



    }

//	function getProjectNumber2()

//    {

//

//        $this->db->select('*');

//

//        $this->db->from('invoice_pdf');

//

//        $query = $this->db->get();

//		

//		return $query->result();

//

//    }

	



	

	function getPdfDetails()

    {



        $this->db->select('*');



        $this->db->from('invoice_pdf');



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function getContactDeta()

    {

			

		$this->db->select('*');    

		$this->db->from('contact');

		

		$query = $this->db->get();	

		return $query->result();



    }

	

	function editProjectSheduleListing($ProjectSheduleInfo, $id)



    {



        $this->db->where('id', $id);



        $this->db->update('invoice_pdf', $ProjectSheduleInfo);

		$updated_status = $this->db->affected_rows();



        if($updated_status):

			return $id;

		else:

			return false;

		endif;



    }

	

	function editProjectinvoiceInfo($ProjectinvoiceData, $Id)

    {

        $this->db->where('id', $Id);



        $this->db->update('invoice_pdf', $ProjectinvoiceData);

		$updated_status = $this->db->affected_rows();



    }

	

	function getMemberEmail($TeamMemberId)

	{

	

			$this->db->where('userId', $TeamMemberId);

			$query = $this->db->get('tbl_members');

			foreach ($query->result() as $row)

			{

				return $row->email;

			}

	}

	

	function getMemberrName($TeamMemberId)

	{

	

			$this->db->where('userId', $TeamMemberId);

			$query = $this->db->get('tbl_members');

			foreach ($query->result() as $row)

			{

				return $row->name;

			}

	}

	

	function getContactEmail($contactId)

	{

	

			$this->db->where('id', $contactId);

			$query = $this->db->get('contact');

			foreach ($query->result() as $row)

			{

				return $row->email;

			}

	}

	

	function getMemberrGrade($TeamMemberId,$ProjectTabelId)

	{

	

			$this->db->where('member_id', $TeamMemberId);

			$this->db->where('projectId', $ProjectTabelId);

			$query = $this->db->get('grade_members');

			foreach ($query->result() as $row)

			{

				return $row->grade;

			}

	}

	

	function getMemberName($TeamMemberId)

	{

	

			$this->db->where('userId', $TeamMemberId);

			$query = $this->db->get('tbl_members');

			foreach ($query->result() as $row)

			{

				return $row->name;

			}

	}

	

	function getConatctName($contactId)

	{

	

			$this->db->where('id', $contactId);

			$query = $this->db->get('contact');

			foreach ($query->result() as $row)

			{

				return $row->name;

			}

	}

	



	



	

	function getpdffileName($enquiryNo)

	{

	



			$this->db->where('id', $enquiryNo);

			$query = $this->db->get('enquiries');

			foreach ($query->result() as $row)

			{

				return $row->project_brief_document_name;

			}

	}

	

	function getbrpid($enquiryNo)

	{

	



		$this->db->where('id', $enquiryNo);

			$query = $this->db->get('enquiries');

			foreach ($query->result() as $row)

			{

				return $row->brp_id;

			}



	}

	

	function getbrpEmail($brpid)

	{

	



		$this->db->where('userId', $brpid);

			$query = $this->db->get('tbl_users');

			foreach ($query->result() as $row)

			{

				return $row->email;

			}



	}

	

	function getbrpGrade($enquiryNo)

	{

	



		$this->db->where('enquiryNo', $enquiryNo);

			$query = $this->db->get('project_shedule');

			foreach ($query->result() as $row)

			{

				return $row->brp_grade;

			}



	}

	



	

	function getbrpName($brpid)

	{

	



		$this->db->where('userId', $brpid);

			$query = $this->db->get('tbl_users');

			foreach ($query->result() as $row)

			{

				return $row->name;

			}



	}

	

	function getWorkingStatus($id)

	{



		$this->db->where('id', $id);

			$query = $this->db->get('project_shedule');

			foreach ($query->result() as $row)

			{

				return $row->workingStatus;

			}



	}

	

	

	function get_brand_names()

	{

		$this->db->select('*');

	

		$this->db->from('brands');

		

		$query = $this->db->get();

		

		$result = $query->result();        

	

		return $result;

	}

	

	function getProjectDetails()

	{

		$this->db->select('*');

	

		$this->db->from('project_shedule');

		

		$query = $this->db->get();

		

		$result = $query->result();        

	

		return $result;

	}

	function getExportInfo()



    {

	   

        $this->db->select('*');



        $this->db->from('project_shedule');

	



        $query = $this->db->get();

		//$str = $this->db->last_query();

		

		return $query->result_array();



        //return $query->row();

    }

	

	function changeWorkingStatus($IdNew)

	{

		$this->db->set('workingStatus', 1); 

		$this->db->where('projectNumber', $IdNew);

		$this->db->update('project_shedule');

	}

	

	function changeWorkingStatus1($IdNew)

	{

		$this->db->set('workingStatus', 2); 

		$this->db->where('projectNumber', $IdNew);

		$this->db->update('project_shedule');

	}

	

	function getfileName($enquiry_id)

	{

		$this->db->select('file');

	

		$this->db->from('fileUp');

		

		$this->db->where('enquiryId', $enquiry_id);

		

		$query = $this->db->get();

		

		$result = $query->result_array();        

	

		return $result;

		

	}

	

	function getfileCount($enquiry_id)

	{

		$this->db->select('file');

	

		$this->db->from('fileUp');

		

		$this->db->where('enquiryId', $enquiry_id);

		

		$query = $this->db->get();

		

		$result = $query->result_array();        

	

		return $query->num_rows();

		

	}

	

	function getInvoice_pdf_Count()

	{

	    $this->db->select('*');

        $this->db->from('invoice_pdf');

		$this->db->order_by('id','desc');

        $query = $this->db->get();

        return $query->num_rows();

	}

	

	function getInvoice_pdf_details($page, $segment)

	{

$this->db->select('invoice_pdf.id,invoice_pdf.project_id,invoice_pdf.invoice_pdf,invoice_pdf.payment_due_date,invoice_pdf.status,invoice_pdf.currency,invoice_pdf.totalInvoiceAmount,project_shedule.projectTitle');    

	$this->db->from('invoice_pdf');

	$this->db->join('project_shedule', 'invoice_pdf.project_id = project_shedule.id');

	$this->db->limit($page, $segment);

    $query = $this->db->get();	

	return $query->result();

	}

	

	

	

	function getProjectInvoiceInfo($id)

	{

	

$this->db->select('invoice_pdf.id,invoice_pdf.project_id,invoice_pdf.invoice_pdf,invoice_pdf.payment_due_date,invoice_pdf.currency,invoice_pdf.totalInvoiceAmount,project_shedule.projectTitle');    

	$this->db->from('invoice_pdf');

	$this->db->join('project_shedule', 'invoice_pdf.project_id = project_shedule.id');

	$this->db->where('invoice_pdf.id', $id);

    $query = $this->db->get();	

	return $query->result();

	}

	

	function getProjectInvoiceInfo2($id)

    {



        $this->db->select('*');



        $this->db->from('project_invoice');

		

		$this->db->where('invoicePdf_id', $id);

		

		//$this->db->order_by("id", "asc");



        $query = $this->db->get();

		

		return $query->result();



    }

	

	function get_total_amount()

	{

		$this->db->select_sum('totalInvoiceAmount');

	

		$this->db->from('invoice_pdf');

		

		$query = $this->db->get();

		

    	return $query->row()->totalInvoiceAmount;

	}

	

	function get_sorted_total($project_id)

	{

		$this->db->select_sum('totalInvoiceAmount');

		

		$this->db->where('project_id', $project_id);

	

		$this->db->from('invoice_pdf');

		

		$query = $this->db->get();

		

    	return $query->row()->totalInvoiceAmount;

	}

	

	function get_pending_total($project_id)

	{

		$this->db->select_sum('totalInvoiceAmount');

		

		$this->db->where('project_id', $project_id);

		

		$where = '(status!=1)';

        $this->db->where($where);

	

		$this->db->from('invoice_pdf');

		

		$query = $this->db->get();
		
		$str = $this->db->last_query();
   
   /* echo "<pre>";
    print_r($str);
    exit;*/

		

    	return $query->row()->totalInvoiceAmount;

	}

	

	function get_total_pending_amount()

	{

		$this->db->select_sum('totalInvoiceAmount');

		

		//$where = '(status="" or status = 0)';
		$where = '(status!=1)';

        $this->db->where($where);

	

		$this->db->from('invoice_pdf');

		

		$query = $this->db->get();

		

    	return $query->row()->totalInvoiceAmount;

	}

	

	 function editProjectInvoice($deliverablesInfo)

    {



        $this->db->where('deliveryId', $id);

		$this->db->where('id', $deliveryId);



        $this->db->update('deliverables', $deliverablesInfo);

		

		$updated_status = $this->db->affected_rows();



        if($updated_status):

		return $id;

		else:

			return false;

		endif;



    }

	

	function editStatusInfo($updateStatus,$prjct_id)

    {

        $this->db->where('project_id', $prjct_id);



        $this->db->update('invoice_pdf', $updateStatus);

		

		

		return $updated_status = $this->db->affected_rows();



    }

	

	function addStatus($ProjectStatusData,$project_id)

    {	

		$this->db->where('id', $project_id);

        $this->db->update('invoice_pdf', $ProjectStatusData);

		$updated_status = $this->db->affected_rows();

		

        

    }



}