<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class JobCategories extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        @parent::__construct();
        $this->load->model('JobCategories_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the delegate
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Job Categories Listings';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
	
    
    /**
     * This function is used to load the delegate
     */
    function JobCategoriesListing()
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
            
           $count = $this->JobCategories_model->JobCategoriesListingCount($searchText);
			
			
			$returns = $this->paginationCompress ( "JobCategories/JobCategoriesListing/", $count, 10, 3 );
			
            
            $data['JobCategorylistingsRecords'] = $this->JobCategories_model->JobCategoriesListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Job Categories Listings';
            
            $this->loadViews("JobCategoriesListing", $this->global, $data, NULL);
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
            $this->load->model('JobCategories_model');
                      
            $this->global['pageTitle'] = 'Add New Category';
            $this->loadViews("addNewJobCategory", $this->global, NULL);
        }
    }
	
	
	
		
		
    function addNewJobCategory()
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
				
                $JobCategoryInfo = array('category_name'=>$categoryName);
                
                $this->load->model('JobCategories_model');
                $result = $this->JobCategories_model->addNewJobCategory($JobCategoryInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Job Category created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Job Category creation failed');
                }
                
                redirect('JobCategories/JobCategoriesListing');
            }
        }
    }
   
    /**
     * This function is used load delegate edit information
     * @param number $Id : Optional : This is  id
     */
    function editJobCategory($id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('JobCategories/JobCategoriesListing');
            }
            
            $data['JobCategoryInfo'] = $this->JobCategories_model->getJobCategoryListingInfo($id);
            
            $this->global['pageTitle'] = 'Edit Job Category Listing';
            
            $this->loadViews("editJobCategory", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editJobCategoryNew()
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
               $JobCategoryInfo = array('category_name'=>$categoryName);
				
                $result = $this->JobCategories_model->editJobCategoryListing($JobCategoryInfo, $categoryId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Job Category Listing updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Job Category Listing updation failed');
                }
                
               redirect('JobCategories/JobCategoriesListing');
            }
        }
    /**
     * This function is used to delete the faculty using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deletebrandsListing()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->brands_model->deletebrandsListing($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	
	
	 function deleteJobCategory()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
                      
            $result = $this->JobCategories_model->deleteJobCategory($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	
	
		function uplo()
		 {	
	
			$config['upload_path'] = 'images/brands';
	
			$config['allowed_types'] = 'gif|jpg|png';
	
			$this->load->library('upload', $config);
	
			
			if ( ! $this->upload->do_upload('userfile'))
	
			
	
			{
			//echo"haiiii74744";
			
						
			 $update['image']=$this->input->post('current_photo');
	
			 //echo  $update['image'];
	
			return "null.jpg";
		 	
				}
		
				else
		
				{
		
					//echo "haiii";
		
					$data = array('upload_data' => $this->upload->data());
		
					$pic=$data["upload_data"]["file_name"];
		
					
		
					//for image resize
		
				$img_array = array();
		
				$img_array['image_library'] = 'gd2';
		
				$img_array['maintain_ratio'] = TRUE;
		
				//you need this setting to tell the image lib which image to process
		
				$img_array['source_image'] = 'images/brands' . $pic;
		
				$img_array['width'] = 280;
		
				//$img_array['height'] = 297;
		
		
		
				$this->load->library('image_lib', $img_array);
		
				$this->image_lib->resize();
		
				
		
					return $pic;				
					
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