<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('Customer_model');  
    }
 
    //show add slider form
    public function add_customer()
    {        
        $data['title'] = 'Add Customer';
        $data['page'] = 'Customer';
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/customer_add', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //save slider
    public function save_customer() 
    {
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('address', 'Address', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('area', 'Area', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/@/]',
            array('regex_match' => 'Enter only alphanumeric and space'));


        $config['upload_path'] = './assets/img/Customer/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        /*$config['max_size']     =      500;
        $config['max_width']  =  1350;
        $config['max_height'] =  500;*/
        
        $imgPath = 'assets/img/Customer/';
        $this->load->library('upload', $config); 
        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }      
        elseif ( ! $this->upload->do_upload('image'))
        {
            $data['result'] = array('image' => $this->upload->display_errors('', '') );
            $data['status']   = 'failed';              
        }
        else
        {
            $customer_name = $this->input->post('customer_name');
            $address= ucwords(strtolower($this->input->post('address')));
            $area= ucwords(strtolower($this->input->post('area')));
            $city= ucwords(strtolower($this->input->post('city')));
            $phone= ucwords(strtolower($this->input->post('phone')));
            $email= ucwords(strtolower($this->input->post('email')));
            $NewsPic  = $imgPath.$this->upload->data('file_name');
            
            $user_data = array(
                'customer_name' =>  $customer_name,                    
                'address'  =>  $address,
                'area'    =>  $area,
                'city' =>  $city,                    
                'phone'  =>  $phone,
                'email'    =>  $email,
                'image'    =>  $image,
                'status'         => 1,


                  
            );
            
            $insert = $this->Customer_model->addCustomer($Customer_data);
            if($insert > 0)
            {
                $data['result'] = 'Customer added successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Customer/listCustomer/';
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('resp' => $insert);
                $data['status']   = 'failed';   
            }                           
        }
        echo json_encode($data);        
    }   

    //show list of all sliders
    public function listCustomer()
    {
        $data['title'] = 'Customer list';
        $data['page'] = 'Customer';
        $data['Customer'] = $this->Customer_model->getAllCustomer();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/customer_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //show slider edit page
    public function edit($customerId)
    {                   
        $data['title'] = 'Edit Customer';
        $data['page'] = 'Customer';            
        $data['Customer'] = $this->Customer_model->getCustomer($customerId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/Customer_edit', $data);        
        $this->load->view('admin/templates/top_footer');       
        $this->load->view('admin/templates/footer');       
    }
    //update slider changes
    public function update_customer()
    {
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('address', 'Address', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('area', 'Area', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/@/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $config['upload_path'] = './assets/img/Customer/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        /*$config['max_size']     =      1000;
        $config['max_width']  =  1350;
        $config['max_height'] =  500;*/
        
        $imgPath = 'assets/img/Customer/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);

        $customer_name = $this->input->post('customer_name');
        $address= ucwords(strtolower($this->input->post('address')));
        $area= ucwords(strtolower($this->input->post('area')));
        $city= ucwords(strtolower($this->input->post('city')));
        $phone= ucwords(strtolower($this->input->post('phone')));
        $email= ucwords(strtolower($this->input->post('email')));
        $sts = $this->input->post('status');
        $image_id = $this->input->post('customer_id');
        $image = $this->input->post('image');
        $imageDelete = FCPATH.$image; 

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }

        elseif($sts == 'delete')
        {
            $insert = $this->Customer_model->deleteCustomer($customer_id); 
            if($insert > 0 )
            {
                if(file_exists($imageDelete))
                {
                    unlink($imageDelete);
                }
                $data['result'] = 'Customer Deleted successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Customer/listCustomer/';
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('resp' => $insert);
                $data['status']   = 'failed';   
            }
        }

        else    //else edit data
        {
            $banner_data = array();     
            if($_FILES['image']['error'] == 4) //no file uploaded
            {
                $banner_data = array(
                    'customer_name' =>  $customer_name,                    
                    'address'  =>  $address,
                    'area'    =>  $area,
                    'city' =>  $city,                    
                    'phone'  =>  $phone,
                    'email'    =>  $email,
                    'image'    =>  $image,
                    'status'         => $sts,
                    //'created_by'     =>  $this->session->userdata('Auser_id') 
                );
            }
            else    //new brand pic uploaded
            {        
                if ( ! $this->upload->do_upload('image'))
                {
                    if($_FILES['image']['error'] != 4)
                    {                       
                        $data['result'] = array('image' =>$this->upload->display_errors('', ''));
                        $data['status']   = 'failed';              
                    }
                    echo json_encode($data);
                    exit();
                }
                else
                {
                    $banner_data = array(
                        'customer_name' =>  $customer_name,                    
                        'address'  =>  $address,
                        'area'    =>  $area,
                        'city' =>  $city,                    
                        'phone'  =>  $phone,
                        'email'    =>  $email,
                        'image' => $imgPath.$this->upload->data('file_name'),
                        'status'         => $sts,
                        
                    );  
                    if(file_exists($imageDelete))
                    {
                        unlink($imageDelete);
                    }                     
                }               
            }
            $update = $this->Customer_model->updateCustomer($banner_data, $customer_id);
            if($update != -1 )
            {                                   
                $data['result'] = 'Customer updated successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Customer/listCustomer/';
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] =   array('resp' => $update);
                $data['status']   = 'failed';   
            }
        } //else edit end
        echo json_encode($data);  
    }  

}