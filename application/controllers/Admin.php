<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id != NULL)
        {
            redirect('super_admin/dashboard');
        }
    }
    public function index() 
    {
        $this->load->view('admin/admin_login');
    }
    public function admin_login_check()
    {
        $email_address=$this->input->post('email_address',true);
        $admin_password=md5($this->input->post('admin_password',true));
        $this->load->model('admin_model');
        $admin_info=$this->admin_model->check_admin_login_info($email_address,$admin_password);
       
        $sdata=array();
        if ($admin_info)
        {
        $sdata['admin_id']=$admin_info->admin_id;  
        $sdata['admin_name']=$admin_info->admin_name;
        $this->session->set_userdata($sdata);    
        redirect('super_admin/dashboard');
        }
        else{            
            $sdata['exception']="Your User ID Or Password Invalide !";
            $this->session->set_userdata($sdata);
            redirect('admin/index');
        }
    }

}
