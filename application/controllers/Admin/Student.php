<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('Student_model');  
 	}
 
    //show add slider form
    public function addStudent()
    {        
        $data['title'] = 'Add Student';
        $data['page'] = 'student';
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/student_add', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //save slider
    public function save_student() 
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('saddress', 'Address', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/@/]',
            array('regex_match' => 'Enter only alphanumeric and space'));


        $config['upload_path'] = './assets/img/student/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      1000;
         $config['max_width']  =  1350;
        $config['max_height'] =  500;
        
        $imgPath = 'assets/img/student/';
        $this->load->library('upload', $config); 
        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }      
        elseif ( ! $this->upload->do_upload('student_image'))
        {
            $data['result'] = array('student_image' => $this->upload->display_errors('', '') );
            $data['status']   = 'failed';              
        }
        else
        {
            $sname = $this->input->post('sname');
            $saddress = ucwords(strtolower($this->input->post('saddress')));
            $student_image  = $imgPath.$this->upload->data('file_name');
            
            $user_data = array(
                'first_name' =>  $first_name,    
                'last_name' =>  $last_name,                
                'saddress'  =>  $saddress,
                'mobile' =>  $mobile,
                'email' =>  $email,
                'student_image'    =>  $student_image,
                'status'         => 1,
                     
            );
            
            $insert = $this->Student_model->addStudent($user_data);
            if($insert > 0)
            {
                $data['result'] = 'Student added successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Student/listStudent/';
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
    public function listStudent()
    {
        $data['title'] = 'Student list';
        $data['page'] = 'student';
        $data['student'] = $this->Student_model->getAllStudent();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/student_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

     //show slider edit page
    public function editStudent($studentId)
    {                   
        $data['title'] = 'Edit Student';
        $data['page'] = 'student';            
        $data['student'] = $this->Student_model->getStudent($studentId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/student_edit', $data);        
        $this->load->view('admin/templates/top_footer');       
        $this->load->view('admin/templates/footer');       
    }

     //update slider changes
    public function update_student()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('saddress', 'Address', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric, numbers and space'));

        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/@/]',
            array('regex_match' => 'Enter only alphanumeric and space'));


        $config['upload_path'] = './assets/img/Student/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      1000;
        $config['max_width']  =  1350;
        $config['max_height'] =  500;
        
        $imgPath = 'assets/img/Student/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $saddress= ucwords(strtolower($this->input->post('saddress')));
        $sts = $this->input->post('status');
        $student_id = $this->input->post('student_id');
        $student_image = $this->input->post('student_image');
        $student_imageDelete = FCPATH.$student_image; 

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }

        elseif($sts == 'delete')
        {
            $insert = $this->Student_model->deleteStudent($student_id); 
            if($insert > 0 )
            {
                if(file_exists($student_imageDelete))
                {
                    unlink($student_imageDelete);
                }
                $data['result'] = 'student Deleted successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Student/listStudent/';
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
            if($_FILES['student_image']['error'] == 4) //no file uploaded
            {
                $banner_data = array(
                    'sname' =>  $sname,                    
                    'saddress'  =>  $saddress,
                    'status'         => $sts,
                    //'created_by'     =>  $this->session->userdata('Auser_id') 
                );
            }
            else    //new brand pic uploaded
            {        
                if ( ! $this->upload->do_upload('student_image'))
                {
                    if($_FILES['student_image']['error'] != 4)
                    {                       
                        $data['result'] = array('student_image' =>$this->upload->display_errors('', ''));
                        $data['status']   = 'failed';              
                    }
                    echo json_encode($data);
                    exit();
                }
                else
                {
                    $banner_data = array(
                        'sname' =>  $sname,                    
                        'saddress'  =>  $saddress,
                        'student_image' => $imgPath.$this->upload->data('file_name'),
                        'status'         => $sts,
                        
                    );  
                    if(file_exists($student_imageDelete))
                    {
                        unlink($student_imageDelete);
                    }                     
                }               
            }
            $update = $this->Student_model->updateStudent($banner_data, $student_id);
            if($update != -1 )
            {                                   
                $data['result'] = 'Student updated successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Student/listStudent/';
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