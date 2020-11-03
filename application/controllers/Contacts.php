<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**

 * Class : Delegate (DelegateController)

 * Delegate Class to control all delegate related operations.

 */

class Contacts extends BaseController
{

    /**

     * This is default constructor of the class

     */
    public function __construct()
    {
        @parent::__construct();
        $this->load->model('Contacts_model');
        $this->isLoggedIn();  
    }

    /**

     * This function used to load the first screen of the delegate

     */
    public function index()
    {
        $this->global['pageTitle'] = 'Contacts Listings';
        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	
	function Contacts()
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
            $count = $this->Contacts_model->contactsCount($searchText);
			$returns = $this->paginationCompress ( "Contacts/Contacts/", $count, 10, 3 );
            $data['ContactsListingsRecords'] = $this->Contacts_model->contactlisting($searchText, $returns["page"], $returns["segment"]);
			$data['brand_names']=$this->Contacts_model->get_brand_names();
			$data['sortEnable']="0";
            $this->global['pageTitle'] = 'Contacts Listings';  
            $this->loadViews("Contacts_view", $this->global, $data, NULL);
		}
	}
	
	 function addNew()
    {
	 $this->load->model('Brands_model');
   	 $result['data']=$this->Brands_model->get_brand_names();
	
        if($this->isAdmin() == TRUE)
        {

            $this->loadThis();

        }

        else

        {
		
		    $this->load->model('Contacts_model');
            $this->global['pageTitle'] = 'Add New Contact';
            $this->loadViews("addNewContact", $this->global,  $result);
        }
    }
	
	
  function BrandSort()
  {
  
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $category_id = $this->security->xss_clean($this->input->post('category_id'));

			if($category_id != '')
			{
			$_SESSION["category_id"] = $category_id;
			}
			if($category_id == '')
			{
			 $category_id=$_SESSION["category_id"];
			 
			}
			$data['category_id']=$category_id;
            $this->load->library('pagination');
         	$count = $this->Contacts_model->Sponsor_Category_SortCount($category_id);
			$returns = $this->paginationCompress ( "Contacts/Contacts/", $count, 10, 3 );
            $data['ContactsListingsRecords'] = $this->Contacts_model->Sponsor_Category_Sort($category_id, $returns["page"], $returns["segment"]);
			$data['sortEnable']="1";
			$data['brand_names']=$this->Contacts_model->get_brand_names();
		    $this->global['pageTitle'] = 'Contact  Listings';
            $this->loadViews("Contacts_view", $this->global, $data, NULL);
        }
    
  }
  
  
  
	    function addNewContacts()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            $this->load->library('form_validation');

           
            $this->form_validation->set_rules('name','Name','trim|required');

          
           
            if($this->form_validation->run() == FALSE)

            {

                $this->addNew();

            }

            else

            {
			
              
			  
			    $name = $this->input->post('name');
				
				$email = $this->input->post('email');
				
				$mobile = $this->input->post('mobile');
				
				
				$brand = $this->input->post('brand');
	
	
				$this->load->model('Brands_model');
				$result['data']=$this->Brands_model->get_brand_id($brand);
				$id=$result['data'];
				

                $contactInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile,'brand_id'=>$id, 'brand_name'=>$brand, 'created'=>date('Y-m-d H:i:s'));

              
                $this->load->model('Contacts_model');

                $result = $this->Contacts_model->addNewContact($contactInfo);

               
                if($result > 0)

                {

                    $this->session->set_flashdata('success', 'New Contact created successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'New Contact creation failed');

                }

               
                redirect('Contacts/Contacts');

            }

        }

    }
	
	
	function editcontactListing($id = NULL)

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {
				$this->load->model('Contacts_model');
				$data['brand']=$this->Contacts_model->get_brandName();

            if($id == null)

            {

                redirect('Contacts/Contacts');

            }

            

            $data['contactInfo'] = $this->Contacts_model->getContactListingInfo($id);
			

			
			

            

            $this->global['pageTitle'] = 'Edit Contact Listing';

            

            $this->loadViews("editContactListing", $this->global, $data, NULL);

        }

    }


    function editcontactListingNew()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

     

            else

            {
			
			    $id = $this->input->post('id');

				$name = $this->input->post('name');
				
				$email = $this->input->post('email');
				
				$mobile = $this->input->post('mobile');
				
				$brand_name= $this->input->post('brand_name');
				
				$this->load->model('Contacts_model');
				$result['data']=$this->Contacts_model->get_brand_id($brand_name);
				$brand_id=$result['data'];

                $contactInfo = array();


               $contactInfo = array('name'=>$name,'email'=>$email,'mobile'=>$mobile,'brand_name'=>$brand_name, 'brand_id'=>$brand_id);

				

                $result = $this->Contacts_model->editcontactsListing($contactInfo, $id);

                

                if($result == true)

                {

                    $this->session->set_flashdata('success', 'Contact Listing updated successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'Contact Listing updation failed');

                }

                

                redirect('Contacts/Contacts');

            }

        }
		
function deletecontactListing()
    {
        if($this->isAdmin() == TRUE)

        {
            echo(json_encode(array('status'=>'access')));
        }

        else
        {
            $id = $this->input->post('id');

            $result = $this->Contacts_model->deletecontactListing($id);

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

            else { echo(json_encode(array('status'=>FALSE))); }
        }

    }
	
	
	function viewContactListing($id)
    {
		$data['viewcontactlisting'] = $this->Contacts_model->viewContactListing($id);
		$this->global['pageTitle'] = 'View Contact Listing';
		$this->loadViews("viewContacts_profile", $this->global, $data, NULL);
           
    }
  
	function pageNotFound()
    {
        $this->global['pageTitle'] = 'SCMS : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
	
/*	function deleteContactListing()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $Id = $this->input->post('id');
            $result = $this->Contacts_model->deleteContactListing($Id);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }*/
	
}



?>