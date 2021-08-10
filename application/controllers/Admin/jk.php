<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jk extends MY_Controller {
    function __construct(){
        parent::__construct();   
        $this->load->model('User_model');  
        $this->load->library('form_validation');
    }


    public function insert()
    {
        $data['title'] = 'insert member';
        $data['page']   = '123';
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu',$data);
        $this->load->view('admin/user_add', $data);
        $this->load->view('signUpLogin');
        $this->load->view('templates/footer');
    }

}
