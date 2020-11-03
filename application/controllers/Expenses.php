<?php 
ob_start();
if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Expenses extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        @parent::__construct();
        $this->load->model('Expenses_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the delegate
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Expenses Listings';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
	
    
    /**
     * This function is used to load the delegate
     */
    function ExpenseCategoryListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
			
			
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
           $count = $this->Expenses_model->ExpenseCategoriesListingCount($searchText);
			
			
			$returns = $this->paginationCompress ( "Expenses/ExpenseCategoriesListing/", $count, 10, 3 );
			
            
            $data['ExpenseCategoriesListingsRecords'] = $this->Expenses_model->ExpenseCategoriesListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Expense Category Listings';
            
            $this->loadViews("ExpenseCategoriesListing", $this->global, $data, NULL);
        }
    }
  
   
   
  
   
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('Expenses_model');
                      
            $this->global['pageTitle'] = 'Add New Category';
            $this->loadViews("addNewExpenseCategory", $this->global, NULL);
        }
    }
	
	
	
		
		
    function addNewExpenseCategory()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('categoryName','Category Name','trim|required');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
			   
			    $categoryName = $this->input->post('categoryName');
				
                $ExpenseCategoryInfo = array('name'=>$categoryName);
                
                $this->load->model('Expenses_model');
                $result = $this->Expenses_model->addNewExpenseCategory($ExpenseCategoryInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Expense Category created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Expense Category creation failed');
                }
                
                redirect('Expenses/ExpenseCategoryListing');
            }
        }
    }
   
    /**
     * This function is used load delegate edit information
     * @param number $Id : Optional : This is  id
     */
    function editExpenseCategory($id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('Expenses/ExpenseCategoryListing');
            }
            
            $data['ExpenseCategoryInfo'] = $this->Expenses_model->getExpenseCategoryListingInfo($id);
            
            $this->global['pageTitle'] = 'Edit Expense Category Listing';
            
            $this->loadViews("editExpenseCategory", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editExpenseCategoryNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
     
            else
            {
			
			    $categoryId = $this->input->post('categoryId');
				$categoryName = $this->input->post('categoryName');
				
	
                $Info = array();
               $ExpenseCategoryInfo = array('name'=>$categoryName);
				
                $result = $this->Expenses_model->editexpenseCategoryListing($ExpenseCategoryInfo, $categoryId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Expense Category Listing updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Expense Category Listing updation failed');
                }
                
               redirect('Expenses/ExpenseCategoryListing');
            }
        }
    /**
     * This function is used to delete the faculty using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteExpenseCategory()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->Expenses_model->deleteCategoryListing($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	
	 function deleteExpenseListing()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->Expenses_model->deleteExpenseListing($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	
    function deleteInhandAmountListing()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->Expenses_model->deleteInhandAmountListing($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	

	
		function uplo()
		 {}
		
		
	function addExpenses()
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('Expenses_model');
            $data['CategoryInfo'] = $this->Expenses_model->getCategoryInfo();         
            $this->global['pageTitle'] = 'Add New Expenses';
            $this->loadViews("addNewExpenses", $this->global,$data, NULL);
        }
    }	
		
		
	function addNewExpenses()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
		else
		{
			$this->load->model('Expenses_model');
			
			$this->load->library('form_validation');
            
            $this->form_validation->set_rules('expense_title','expense Title','trim|required');
			$this->form_validation->set_rules('category_id','category','required');
			$this->form_validation->set_rules('description','description','required');
			$this->form_validation->set_rules('amount','amount','required');
			$this->form_validation->set_rules('date','date','required');
			
		    if($this->form_validation->run() == FALSE)
            {
                $this->addNewExpenses();
            }
            else
            {
				$expense_title = $this->input->post('expense_title');				
                $category_id = $this->input->post('category_id');
				$description = $this->input->post('description');
				$amount = $this->input->post('amount');
				$date = $this->input->post('date');
				
				$expenseInfo = array('expense_title'=>$expense_title, 'category_id'=>$category_id,'description'=>$description,'amount'=>$amount,'date'=>$date);
                
                $this->load->model('Expenses_model');
                $result = $this->Expenses_model->addNewExpenses($expenseInfo);
              
				
			}
		redirect('Expenses/ListExpenses');	
		}
		
	}
	
	function ListExpenses()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->Expenses_model->ExpenseListingCount($searchText);
			$returns = $this->paginationCompress ( "Expenses/ListExpenses/", $count, 10, 3 );
			if($count==0)
			{
				$data['total_amount']="0";
				$data['ExpenseListings']="(empty)";	
			}
			else
			{
			$data['total_amount']=$this->Expenses_model->get_total_amount();
			$data['categoryName']=$this->Expenses_model->getCategoryInfo();
			$data['ExpenseListingsRecords'] = $this->Expenses_model->ExpenseListing($searchText, $returns["page"], $returns["segment"]);
			$data['sortEnable']="0";
			}
           
            $this->global['pageTitle'] = 'Expense Listings';
            $this->loadViews("ExpenseListing", $this->global, $data, NULL);
			
			

        }
    }
	
	function editExpenseListing($id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('Expenses/ListExpenses');
            }
            $data['CategoryInfo'] = $this->Expenses_model->getCategoryInfo();    
            $data['ExpenseListingInfo'] = $this->Expenses_model->getExpenseListingInfo($id);
            
            $this->global['pageTitle'] = 'Edit Expense Listing';
            
            $this->loadViews("editExpenseListings", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editExpenseListingNew1()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
            else
            {
			    $expense_title = $this->input->post('expense_title');
				$category_id = $this->input->post('category_id');
				$description = $this->input->post('description');
				$amount = $this->input->post('amount');
				$date = $this->input->post('date');
				$id = $this->input->post('id');
				

                $Info = array();
                $ExpenseListingInfo = array('expense_title'=>$expense_title, 'category_id'=>$category_id, 'description'=>$description, 'amount'=>$amount, 'date'=>$date);
                $result = $this->Expenses_model->editexpenseListingInfo($ExpenseListingInfo, $id);

               redirect('Expenses/ListExpenses');
            }
        }
		
		function monthSort()
		{
			if($this->isAdmin() == TRUE)
			{
				$this->loadThis();
			}
			else
        	{
			 	$Date = $this->security->xss_clean($this->input->post('Date'));
				$time  = strtotime($Date);
				
				$month = date('m',$time);
			
				$year  = date('Y',$time);
				//echo $month."<br>".$year;
			
				
				if($Date != '')
				{
					$_SESSION["month"] = $month;
					$_SESSION["year"] = $year;
					
				}
				if($Date == '' && isset($_SESSION['month']) && !empty($_SESSION['month']))
				{
				 	$month=$_SESSION["month"];
					$year=$_SESSION["year"];
					
				}
				
				$data['Date']=$Date;
				$this->load->library('pagination');
				$count = $this->Expenses_model->ExpenseListingSortCount($month,$year);
				$returns = $this->paginationCompress ( "Expenses/ListExpenses/", $count, 10, 3 );
				$data['ExpenseListingsRecords'] = $this->Expenses_model->ExpenseListing_Sort($month,$year, $returns["page"], $returns["segment"]);
				$data['categoryName']=$this->Expenses_model->getCategoryInfo();
				$data['sortEnable']="1";
				if($count==0)
				{
					$data['total_amount']="0";
					$data['ExpenseListings']="(empty)";
					
				}
				else
				{
				$data['total_amount']=$this->Expenses_model->get_total_amount();
				}
				$this->global['pageTitle'] = 'Expense Listings';
				$this->loadViews("ExpenseListing", $this->global, $data, NULL);
				}
		}
		
		  function categorySort()
		  {
		  
				if($this->isAdmin() == TRUE)
				{
					$this->loadThis();
				}
				else
				{        
					$categorySort = $this->security->xss_clean($this->input->post('categorySort'));
					if($categorySort == "")
					{
					
						redirect('Expenses/ListExpenses');
					}
          
					if($categorySort != '')
					{
					$_SESSION["categorySort"] = $categorySort;
					}
					if($categorySort == '')
					{
					 $categorySort=$_SESSION["categorySort"];
					 
					}
					$data['categorySort']=$categorySort;

					$this->load->library('pagination');
					$count = $this->Expenses_model->categorySortCount($categorySort);
					$returns = $this->paginationCompress ( "Expenses/ListExpenses/", $count, 10, 3 );
					$data['ExpenseListingsRecords'] = $this->Expenses_model->categorySort($categorySort, $returns["page"], $returns["segment"]);
					$data['categoryName']=$this->Expenses_model->getCategoryInfo();
					$data['total_amount']=$this->Expenses_model->get_total_sorted_amount($categorySort);
					$this->global['pageTitle'] = 'Expense Listings';
					$this->loadViews("ExpenseListing", $this->global, $data, NULL);
				}
			
		  }
		
	
//	 function InhandAmount()
//    {
//        if($this->isAdmin() == TRUE)
//        {
//            $this->loadThis();
//        }
//        else
//        {        
//
//            $data['InhandAmountListingsRecords'] = $this->Expenses_model->InhandAmountListing($searchText, $returns["page"], $returns["segment"]);
//            $this->global['pageTitle'] = 'Inhand Amount Listings';
//            $this->loadViews("inhandAmountListing", $this->global, $data, NULL);
//        }
//    }
	
	function addNewInhand()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('Expenses_model');
             $data['InhandAmountListingInfo'] = $this->Expenses_model->getInhandAmountListingInfo();  
			 //print_r($data['InhandAmountListingInfo']);       
            $this->global['pageTitle'] = 'Add New Inhand ';
            $this->loadViews("addNewInhand", $this->global,$data, NULL);
        }
    }
	
	function addNewInhandAmount()
	{
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {  

            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('InhandAmount','Inhand Amount','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->addNewInhand();
            }
            else
            {
			   
			    $InhandAmount = $this->input->post('InhandAmount');
				
				$startingDate = $this->input->post('startingDate');
				
                $inhandAmountInfo = array('amount'=>$InhandAmount ,'startDate'=>$startingDate);
                
                $this->load->model('Expenses_model');
				
				$count = $this->Expenses_model->getSettingTableCount();
				if($count == 0)
				{
               	 $result = $this->Expenses_model->addNewInhandAmount($inhandAmountInfo);
				}
				else
				{
				  $result = $this->Expenses_model->editInhandAmountListingInfo($inhandAmountInfo);
				}
                redirect('Expenses/addNewInhand');
            }
		 

		 	
        }

	}
	

    
    
    /**
     * This function is used to edit the user information
     */
    function editInhandAmountListingNew1()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
            else
            {
			    $inhandId = $this->input->post('inhandId');
				$inhandAmount = $this->input->post('inhandAmount');
				$startingDate = $this->input->post('startingDate');
		
                $Info = array();
                $InhandAmountListingInfo = array('id'=>$inhandId, 'amount'=>$inhandAmount, 'startDate'=>$startingDate);
                $result = $this->Expenses_model->editInhandAmountListingInfo($InhandAmountListingInfo, $inhandId);
               redirect('Expenses/InhandAmount');
            }
        }
		
		
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = '404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
  
}
?>