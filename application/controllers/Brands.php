<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



class Brands extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        @parent::__construct();

        $this->load->model('brands_model');

        $this->isLoggedIn();   

    }

    

    /**

     * This function used to load the first screen of the delegate

     */

    public function index()

    {

        $this->global['pageTitle'] = 'Brands Listings';

        

        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }
	


    

    /**

     * This function is used to load the delegate

     */

    function brandsListing()

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

            

           $count = $this->brands_model->brandsListingsCount($searchText);

			

			



			$returns = $this->paginationCompress ( "Brands/brandsListing/", $count, 10, 3 );

			

            

            $data['brandslistingsRecords'] = $this->brands_model->Brandslistings($searchText, $returns["page"], $returns["segment"]);

            

            $this->global['pageTitle'] = 'Brands Listings';

            

            $this->loadViews("Brandslistings", $this->global, $data, NULL);

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

            $this->load->model('brands_model');

                      

            $this->global['pageTitle'] = 'Add New Brand';



            $this->loadViews("addNewBrand", $this->global, NULL);

        }

    }
	
	
	
		
		
    function addNewBrand()

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
				
                $website_url = $this->input->post('website_url');
								
                $description = $this->input->post('description');
				$address = $this->input->post('address');
				
				
							
				

				$image=$this->uplo();

				
                $brandInfo = array('name'=>$name, 'website_url'=>$website_url, 'description'=>$description,'logo'=>$image,'address'=>$address);

                

                $this->load->model('brands_model');

                $result = $this->brands_model->addNewBrand($brandInfo);

                

                if($result > 0)

                {

                    $this->session->set_flashdata('success', 'New Brand created successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'New Brand creation failed');

                }

                

                redirect('Brands/brandsListing');

            }

        }

    }
   

    /**

     * This function is used load delegate edit information

     * @param number $Id : Optional : This is  id

     */

    function editbrandsListing($id = NULL)

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

        else

        {

            if($id == null)

            {

                redirect('Brands/brandsListing');

            }

            

            $data['brandInfo'] = $this->brands_model->getBrandListingInfo($id);

            

            $this->global['pageTitle'] = 'Edit Brand Listing';

            

            $this->loadViews("editBrandListing", $this->global, $data, NULL);

        }

    }

    

    

    /**

     * This function is used to edit the user information

     */

    function editBrandListingNew()

    {

        if($this->isAdmin() == TRUE)

        {

            $this->loadThis();

        }

     

            else

            {
			
			    $id = $this->input->post('id');

				$name = $this->input->post('name');
				
				$website_url = $this->input->post('website_url');
				
				$description = $this->input->post('description');
				$address = $this->input->post('address');
				
		
				$current_photo= $this->input->post('current_photo');
				

				$image=$this->uplo();

				if($image == 'null.jpg')

				{

				  if($current_photo != "")

				  {

				  	$image = $current_photo;

				  } 

				}
				
				

				
			

                $brandInfo = array();


               $brandInfo = array('name'=>$name,'website_url'=>$website_url,'description'=>$description,'address'=>$address,'logo'=>$image);

				

                $result = $this->brands_model->editbrandsListing($brandInfo, $id);

                

                if($result == true)

                {

                    $this->session->set_flashdata('success', 'Brand Listing updated successfully');

                }

                else

                {

                    $this->session->set_flashdata('error', 'Brand Listing updation failed');

                }

                

                redirect('Brands/brandsListing');

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