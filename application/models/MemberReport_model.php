<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MemberReport_model extends CI_Model
{

    function memberListingsCount($searchText = '')

    {
$this->db->select('grade_members.id,grade_members.member_id,grade_members.member_name,grade_members.enquiryNo,grade_members.grade,grade_members.projectId,tbl_members.userId,enquiries.id,enquiries.project_title');    
$this->db->from('grade_members');
$this->db->join('tbl_members', 'grade_members.member_id = tbl_members.userId');
$this->db->join('enquiries', 'grade_members.enquiryNo = enquiries.id');
		if(!empty($searchText))
		{
            $likeCriteria = "(member_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->where('grade_members.grade !=', '' );
		$this->db->order_by('enquiryNo','desc');
        $query = $this->db->get();
        return $query->num_rows();

    }

    


	
	
	
	function memberListings($searchText = '', $page, $segment)

    {
		
$this->db->select('grade_members.id,grade_members.member_id,grade_members.member_name,grade_members.enquiryNo,grade_members.grade,grade_members.projectId,tbl_members.userId,enquiries.id,enquiries.project_title');    
$this->db->from('grade_members');
$this->db->join('tbl_members', 'grade_members.member_id = tbl_members.userId');
$this->db->join('enquiries', 'grade_members.enquiryNo = enquiries.id');


	$this->db->limit($page, $segment);

	if(!empty($searchText)) {

		$likeCriteria = "(member_name  LIKE '%".$searchText."%')";

		$this->db->where($likeCriteria);

	}
	$this->db->where('grade_members.grade !=', '' );

	$this->db->order_by('enquiryNo','asc');

	$query = $this->db->get();

	$result = $query->result();        

	return $result;

    }
	
	function get_member_names()
	{
		$this->db->select('*');
	
		$this->db->from('tbl_members');
		
		$query = $this->db->get();
		
		$result = $query->result();        
	
		return $result;
	}
	
	
	function member_Category_SortCount($member_id)
    {
	
$this->db->select('grade_members.id,grade_members.member_id,grade_members.member_name,grade_members.enquiryNo,grade_members.grade,grade_members.projectId,tbl_members.userId,enquiries.id,enquiries.project_title');    
$this->db->from('grade_members');
$this->db->join('tbl_members', 'grade_members.member_id = tbl_members.userId');
$this->db->join('enquiries', 'grade_members.enquiryNo = enquiries.id');


		if(!empty($member_id))
		{

            $likeCriteria = "(member_id  LIKE '%".$member_id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('enquiryNo','desc');
		$this->db->where('grade_members.grade !=', '' );

        $query = $this->db->get();

		

        return $query->num_rows();

    }
	
	
		
	 function member_Category_Sort($member_id, $page, $segment)

    {
$this->db->select('grade_members.id,grade_members.member_id,grade_members.member_name,grade_members.enquiryNo,grade_members.grade,grade_members.projectId,tbl_members.userId,enquiries.id,enquiries.project_title');    
$this->db->from('grade_members');
$this->db->join('tbl_members', 'grade_members.member_id = tbl_members.userId');
$this->db->join('enquiries', 'grade_members.enquiryNo = enquiries.id');


        $this->db->limit($page, $segment);

		if(!empty($member_id)) {

            $likeCriteria = "(grade_members.member_id  LIKE '%".$member_id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('enquiryNo','desc');
		$this->db->where('grade_members.grade !=', '' );

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


  