<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bdform_model extends CI_Model
{


    function bdformfieldsCount($searchText = '')

    {
		
        $this->db->select('*');

        $this->db->from('bd_form');

		if(!empty($searchText)) {

            $likeCriteria = "(field_name  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','desc');

        $query = $this->db->get();
		//$this->db->group_by('reference');

        return $query->num_rows();

    }

    



    function Formfieldlistings($searchText = '', $page, $segment)

    {

        $this->db->select('*');
		
        $this->db->from('bd_form');

        $this->db->limit($page, $segment);

		if(!empty($searchText)) {

            $likeCriteria = "(field_name  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','asc');
	    //$this->db->group_by('reference');
        $query = $this->db->get();

        $result = $query->result();        

        return $result;

    }



    


   function addNewFormField($formfieldInfo)

    {

        $this->db->trans_start();

        $this->db->insert('bd_form', $formfieldInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }
    

   
	
	
	 

    function getBDFormFieldInfo($id)

    {

        $this->db->select('*');

        $this->db->from('bd_form');

        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row();

    }

    	
    


    function editBdFormField($formfieldInfo, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('bd_form', $formfieldInfo);

        

        return TRUE;

    }

    

    

    

    /**

     * This function is used to delete the faculty information

     * @param number $userId : This is user id

     * @return boolean $result : TRUE / FALSE

     */

    function deleteBDFormField($id)

    {

	   

        $this->db->where('id', $id);

        $this->db->delete('bd_form'); 
		
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


	function get_brand_id($brand)
		{
			$this->db->where('name', $brand);
			$query = $this->db->get('brands');
			foreach ($query->result() as $row)
			{
				return $row->id;
			}
		}
    



}



  