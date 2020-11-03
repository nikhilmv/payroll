	<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Expenses_model extends CI_Model
	{
	
		/**
	
		 * This function is used to get the faculty listing count
	
		 * @param string $searchText : This is optional search text
	
		 * @return number $count : This is row count
	
		 */
	
		function ExpenseCategoriesListingCount($searchText = '')
	
		{
			
			$this->db->select('*');
	
			$this->db->from('expense_cateogry');
	
			if(!empty($searchText)) {
	
				$likeCriteria = "(name  LIKE '%".$searchText."%')";
	
				$this->db->where($likeCriteria);
	
			}
	
			$this->db->order_by('id','desc');
	
			$query = $this->db->get();
			//$this->db->group_by('reference');
	
			return $query->num_rows();
	
		}
	
		 function ExpenseCategoriesListing($searchText = '', $page, $segment)
	
		{
	
			$this->db->select('*');
			
			$this->db->from('expense_cateogry');
	
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
		
		
		
		function ExpenseListingCount($searchText = '')
		{
			$this->db->select('*');
			$this->db->from('expenses');
			if(!empty($searchText)) 
			{
				$likeCriteria = "(expense_title  LIKE '%".$searchText."%')";
				$this->db->where($likeCriteria);
			}
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			return $query->num_rows();
		}
		
	
		function ExpenseListing($searchText = '', $page, $segment)
		{
	$this->db->select('expenses.id,expenses.expense_title,expenses.category_id,expenses.description,expenses.amount,expenses.date,expense_cateogry.id as expense_cat_id,expense_cateogry.name');    
	$this->db->from('expenses');
	$this->db->join('expense_cateogry', 'expenses.category_id = expense_cateogry.id');
			$this->db->limit($page, $segment);
			if(!empty($searchText))
			 {
				$likeCriteria = "(expense_title  LIKE '%".$searchText."%')";
				$this->db->where($likeCriteria);
			}
			$this->db->order_by('id','desc');	   
			$query = $this->db->get();
			$result = $query->result();        
			return $result;
		}
		
		
		
		
		function getExpenseCategoryListingInfo($id)
		{
			$this->db->select('*');
			$this->db->from('expense_cateogry');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		function getExpenseListingInfo($id)
		{
			$this->db->select('*');
			$this->db->from('expenses');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->row();
		}
		function getInhandAmountListingInfo()
		{
			$this->db->select('*');
			$this->db->from('settings');
			$query = $this->db->get();
			return $query->row();
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
	
	
	
	   function addNewExpenseCategory($ExpenseCategoryInfo)
		{
			$this->db->trans_start();
			$this->db->insert('expense_cateogry', $ExpenseCategoryInfo);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return $insert_id;
		}
		
		 function addNewInhandAmount($inhandAmountInfo)
		{
			$this->db->trans_start();
			$this->db->insert('settings', $inhandAmountInfo);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return $insert_id;
		}
		
		
	   function addNewExpenses($expenseInfo)
		{
			$this->db->trans_start();
			$this->db->insert('expenses', $expenseInfo);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return $insert_id;
		}
	
	
	
			function getCategoryInfo()
			{
					$this->db->select('*');
			
					$this->db->from('expense_cateogry');
					
					$query = $this->db->get();
					
					$result = $query->result();        
			
					return $result;
			}	
	
		
	
		/**
	
		 * This function is used to update the faculty information
	
		 * @param array $userInfo : This is faculty updated information
	
		 * @param number $userId : This is faculty id
	
		 */
	
		function editExpenseCategoryListing($ExpenseCategoryInfo, $categoryId)
	
		{
	
			$this->db->where('id', $categoryId);
	
			$this->db->update('expense_cateogry', $ExpenseCategoryInfo);
	
			
	
			return TRUE;
	
		}
	
		function editexpenseListingInfo($ExpenseListingInfo, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('expenses', $ExpenseListingInfo);
			return TRUE;
		}
		 function editInhandAmountListingInfo($inhandAmountInfo)
		{
			$this->db->update('settings', $inhandAmountInfo);
			return TRUE;
		}
	
	
		
	
		
	
		/**
	
		 * This function is used to delete the faculty information
	
		 * @param number $userId : This is user id
	
		 * @return boolean $result : TRUE / FALSE
	
		 */
	
		function deleteCategoryListing($id)
		{
	
			$this->db->where('id', $id);
	
			$this->db->delete('expense_cateogry'); 
			
			return $this->db->affected_rows();
	
		}
		
		function deleteExpenseListing($id)
		{
	
			$this->db->where('id', $id);
	
			$this->db->delete('expenses'); 
			
			return $this->db->affected_rows();
	
		}
		function deleteInhandAmountListing($id)
		{
	
			$this->db->where('id', $id);
	
			$this->db->delete('settings'); 
			
			return $this->db->affected_rows();
	
		}
	
		function deleteJobCategory($id)
	
		{
	
		   
	
			$this->db->where('id', $id);
	
			$this->db->delete('category'); 
			
			return $this->db->affected_rows();
	
		}
	
	
		function ExpenseListingSortCount($month,$year)
		{
		$this->db->select('*');
		$this->db->from('expenses');
	//		if(!empty($month))
	//		{
	//            $likeCriteria = "(MONTH(date)  LIKE '%".$month."%')";
	//			$likeCriteria = "(YEAR(date)  LIKE '%".$year."%')";
	//            $this->db->where($likeCriteria);
	//        }
			$this->db->where('YEAR(date)',$year);
			$this->db->where('MONTH(date)',$month);
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			
			return $query->num_rows();
		}
	
		function ExpenseListing_Sort($month, $year, $page, $segment)
		{
	$this->db->select('expenses.id,expenses.expense_title,expenses.category_id,expenses.description,expenses.amount,expenses.date,expense_cateogry.id as expense_cat_id,expense_cateogry.name');    
	$this->db->from('expenses');
	$this->db->join('expense_cateogry', 'expenses.category_id = expense_cateogry.id');
			$this->db->limit($page, $segment);
			$this->db->where('YEAR(date)',$year);
			$this->db->where('MONTH(date)',$month);
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			$result = $query->result();        
			return $result;
		}
	
	
	
	
	
		function categorySortCount($categorySort)
		{
			$this->db->select('*');
			$this->db->from('expenses');
			if(!empty($categorySort)) 
			{
				$likeCriteria = "(category_id  LIKE '%".$categorySort."%')";
				$this->db->where($likeCriteria);
			}
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			//$this->db->group_by('reference');
			return $query->num_rows();
		}
		
		
		function categorySort($categorySort, $page, $segment)
		{
		   $this->db->select('expenses.id,expenses.expense_title,expenses.category_id,expenses.description,expenses.amount,expenses.date,expense_cateogry.id as expense_cat_id,expense_cateogry.name');    
	$this->db->from('expenses');
	$this->db->join('expense_cateogry', 'expenses.category_id = expense_cateogry.id');
			$this->db->limit($page, $segment);
			$this->db->where('category_id',$categorySort);
			$this->db->order_by('id','desc');
			//$this->db->group_by('reference');
			$query = $this->db->get();
			$result = $query->result();        
			return $result;
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
		function get_total_amount()
		{
			$this->db->select_sum('amount');
		
			$this->db->from('expenses');
			
			$query = $this->db->get();
			
			return $query->row()->amount;
		}
		
		function get_total_sorted_amount($id)
		{
			$this->db->select_sum('amount');
		
			$this->db->from('expenses');
			
			$this->db->where('category_id', $id);
			
			$query = $this->db->get();
			
			return $query->row()->amount;
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
		
		function InhandAmountListingCount($searchText = '')
		{
			$this->db->select('*');
			$this->db->from('settings');
			if(!empty($searchText)) 
			{
				$likeCriteria = "(amount  LIKE '%".$searchText."%')";
				$this->db->where($likeCriteria);
			}
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			//$this->db->group_by('reference');
			return $query->num_rows();
		}
	
		function InhandAmountListing($searchText = '', $page, $segment)
		{
			$this->db->select('*');
			$this->db->from('settings');
			$this->db->limit($page, $segment);
			if(!empty($searchText)) 
			{
				$likeCriteria = "(amount  LIKE '%".$searchText."%')";
				$this->db->where($likeCriteria);
			}
			$this->db->order_by('id','desc');
			//$this->db->group_by('reference');
			$query = $this->db->get();
			$result = $query->result();        
			return $result;
		}
		
		function getSettingTableCount()
		{
			$this->db->select('*');
			$this->db->from('settings');
			$query = $this->db->get();
			return $query->num_rows();
		}
	
	
	}
	
	
	
	  