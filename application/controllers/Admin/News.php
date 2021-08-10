<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('News_model');  
 	}
 
    //show add slider form
    public function add_news()
    {        
        $data['title'] = 'Add News';
        $data['page'] = 'news';
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/news_add', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //save slider
    public function save_news() 
    {
        $this->form_validation->set_rules('nTitle', 'Title', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('n_des', 'Description', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $config['upload_path'] = './assets/img/News/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      500;
        $config['max_width']  =  1350;
        $config['max_height'] =  500;
        
        $imgPath = 'assets/img/News/';
        $this->load->library('upload', $config); 
        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }      
        elseif ( ! $this->upload->do_upload('NewsPic'))
        {
            $data['result'] = array('NewsPic' => $this->upload->display_errors('', '') );
            $data['status']   = 'failed';              
        }
        else
        {
            $nTitle = $this->input->post('nTitle');
            $n_des= ucwords(strtolower($this->input->post('n_des')));
            $NewsPic  = $imgPath.$this->upload->data('file_name');
            
            $user_data = array(
                'nTitle' =>  $nTitle,                    
                'n_des'  =>  $n_des,
                'NewsPic'    =>  $NewsPic,
                'status'         => 1,
                'created_by'     =>  $this->session->userdata('admin_id')     
            );
            
            $insert = $this->News_model->addNews($News_data);
            if($insert > 0)
            {
                $data['result'] = 'News added successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'News/listNews/';
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
    public function listNews()
    {
        $data['title'] = 'News list';
        $data['page'] = 'News';
        $data['News'] = $this->News_model->getAllNews();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/news_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //show slider edit page
    public function edit($newsId)
    {                   
        $data['title'] = 'Edit News';
        $data['page'] = 'News';            
        $data['News'] = $this->News_model->getNews($newsId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/News_edit', $data);        
        $this->load->view('admin/templates/top_footer');       
        $this->load->view('admin/templates/footer');       
    }
    //update slider changes
    public function update_news()
    {
        $this->form_validation->set_rules('nTitle', 'Title', 'trim|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('n_des', 'Description', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric, numbers and space'));


        $config['upload_path'] = './assets/img/News/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      1000;
        $config['max_width']  =  1350;
        $config['max_height'] =  500;
        
        $imgPath = 'assets/img/News/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);

        $nTitle = $this->input->post('nTitle');
        $n_des = ucwords(strtolower($this->input->post('n_des')));
        $sts = $this->input->post('status');
        $news_id = $this->input->post('news_id');
        $NewsPic = $this->input->post('NewsPic');
        $NewsPicDelete = FCPATH.$NewsPic; 

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }

        elseif($sts == 'delete')
        {
            $insert = $this->News_model->deleteNews($news_id); 
            if($insert > 0 )
            {
                if(file_exists($NewsPicDelete))
                {
                    unlink($NewsPicDelete);
                }
                $data['result'] = 'News Deleted successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'News/listNews/';
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
            if($_FILES['NewsPic']['error'] == 4) //no file uploaded
            {
                $banner_data = array(
                    'nTitle' =>  $nTitle,                    
                    'n_des'  =>  $n_des,
                    'status'         => $sts,
                    //'created_by'     =>  $this->session->userdata('Auser_id') 
                );
            }
            else    //new brand pic uploaded
            {        
                if ( ! $this->upload->do_upload('NewsPic'))
                {
                    if($_FILES['NewsPic']['error'] != 4)
                    {                       
                        $data['result'] = array('NewsPic' =>$this->upload->display_errors('', ''));
                        $data['status']   = 'failed';              
                    }
                    echo json_encode($data);
                    exit();
                }
                else
                {
                    $banner_data = array(
                        'nTitle' =>  $nTitle,                    
                        'n_des'  =>  $n_des,
                        'NewsPic' => $imgPath.$this->upload->data('file_name'),
                        'status'         => $sts,
                        
                    );  
                    if(file_exists($NewsPicDelete))
                    {
                        unlink($NewsPicDelete);
                    }                     
                }               
            }
            $update = $this->News_model->updateNews($banner_data, $news_id);
            if($update != -1 )
            {                                   
                $data['result'] = 'News updated successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'News/listNews/';
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