<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Brands_model extends CI_Model
{

    /**

     * This function is used to get the faculty listing count

     * @param string $searchText : This is optional search text

     * @return number $count : This is row count

     */

    function brandsListingsCount($searchText = '')

    {
		
        $this->db->select('*');

        $this->db->from('brands');

		if(!empty($searchText)) {

            $likeCriteria = "(name  LIKE '%".$searchText."%')";

            $this->db->where($likeCriteria);

        }

		$this->db->order_by('id','desc');

        $query = $this->db->get();
		//$this->db->group_by('reference');

        return $query->num_rows();

    }

    

    /**

     * This function is used to get the user listing count

     * @param string $searchText : This is optional search text

     * @param number $page : This is pagination offset

     * @param number $segment : This is pagination limit

     * @return array $result : This is result

     */

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



    


   function addNewBrand($brandInfo)

    {

        $this->db->trans_start();

        $this->db->insert('brands', $brandInfo);

        

        $insert_id = $this->db->insert_id();

        

        $this->db->trans_complete();

        

        return $insert_id;

    }
    

    /**

     * This function used to get user information by id

     * @param number $userId : This is user id

     * @return array $result : This is user information

     */
	 
	 
	 
	  function viewDelegateListing($reference)

    {

        $this->db->select('*');

        $this->db->from('delegate');

        $this->db->where('reference', $reference);

        $query = $this->db->get();
		
		 return $query->row();

    }
	
	function getDelegates($reference_no)

    {

        $this->db->select('*');
        $this->db->from('delegate');
        $this->db->where('reference', $reference_no);
		$this->db->where("(delegate_type='Indian_delegate' OR delegate_type='Overseas_delegate' )", NULL, FALSE);


        $query = $this->db->get();
		
		return $query->result();

    }
	
	function getSpouses($reference_no)

    {

        $this->db->select('*');
        $this->db->from('delegate');
	    $this->db->where('reference', $reference_no);
		$this->db->where("(delegate_type='Indian_spouse' OR delegate_type='Overseas_spouse' )", NULL, FALSE);


        $query = $this->db->get();
		
		return $query->result();

    }
	
	function getDelegatescount($reference_no)

    {
        $this->db->select('*');
        $this->db->from('delegate');
        $this->db->where('reference', $reference_no);
		$this->db->where("(delegate_type='Indian_delegate' OR delegate_type='Overseas_delegate' )", NULL, FALSE);
        $query = $this->db->get();
		return $query->num_rows();

    }
	
	function getSpousescount($reference_no)
    {
        $this->db->select('*');
        $this->db->from('delegate');
	    $this->db->where('reference', $reference_no);
		$this->db->where("(delegate_type='Indian_spouse' OR delegate_type='Overseas_spouse' )", NULL, FALSE);
        $query = $this->db->get();
		return $query->num_rows();

    }
	
	function getCompanyDetails($reference)

    {

        $this->db->select('*');

        $this->db->from('delegate');

        $this->db->where('reference', $reference);

        $query = $this->db->get();


        return $query->row();

    }
	
	
  function delegateInvoice($reference)

    {

        $this->db->select('*');

        $this->db->from('delegate');

        $this->db->where('reference', $reference);

        $query = $this->db->get();


        return $query->row();

    }
	
	
	  function delegateInvoiceUpdate($reference,$data)

    {

        $this->db->where('reference', $reference);

        $this->db->update('delegate', $data);

        

        return TRUE;

    }
	
	
	 

    function getBrandListingInfo($id)

    {

        $this->db->select('*');

        $this->db->from('brands');

        $this->db->where('id', $id);

        $query = $this->db->get();

        

        return $query->row();

    }

    	function get_brand_names()
		{
				$this->db->select('*');
		
				$this->db->from('brands');
				
				$query = $this->db->get();
				
				$result = $query->result();        
		
				return $result;
		}	

    

    /**

     * This function is used to update the faculty information

     * @param array $userInfo : This is faculty updated information

     * @param number $userId : This is faculty id

     */

    function editbrandsListing($brandInfo, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('brands', $brandInfo);

        

        return TRUE;

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



  