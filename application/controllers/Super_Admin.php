<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_Admin extends CI_Controller {

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
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect('admin/index');
        }
        $this->load->model('Super_Admin_Model');
    }

    public function dashboard() {
        $data = array();
        $data['home_content'] = $this->load->view('admin/home_content', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function add_category() {
        $data = array();
        $data['home_content'] = $this->load->view('admin/category_form', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function store_category() {
        $this->Super_Admin_Model->save_category_info();
        $sdata = array();
        $sdata['message'] = "Category info save successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/add_category');
    }

    public function manage_category() {
        $data = array();
        $data['categories'] = $this->Super_Admin_Model->get_all_category();
        $data['home_content'] = $this->load->view('admin/manage_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_category($category_id) {
        $this->Super_Admin_Model->unpublished_category_by_id($category_id);
        $sdata = array();
        $sdata['message'] = "Category info unpublished successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_category');
    }

    public function published_category($category_id) {
        $this->Super_Admin_Model->published_category_by_id($category_id);
        $sdata = array();
        $sdata['message'] = "Category info published successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_category');
    }

    public function edit_category($category_id) {
        $data = array();
        $data['category_by_id'] = $this->Super_Admin_Model->get_category_by_id($category_id);
        $data['home_content'] = $this->load->view('admin/edit_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        $this->Super_Admin_Model->update_category_info();
        $sdata = array();
        $sdata['message'] = "Category info update successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_category');
    }

    public function delete_category($category_id) {
        $this->Super_Admin_Model->delete_category_by_id($category_id);
        $sdata = array();
        $sdata['message'] = "Category info delete successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_category');
    }

    public function add_blog() {
        $data = array();
        $data['all_published_category'] = $this->Super_Admin_Model->get_all_published_category();
        $data['home_content'] = $this->load->view('admin/add_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_blog() {

        $config['upload_path'] = './uploaded_blog_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;        
        
        $upload_image_path='';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blog_image'))
        {
            $uerror =$this->upload->display_errors();

            $sdata['message']=$uerror;
            $this->session->set_userdata($sdata);
            return redirect('Super_Admin/add_blog');
        }
        else {
            $udata = array('upload_data' => $this->upload->data());

            $upload_image_path=$config['upload_path'] .$udata['upload_data']['file_name'];
        }

        $this->Super_Admin_Model->save_blog_info($upload_image_path);
        $sdata = array();
        $sdata['message'] = "Blog info save successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/add_blog');
    }

    public function manage_blog() {
        $data = array();
        $data['all_blog_category'] = $this->Super_Admin_Model->get_all_blog_category();
        $data['home_content'] = $this->load->view('admin/manage_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_blog($blog_id) {
        $this->Super_Admin_Model->unpublished_blog_by_id($blog_id);
        $sdata = array();
        $sdata['message'] = "Blog info unpublished successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_blog');
    }

    public function published_blog($blog_id) {
        $this->Super_Admin_Model->published_blog_by_id($blog_id);
        $sdata = array();
        $sdata['message'] = "Blog info published successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_blog');
    }

    public function edit_blog($blog_id) {
        $data = array();
        $data['all_published_category'] = $this->Super_Admin_Model->get_all_published_category();
        $data['blog_info'] = $this->Super_Admin_Model->get_blog_info_by_id($blog_id);
        $data['home_content'] = $this->load->view('admin/edit_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_blog() {
        $this->Super_Admin_Model->update_blog_info();
        $sdata = array();
        $sdata['message'] = "Blog info update successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_blog');
    }

    public function delete_blog($blog_id) {
        $this->Super_Admin_Model->delete_blog_by_id($blog_id);
        $sdata = array();
        $sdata['message'] = "Blog info delete successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_blog');
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata = array();
        $sdata['message'] = "Your are Successfully Logout !";
        $this->session->set_userdata($sdata);
        redirect('admin/index');
    }
    public function manage_comments()
    {
        $data = array();
        $data['all_comments'] = $this->Super_Admin_Model->get_all_comments();
        $data['home_content'] = $this->load->view('admin/manage_comments', $data, true);
        $this->load->view('admin/admin_master', $data);
    }
    public function published_comments($comments_id) {
        $this->Super_Admin_Model->published_comments_by_id($comments_id);
        $sdata = array();
        $sdata['message'] = "Published Comments successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_comments');
    }
    public function unpublished_comments($comments_id) {
        $this->Super_Admin_Model->unpublished_comments_by_id($comments_id);
        $sdata = array();
        $sdata['message'] = "Unpublished Comments successfully !";
        $this->session->set_userdata($sdata);
        return redirect('Super_Admin/manage_comments');
    }
   
}
