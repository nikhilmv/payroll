<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MemberStatusModel extends CI_Model
{

    function memberListingsCount($searchText = '')

    {
 		$this->db->select('*');
        $this->db->from('grade_members');
		if(!empty($searchText))
		{
            $likeCriteria = "(member_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->num_rows();

    }
	
	


	
	function get_member_names()
	{
		$this->db->select('*');
	
		$this->db->from('tbl_members');
		
		$query = $this->db->get();
		
		$result = $query->result();        
	
		return $result;
	}
	
	
	

 function getProjectId($team_member_id)
 {

		$this->db->where('member_id', $team_member_id);
		$query = $this->db->get('grade_members');
		foreach ($query->result() as $row)
		{
			return $row->projectId;
		}
 }	
 
  function getAllProjectId($team_member_id)
 {

		$this->db->where('member_id', $team_member_id);
		$query = $this->db->get('grade_members');
		$i= 0; 
		foreach ($query->result() as $row)
		{
			$ProjectId[$i] = $row->projectId;
			$i= $i + 1;
		}
		if($i == 0)
		{
			$ProjectId[0] = 0;
		}
		return $ProjectId;
 }	
 
 function getProjectDetailsCount($projectId,$status_id)

    {
 		$this->db->select('projectNumber,projectTitle,status');
		
		$this->db->from('project_shedule');
		
		$this->db->where_in('id', $projectId);
		
	
		if($status_id != 'All')
		{
			$this->db->where('status', $status_id);
		}
        $query = $this->db->get();
        return $query->num_rows();

    }
 
 
 
  function getProjectDetails($projectId, $status_id, $page, $segment)
 {
	
		$this->db->select('projectNumber,projectTitle,status');
		
		$this->db->from('project_shedule');
		
		$this->db->where_in('id', $projectId);
		
	
		if($status_id != 'All')
		{
			$this->db->where('status', $status_id);
		}
		$this->db->limit($page, $segment);
		
		$query = $this->db->get();
	
		$result = $query->result();        
	
		return $result;
	
 }	
	
	
	function Sponsor_Category_SortCount($category_id)
    {
	
	$this->db->select('project_shedule.id,project_shedule.enquiryNo,project_shedule.client,project_shedule.contactPerson,project_shedule.category,enquiries.project_title,brands.name as client_name,category.category_name,contact.name as contact_person');    
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
	$this->db->select('project_shedule.id,project_shedule.enquiryNo,project_shedule.client,project_shedule.contactPerson,project_shedule.category,enquiries.project_title,brands.name as client_name,category.category_name,contact.name as contact_person');    
	$this->db->from('project_shedule');
	$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');
	$this->db->join('brands', 'project_shedule.client = brands.id');
	$this->db->join('category', 'project_shedule.category = category.id');
	$this->db->join('contact', 'project_shedule.contactPerson = contact.id');



        $this->db->limit($page, $segment);

		if(!empty($category_id)) {

            $likeCriteria = "(contact.brand_id  LIKE '%".$category_id."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','desc');

        $query = $this->db->get();

        $result = $query->result();    

        return $result;

    }

	

}
?>


  