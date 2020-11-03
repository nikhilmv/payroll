<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts_model extends CI_Model
{
    function contactsCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('contact');
		if(!empty($searchText))
		{
            $likeCriteria = "(name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	
	function contactlisting($searchText = '', $page, $segment)
  	{
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->limit($page, $segment);
		
			 if(!empty($searchText))
			 {
				$likeCriteria = "(name  LIKE '%".$searchText."%')";
				$this->db->where($likeCriteria);
			 }
		 
		$this->db->order_by('id','desc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


	function viewContactListing($id)
    {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();

    }
	
/*	function deleteContactListing($Id)
    {
        $this->db->where('id', $Id);
        $this->db->delete('contact'); 	
        return $this->db->affected_rows();
    }*/
	
	
 function addNewContact($contactInfo)
    {
	
        $this->db->trans_start();
        $this->db->insert('contact', $contactInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

    }
	
function getContactListingInfo($id)
    {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
	
 function editcontactsListing($contactInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('contact', $contactInfo);
        return TRUE;

    }	
	
 function deletecontactListing($id)
    {
		$this->db->where('id', $id);
        $this->db->delete('contact'); 
        return $this->db->affected_rows();

    }
	
function Sponsor_Category_SortCount($category_id)
    {
	
	$this->db->select('
			brands.id,brands.name,brands.website_url,brands.description,brands.logo,
			contact.id AS contact_table_id,contact.name,contact.email,contact.mobile,contact.brand_id,contact.brand_name,contact.created,contact.modified,');    
			$this->db->from('brands');
			$this->db->join('contact', 'brands.id = contact.brand_id');


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
		$this->db->select('
			brands.id AS brand_id,brands.name,brands.website_url,brands.description,brands.logo,
			contact.id ,contact.name,contact.email,contact.mobile,contact.brand_id,contact.brand_name,contact.created,contact.modified,');    
			$this->db->from('brands');
			$this->db->join('contact', 'brands.id = contact.brand_id');



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
		
	
	function get_brand_names()
	{
		$this->db->select('*');
	
		$this->db->from('brands');
		
		$query = $this->db->get();
		
		$result = $query->result();        
	
		return $result;
	}
	
	function get_brandName()
	{
		$this->db->select('*');

        $this->db->from('brands');
		
		$query = $this->db->get();
		
		return $query->result();
	
	}
	
		function get_brand_id($brand_name)
		{
			$this->db->where('name', $brand_name);
			$query = $this->db->get('brands');
			foreach ($query->result() as $row)
			{
				return $row->id;
			}
		}
	
}