<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    public function index() {
        $data = array();
        $data['title']="Red Blog | Home";
        $data['friends']=true;
        $data['all_published_blog']=$this->Welcome_Model->select_all_published_blog();
        $data['maincontent'] = $this->load->view('pages/home_content', $data, true);
        $this->load->view('master', $data);
    }
     public function blog_details($blog_id)
    {
        $data = array();        
        /*
         * Start hit count update
         */
        $blog_info=$this->Welcome_Model->select_blog_by_id($blog_id);
        $data['hit_count']=$blog_info->hit_count +1;
        $this->Welcome_Model->update_hit_count($data,$blog_id);
        
        /*
         * End hit count update
         */
        $data['title']="Red Blog | Home";
        $data['friends']=true;
        $data['blog_info']=$this->Welcome_Model->select_blog_by_id($blog_id);
        $data['published_comments'] = $this->Welcome_Model->select_comments_by_blog_id($blog_info->blog_id);
        $data['maincontent'] = $this->load->view('pages/blog_details', $data, true);
        $this->load->view('master', $data);
    }
    public function save_comments()
    {
        $this->Welcome_Model->save_comments_info();
        $sdata = array();
        $sdata['message'] = "Save Your Comments Successfully ! Please Wait for Admin Approval !";
        $this->session->set_userdata($sdata);
        $blog_id= $this->input->post('blog_id',true);
        return redirect('Welcome/blog_details/'.$blog_id);
    }

    public function category_blog($category_id)
    {
        $data=array();
        $data['category_blog']=$this->Welcome_Model->select_blog_by_category_id($category_id);
        $data['title']="Red Blog | Category Blog";
        $data['friends']=true;
        $data['all_published_blog']=$this->Welcome_Model->select_all_published_blog();
        $data['maincontent'] = $this->load->view('pages/category_content', $data, true);
        $this->load->view('master', $data);
    }

    public function portfolio()
    {
        $data = array();
        $data['title']="Red Blog | Portfolio";
        $data['maincontent'] = $this->load->view('pages/portfolio', '', true);
        $this->load->view('master', $data);
    }
    public function services()
    {
        $data = array();
        $data['title']="Red Blog | Services";
        $data['maincontent'] = $this->load->view('pages/services', '', true);
        $this->load->view('master', $data);
    }
    public function contact()
    {
        $data = array();
        $data['title']="Red Blog | Contact Us";
        $data['maincontent'] = $this->load->view('pages/contact', '', true);
        $this->load->view('master', $data);
    }
   
}
