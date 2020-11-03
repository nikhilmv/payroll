<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class enquiries_model extends CI_Model
{



    function enquiriesListingsCount($searchText = '')

    {
		
        $this->db->select('*');

        $this->db->from('enquiries');

		if(!empty($searchText)) {

            $likeCriteria = "(project_title  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','desc');

        $query = $this->db->get();
		//$this->db->group_by('reference');

        return $query->num_rows();

    }

    


	
	
	
	function Enquirieslistings($searchText = '', $page, $segment)

    {
		
			
			$this->db->select('enquiries.id,enquiries.doc_created_status,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person');    
$this->db->from('enquiries');
$this->db->join('category', 'enquiries.category_id = category.id');
$this->db->join('brands', 'enquiries.client_id = brands.id');
$this->db->join('contact', 'enquiries.contact_person_id = contact.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');



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
	
		function getclintInfo($id)
    {

        $this->db->select('*');

        $this->db->from('brands');

        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row();

    }

	
	
	
	 function enquiriesListingsCount1($searchText = '', $userId)

    {
		
        $this->db->select('*');

        $this->db->from('enquiries');

		if(!empty($searchText)) {

            $likeCriteria = "(project_title  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->where('enquiries.brp_id', $userId);
		$this->db->order_by('id','desc');

        $query = $this->db->get();
		//$this->db->group_by('reference');

        return $query->num_rows();

    }

    


	
	
	
	function Enquirieslistings1($searchText = '', $page, $segment, $userId)

    {
		
			
			$this->db->select('enquiries.id,enquiries.doc_created_status,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person');    
$this->db->from('enquiries');
$this->db->join('category', 'enquiries.category_id = category.id');
$this->db->join('brands', 'enquiries.client_id = brands.id');
$this->db->join('contact', 'enquiries.contact_person_id = contact.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');
$this->db->where('enquiries.brp_id', $userId);


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



function getEnquiryInfo($id)
{

$this->db->select('enquiries.id,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,enquiries.project_brief_document_name,enquiries.doc_created_status,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person');    
$this->db->from('enquiries');
$this->db->join('category', 'enquiries.category_id = category.id');
$this->db->join('brands', 'enquiries.client_id = brands.id');
$this->db->join('contact', 'enquiries.contact_person_id = contact.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');
$this->db->where('enquiries.id', $id);

$query = $this->db->get();

//$result = $query->result();        
return $query->row();

}


    


   function addNewEnquiry($enquiryInfo)

    {

        $this->db->trans_start();

        $this->db->insert('enquiries', $enquiryInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }
    





	function getPrompts($id)

    {
	
	  $this->db->select('bd_form.id,bd_form.field_name,bd_form.prompt,project_document_form.enquiry_id,project_document_form.bd_form_field_id,project_document_form.prompt_answer');    
     $this->db->from('bd_form');
     $this->db->join('project_document_form', 'bd_form.id = project_document_form.bd_form_field_id','left');

	//$this->db->where('enquiries.id', $id);
	$this->db->where('project_document_form.enquiry_id', $id);
	$this->db->order_by("bd_form.id", "asc");
	
	
	
	$query = $this->db->get();
	
	
	$result = $query->result(); 
	return $result;       


    }
	
	function getPromptsQuestion()

    {
	
	  $this->db->select('*');    
     $this->db->from('bd_form');

	$this->db->order_by("id", "asc");
	
	
	
	$query = $this->db->get();
	
	
	$result = $query->result(); 
	return $result;       


    }
	 
	 
	 
	function EnquiryCheck($id)
	{
	
	
        $this->db->select("enquiry_id");
        $this->db->from("project_document_form");
        $this->db->where("enquiry_id", $id);   
       
   
        $query = $this->db->get();

        return $query->row();

	
	}
	
	function get_roleId($userId)
	{
		$this->db->where('userId', $userId);
	 	$query = $this->db->get('tbl_users');
	 	foreach ($query->result() as $row)
		{
		  return $row->roleId;
		}

	}
	
	function getBRPname($userId)
	{
		$this->db->where('userId', $userId);
	 	$query = $this->db->get('tbl_users');
	 	foreach ($query->result() as $row)
		{
		  return $row->userId;
		}

	}
	 
	 
	 
	function getBRPInfo()

    {

        $this->db->select('*');

        $this->db->from('tbl_users');

        $this->db->where('roleId','2');

       $query = $this->db->get();
		
		return $query->result();

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
	

	 

    function getEnquiryListingInfo($id)

    {

        $this->db->select('*');

        $this->db->from('enquiries');

        $this->db->where('id', $id);

        $query = $this->db->get();

        

        return $query->row();

    }

    

    

 

    function editEnquiryListing($enquiryInfo, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('enquiries', $enquiryInfo);

        

        return TRUE;

    }

     

    

   

    function deleteenquiryListing($id)

    {

	   

        $this->db->where('id', $id);

        $this->db->delete('enquiries'); 
		
        return $this->db->affected_rows();

    }





	
	
    function deletePBD($id)

    {

        $this->db->where('enquiry_id', $id);

        $this->db->delete('project_document_form'); 

        return $this->db->affected_rows();

    }
	
	
	
	
	
	function InsertToProjectBriefDoc($projectbdocInfo)

    {

        
  
        $this->db->trans_start();

        $this->db->insert('project_document_form',$projectbdocInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }

    
	

	
	
	
	  function upadteDocCreatedStatus($change_doc_created_status,$enquiry_id)

      {

        $this->db->where('id', $enquiry_id);

        $this->db->update('enquiries',$change_doc_created_status);

        

        return TRUE;

    }



function getPbdDocPdfInfo($enquiry_id)
{
//echo $enquiry_id;

$this->db->select('enquiries.id,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person,bd_form.id,bd_form.field_name,bd_form.prompt,project_document_form.enquiry_id,project_document_form.bd_form_field_id,project_document_form.prompt_answer');    
$this->db->from('enquiries');
$this->db->join('category', 'enquiries.category_id = category.id');
$this->db->join('brands', 'enquiries.client_id = brands.id');
$this->db->join('contact', 'enquiries.contact_person_id = contact.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');
$this->db->join('project_document_form', 'enquiries.id = project_document_form.enquiry_id');
$this->db->join('bd_form', 'bd_form.id=project_document_form.bd_form_field_id','left');
$this->db->where('enquiries.id', $enquiry_id);
$this->db->order_by("bd_form.id", "asc");

$query = $this->db->get();
//echo $this->db->last_query();
//exit();
//$result = $query->result();        
return $query->row();
return $result;   

}


function getPbdDocPdfInfo1($enquiry_id)
{
//echo $enquiry_id;

$this->db->select('enquiries.id,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person,bd_form.id,bd_form.field_name,bd_form.prompt,project_document_form.enquiry_id,project_document_form.bd_form_field_id,project_document_form.prompt_answer');    
$this->db->from('enquiries');
$this->db->join('category', 'enquiries.category_id = category.id');
$this->db->join('brands', 'enquiries.client_id = brands.id');
$this->db->join('contact', 'enquiries.contact_person_id = contact.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');
$this->db->join('project_document_form', 'enquiries.id = project_document_form.enquiry_id');
$this->db->join('bd_form', 'bd_form.id=project_document_form.bd_form_field_id','left');
$this->db->where('enquiries.id', $enquiry_id);
$this->db->order_by("bd_form.id", "asc");

$query = $this->db->get();
//echo $this->db->last_query();
//exit();
$result = $query->result();        
//return $query->row();
return $result;   

}







	  function PBDocUpdate($enquiry_id,$data)

    {

        $this->db->where('id', $enquiry_id);

        $this->db->update('enquiries', $data);

        

        return TRUE;

    }
   
   
   
   function getAdminEmail()
   {
   
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("userId", "1");   
       
   
        $query = $this->db->get();

        return $query->row();
   
   }
   






    function getUserInfoById($userId)

    {

        $this->db->select('userId, name, email, mobile, roleId');

        $this->db->from('tbl_users');

        $this->db->where('isDeleted', 0);

        $this->db->where('userId', $userId);

        $query = $this->db->get();

        

        return $query->row();

    }
	
	
	
 function Client_Category_SortCount($id)
    {
	
	$this->db->select('enquiries.id,enquiries.doc_created_status,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person');    
	$this->db->from('enquiries');
    $this->db->join('category', 'enquiries.category_id = category.id');
    $this->db->join('brands', 'enquiries.client_id = brands.id');
    $this->db->join('contact', 'enquiries.contact_person_id = contact.id');
    $this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');

if(!empty($id)) {

            $likeCriteria = "(brands.id  LIKE '%".$id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','asc');

        $query = $this->db->get();

        //$result = $query->result();        

       // return $result;
	   return $query->num_rows();
    }



function Client_Category_Sort($id, $page, $segment)

    {
	
			$this->db->select('enquiries.id,enquiries.doc_created_status,enquiries.brp_id,enquiries.project_title,enquiries.category_id,enquiries.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person');    
$this->db->from('enquiries');
$this->db->join('category', 'enquiries.category_id = category.id');
$this->db->join('brands', 'enquiries.client_id = brands.id');
$this->db->join('contact', 'enquiries.contact_person_id = contact.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');



        $this->db->limit($page, $segment);

		if(!empty($id)) {

            $likeCriteria = "(brands.id  LIKE '%".$id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','asc');

        $query = $this->db->get();

        $result = $query->result();        

        return $result;


    }


function get_client_names()
	{
		$this->db->select('*');
	
		$this->db->from('brands');
		
		$query = $this->db->get();
		
		$result = $query->result();        
	
		return $result;
	}
	
	
	
	function getContactDetails($postData)
  {
        $response = array();
        
        // Select record
        $this->db->select('id,name');
        $this->db->where('brand_id', $postData['client_id']);
        $q = $this->db->get('contact');
        $response = $q->result_array();

        return $response;
    }

     public function insert($fileInfo)
	{
		$this->db->trans_start();

        $this->db->insert('fileUp',$fileInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;

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
	
	function getfileUpInfo($id)
	{
		$this->db->select('file');
	
		$this->db->from('fileUp');
		
		$this->db->where('enquiryId', $id);
		
		$query = $this->db->get();
		
		$result = $query->result_array();        
	
		return $result;
		
	}

 
  




}



  