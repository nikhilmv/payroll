<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ExportProjectsModel extends CI_Model
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
	
	


	
	function get_status_details()
	{
		$this->db->select('*');
	
		$this->db->from('project_shedule');
		
		$query = $this->db->get();
		
		$result = $query->result();        
	
		return $result;
	}
	
	
	function getExportInfo($status_value)
    {
	   
	$this->db->select('project_shedule.projectNumber,project_shedule.client,project_shedule.enquiryNo,enquiries.brp_id,project_shedule.projectTitle,project_shedule.team,project_shedule.deadline,project_shedule.workingStatus,brands.name as client_name');    
	$this->db->from('project_shedule');
	$this->db->join('enquiries', 'project_shedule.enquiryNo = enquiries.id');
	$this->db->join('brands', 'project_shedule.client = brands.id');
	$this->db->where('workingStatus', $status_value);

        $query = $this->db->get();
		//$str = $this->db->last_query();
		
		return $query->result_array();

        //return $query->row();
    }
	
 function getEmailBRP($brpID)
 {

		$this->db->where('userId', $brpID);
		$query = $this->db->get('tbl_users');
		foreach ($query->result() as $row)
		{
			return $row->email;
		}
 }	
 
  function getTeamMemberName($team_id)
 {
		$this->db->where('userId', $team_id);
		$query = $this->db->get('tbl_members');
		foreach ($query->result() as $row)
		{
			return $row->name;
		}
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
 
 
 
  function getProjectDetails($projectId,$status_id)
 {
	
		$this->db->select('projectNumber,projectTitle,status');
		
		$this->db->from('project_shedule');
		
		$this->db->where('id', $projectId);
		
	
		if($status_id != 'All')
		{
			$this->db->where('status', $status_id);
		}
		
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


  