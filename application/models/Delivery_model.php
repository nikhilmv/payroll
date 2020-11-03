<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class delivery_model extends CI_Model
{

    function deliveryListingsCount($searchText = '')

    {
		
			$this->db->select('delivery_shedule.id,delivery_shedule.project_title,delivery_shedule.deliverables,delivery_shedule.timelines,delivery_shedule.estimated_budget,delivery_shedule.project_number_id,delivery_shedule.client_id,delivery_shedule.contact_person_id,brands.name as client_name,contact.name as contact_person');    
			$this->db->from('delivery_shedule');
			$this->db->join('project_shedule', 'delivery_shedule.project_number_id = project_shedule.id');
			$this->db->join('brands', 'delivery_shedule.client_id = brands.id');
			$this->db->join('contact', 'delivery_shedule.contact_person_id = contact.id');

		if(!empty($searchText)) {

            $likeCriteria = "(project_title  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','desc');

        $query = $this->db->get();
		//$this->db->group_by('reference');

        return $query->num_rows();

    }

    


	
	
	
	function Deliverylistings($searchText = '', $page, $segment)

    {
		
			
						$this->db->select('delivery_shedule.id,delivery_shedule.project_title,delivery_shedule.deliverables,delivery_shedule.timelines,delivery_shedule.estimated_budget,delivery_shedule.project_number_id,delivery_shedule.client_id,delivery_shedule.contact_person_id,brands.name as client_name,contact.name as contact_person,project_shedule.projectTitle,project_shedule.projectNumber');    
$this->db->from('delivery_shedule');
$this->db->join('project_shedule', 'delivery_shedule.project_number_id = project_shedule.id');
$this->db->join('brands', 'delivery_shedule.client_id = brands.id');
$this->db->join('contact', 'delivery_shedule.contact_person_id = contact.id');

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

$this->db->select('delivery_shedule.id,delivery_shedule.brp_id,delivery_shedule.project_title,delivery_shedule.category_id,delivery_shedule.deadline,tbl_users.name,category.category_name,brands.name as client_name,contact.name as contact_person');    
$this->db->from('delivery_shedule');
$this->db->join('category', 'delivery_shedule.category_id = category.id');
$this->db->join('brands', 'delivery_shedule.client_id = brands.id');
$this->db->join('contact', 'delivery_shedule.contact_person_id = contact.id');
$this->db->join('tbl_users', 'delivery_shedule.brp_id = tbl_users.userId');
$this->db->where('delivery_shedule.id', $id);

$query = $this->db->get();

$result = $query->result();        
return $result;

}



function getDeliverySheduleInfo($id)
{
$this->db->select('delivery_shedule.id,delivery_shedule.project_number_id,delivery_shedule.contact_person_id,delivery_shedule.project_title,delivery_shedule.deliverables,delivery_shedule.timelines,delivery_shedule.estimated_budget,brands.name as client,contact.name as contact_person,project_shedule.projectNumber'); 
$this->db->from('delivery_shedule');
$this->db->join('brands', 'delivery_shedule.client_id = brands.id');
$this->db->join('contact', 'delivery_shedule.contact_person_id = contact.id');
$this->db->join('project_shedule', 'delivery_shedule.project_number_id = project_shedule.id');
$this->db->where('delivery_shedule.id', $id);

  $query = $this->db->get();
  return $query->row();

}

    


   function addNewDelivery($deliveryInfo)

    {

        $this->db->trans_start();

        $this->db->insert('delivery_shedule', $deliveryInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }
    


   function addNewDeliveryInfo($deliverablesInfo)

    {

        $this->db->trans_start();

        $this->db->insert('deliverables', $deliverablesInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }
	 
	 
	 
	 
	  function getprojectInfo()

    {

        $this->db->select('*');

        $this->db->from('project_shedule');
		
		$this->db->order_by('id','asc');

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
	
	 function getdeliverablesInfo($id)

    {

        $this->db->select('*');

        $this->db->from('deliverables');
		
		$this->db->where('deliveryId', $id);

        $query = $this->db->get();
		
		return $query->result();

    }
	 

    function getDeliveryListingInfo($id)

    {

        $this->db->select('*');

        $this->db->from('delivery_shedule');

        $this->db->where('id', $id);

        $query = $this->db->get();

        

        return $query->row();

    }

    

    

 

    function editDeliveryListing($DeliveryyInfo, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('delivery_shedule', $DeliveryyInfo);
		
		$updated_status = $this->db->affected_rows();

        if($updated_status):
		return $id;
		else:
			return false;
		endif;
        

        return TRUE;

    }
	
	 function editNewDeliveryInfo($deliverablesInfo, $id ,$deliveryId)

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

    function getAdmin_emailId()
	{
		$this->db->where('roleId', 1);
	 	$query = $this->db->get('tbl_users');
	 	foreach ($query->result() as $row)
		{
		  return $row->email;
		}

	} 

    

   

    function deletedeliveryListing($id)

    {

	   

        $this->db->where('id', $id);

        $this->db->delete('delivery_shedule'); 
		
        return $this->db->affected_rows();

    }




function getPBDInfo($id)

    {
	    $this->db->select('*');

        $this->db->from('project_document_form');
		
	    $this->db->where('enquiry_id', $id);

        $query = $this->db->get();

        $result = $query->result();        

        return $result;
	
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


  /*function getClientDetails($postData)
  {
        $response = array();
        
        // Select record
        $this->db->select('client');
        $this->db->where('id', $postData['project_number_id']);
        $q = $this->db->get('project_shedule');
        $response = $q->result_array();

        return $response;
    }*/
	
	function getClientDetails($postData)
  {
        $response = array();
	
	$this->db->select('project_shedule.id,project_shedule.enquiryNo,project_shedule.client,project_shedule.contactPerson,project_shedule.projectNumber,project_shedule.	projectTitle,contact.id,contact.name');    
	$this->db->from('project_shedule');
	$this->db->join('contact', 'contact.id = project_shedule.contactPerson');
	$this->db->where('project_shedule.id', $postData['project_number_id']);

	
	$query = $this->db->get();
	$response = $query->result_array();        
	return $response;
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
	function changeClientStatus($project_number_id)
	{  
		$this->db->set('clientStatus', 1); 
		$this->db->where('id', $project_number_id);
		$this->db->update('project_shedule'); 
	}

}



  