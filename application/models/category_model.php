<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class category_model extends CI_Model
{
    /**
     * This function is used to get the faculty listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function categoryListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('ren_listing_category');
		if(!empty($searchText)) {
            $likeCriteria = "(category_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('category_id','desc');
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
    function categoryListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('ren_listing_category');
        $this->db->limit($page, $segment);
		if(!empty($searchText)) {
            $likeCriteria = "(category_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('category_id','desc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

   function addNewCategory($categoryInfo)
    {
        $this->db->trans_start();
        $this->db->insert('ren_listing_category', $categoryInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getCategoryInfo($id)
    {
        $this->db->select('*');
        $this->db->from('ren_listing_category');
        $this->db->where('category_id', $id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the faculty information
     * @param array $userInfo : This is faculty updated information
     * @param number $userId : This is faculty id
     */
    function editCategory($catInfo, $catId)
    {
        $this->db->where('category_id', $catId);
        $this->db->update('ren_listing_category', $catInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the faculty information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCategory($categoryId)
    {
	   
        $this->db->where('category_id', $categoryId);
        $this->db->delete('ren_listing_category'); 
        
        return $this->db->affected_rows();
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

    

}

  
