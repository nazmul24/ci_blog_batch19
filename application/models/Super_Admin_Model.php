<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Super_Admin_Models
 *
 * @author RASEL
 */
class Super_Admin_Model extends CI_Model{
    //put your code here
    public function save_category_info()
    {
        $data=array();
        $data['category_name']=$this->input->post('category_name',TRUE);
        $data['category_description']=$this->input->post('category_description',TRUE);
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        $this->db->insert('tbl_category',$data);
    }
    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');

        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function unpublished_category_by_id($category_id){
        $this->db->set('publication_status', 0);
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category');      
    }
    public function published_category_by_id($category_id){
        $this->db->set('publication_status', 1);
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category');      
    }
    public function get_category_by_id($category_id){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);

        $query_result =$this->db->get();
        $result = $query_result->row();
        return $result; 
    }
    public function update_category_info(){
        $data=array();
        $category_id =$this->input->post('category_id',TRUE);
        $data['category_name']=$this->input->post('category_name',TRUE);
        $data['category_description']=$this->input->post('category_description',TRUE);
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
    }
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->delete('tbl_category');
    }
    public function save_blog_info($upload_image_path)
    {
        $data=array();
        $data['blog_title']=$this->input->post('blog_title',TRUE);
        $data['category_id']=$this->input->post('category_id',TRUE);
        $data['blog_short_description']=$this->input->post('blog_short_description',TRUE);
        $data['blog_long_description']=$this->input->post('blog_long_description',TRUE);
        $data['author_name']=$this->session->userdata('admin_name');
        $data['blog_image']=$upload_image_path;
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        $this->db->insert('tbl_blog',$data);
    }
    public function get_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status', 1);

        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result; 
    }
    public function get_all_blog_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');

        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function unpublished_blog_by_id($blog_id){
        $this->db->set('publication_status', 0);
        $this->db->where('blog_id', $blog_id);
        $this->db->update('tbl_blog');      
    }
    public function published_blog_by_id($blog_id){
        $this->db->set('publication_status', 1);
        $this->db->where('blog_id', $blog_id);
        $this->db->update('tbl_blog');      
    }
    public function get_blog_info_by_id($blog_id){
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id', $blog_id);

        $query_result =$this->db->get();
        $result = $query_result->row();
        return $result; 
    }
    public function update_blog_info(){
        $data=array();
        $blog_id =$this->input->post('blog_id',TRUE);
        $data['blog_title']=$this->input->post('blog_title',TRUE);
        $data['category_id']=$this->input->post('category_id',TRUE);
        $data['blog_short_description']=$this->input->post('blog_short_description',TRUE);
        $data['blog_long_description']=$this->input->post('blog_long_description',TRUE);
        $data['author_name']=$this->session->userdata('admin_name');
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        
        $this->db->where('blog_id', $blog_id);
        $this->db->update('tbl_blog', $data);
    }
    public function delete_blog_by_id($blog_id)
    {
        $this->db->where('blog_id', $blog_id);
        $this->db->delete('tbl_blog');
    }
    public function get_all_comments()
    {
        $this->db->select('*');
        $this->db->from('tbl_comments');

        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function published_comments_by_id($comments_id){
        $this->db->set('publication_status', 1);
        $this->db->where('comments_id', $comments_id);
        $this->db->update('tbl_comments');      
    }
    public function unpublished_comments_by_id($comments_id){
        $this->db->set('publication_status', 0);
        $this->db->where('comments_id', $comments_id);
        $this->db->update('tbl_comments');      
    }

    
}
