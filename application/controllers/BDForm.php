<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



class BDForm extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        @parent::__construct();

        $this->load->model('bdform_model');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'BDForm Form Fields';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	


    

    /**

     * This function is used to load the delegate

     */

    function FormFields()

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

            

           $count = $this->bdform_model->bdformfieldsCount($searchText);

			

			



			$returns = $this->paginationCompress ( "BDForm/FormFields/", $count, 10, 3 );

			

            

            $data['bdformfieldsrecords'] = $this->bdform_model->Formfieldlistings($searchText, $returns["page"], $returns["segment"]);

            

            $this->global['pageTitle'] = 'BDForm Form Fields';

            

            $this->loadViews("BDFormFieldslistings", $this->global, $data, NULL);

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

            $this->load->model('bdform_model');

                      

            $this->global['pageTitle'] = 'Add New BD Form Field';



            $this->loadViews("addNewBDFormField", $this->global, NULL);

        }

    }
	
	
	
		
		
    function addNewFormField()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            $this->load->library('form_validation');

            

            $this->form_validation->set_rules('field_name','Field Name','trim|required');

           

            

            if($this->form_validation->run() == FALSE)

            {

                $this->addNew();

            }

            else

            {
			
               
			   
			    $field_name = $this->input->post('field_name');
				
                $prompt = $this->input->post('prompt');
								
               
				
				
							
				

				//$image=$this->uplo();

				
                $formfieldInfo = array('field_name'=>$field_name, 'prompt'=>$prompt);

                

                $this->load->model('bdform_model');

                $result = $this->bdform_model->addNewFormField($formfieldInfo);

                

                if($result > 0)

                {

                    $this->session->set_flashdata('success', 'New BD Form Field created successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'New  BD Form Field creation failed');

                }

                

                redirect('BDForm/FormFields');

            }

        }

    }
   

    

    function editBDFormField($id = NULL)

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            if($id == null)

            {

                redirect('BDForm/FormFields');

            }

            

            $data['bdformfieldInfo'] = $this->bdform_model->getBDFormFieldInfo($id);

            

            $this->global['pageTitle'] = 'Edit BD Form Field';

            

            $this->loadViews("editBDFormField", $this->global, $data, NULL);

        }

    }

    

    

    /**

     * This function is used to edit the user information

     */

    function editBDFormFieldNew()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

     

            else

            {
			
			    $id = $this->input->post('id');
			 
			    $field_name = $this->input->post('field_name');
				
                $prompt = $this->input->post('prompt');
				
				

				
                $formfieldInfo = array('field_name'=>$field_name, 'prompt'=>$prompt);



                $result = $this->bdform_model->editBdFormField($formfieldInfo, $id);

                

                if($result == true)

                {

                    $this->session->set_flashdata('success', 'BD Form Field updated successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'BD Form Field updation failed');

                }

                

                redirect('BDForm/FormFields');

            }

        }









    function deleteFormField()

    {

        if($this->isAdmin() == TRUE)

        {

            echo(json_encode(array('status'=>'access')));

        }

        else

        {

            $id = $this->input->post('id');

                      

            $result = $this->bdform_model->deleteBDFormField($id);

            

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

            else { echo(json_encode(array('status'=>FALSE))); }

        }

    }




function BriefDocument()

{

echo "test";

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