<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class BrpReport_model extends CI_Model
{

    function memberListingsCount($searchText = '')

    {
$this->db->select('project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.projectTitle,project_shedule.brp_grade,enquiries.id,enquiries.brp_id,tbl_users.userId,tbl_users.name,tbl_users.roleId');    
$this->db->from('project_shedule');
$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');
		if(!empty($searchText))
		{
            $likeCriteria = "(name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('enquiryNo','desc');
		$this->db->where('tbl_users.roleId',2);
		$this->db->where('project_shedule.brp_grade !=', '' );
        $query = $this->db->get();
        return $query->num_rows();

    }

    


	
	
	
	function memberListings($searchText = '', $page, $segment)

    {
		
$this->db->select('project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.projectTitle,project_shedule.brp_grade,enquiries.id,enquiries.brp_id,tbl_users.userId,tbl_users.name,tbl_users.roleId');    
$this->db->from('project_shedule');
$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');


	$this->db->limit($page, $segment);

	if(!empty($searchText)) {

		$likeCriteria = "(name  LIKE '%".$searchText."%')";

		$this->db->where($likeCriteria);

	}

	$this->db->order_by('enquiryNo','asc');
	
	$this->db->where('tbl_users.roleId',2);
	$this->db->where('project_shedule.brp_grade !=', '' );

	$query = $this->db->get();

	$result = $query->result();        

	return $result;

    }
	
	function get_member_names()
	{
		$this->db->select('*');
	
		$this->db->from('tbl_users');
		$this->db->where('roleId',2);
		
		$query = $this->db->get();
		
		$result = $query->result();        
	
		return $result;
	}
	
	
	function member_Category_SortCount($member_id)
    {
	
$this->db->select('project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.projectTitle,project_shedule.brp_grade,enquiries.id,enquiries.brp_id,tbl_users.userId,tbl_users.name,tbl_users.roleId');    
$this->db->from('project_shedule');
$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');


		if(!empty($member_id))
		{

            $likeCriteria = "(tbl_users.userId  LIKE '%".$member_id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('enquiryNo','desc');
		$this->db->where('project_shedule.brp_grade !=', '' );

        $query = $this->db->get();

		

        return $query->num_rows();

    }
	
	
		
	 function member_Category_Sort($member_id, $page, $segment)

    {
$this->db->select('project_shedule.enquiryNo,project_shedule.projectNumber,project_shedule.projectTitle,project_shedule.brp_grade,enquiries.id,enquiries.brp_id,tbl_users.userId,tbl_users.name,tbl_users.roleId');    
$this->db->from('project_shedule');
$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');
$this->db->join('tbl_users', 'enquiries.brp_id = tbl_users.userId');


        $this->db->limit($page, $segment);

		if(!empty($member_id)) {

            $likeCriteria = "(tbl_users.userId  LIKE '%".$member_id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('enquiryNo','desc');
		$this->db->where('project_shedule.brp_grade !=', '' );

        $query = $this->db->get();

        $result = $query->result();    
	
        return $result;

    }

 function getProjectDetails($postData)
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
	

}
?>


  