<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome_Model
 *
 * @author RASEL
 */
class Welcome_Model extends CI_Model {
    //put your code here
    
    public function select_all_published_blog()
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_blog.category_id');
        $this->db->where('tbl_blog.publication_status', 1);
        $this->db->order_by('blog_id', 'desc');
        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result; 
    }
    public function select_blog_by_id($blog_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_blog.category_id');
        $this->db->where('tbl_blog.publication_status', 1);
        $this->db->where('blog_id', $blog_id);
        $query_result =$this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function latest_blog()
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status', 1);
        $this->db->order_by('blog_id','desc');
        $this->db->limit(3);
        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result;  
    }
    public function select_blog_by_category_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_blog.category_id');
        $this->db->where('tbl_blog.publication_status', 1);
        $this->db->where('tbl_blog.category_id', $category_id);        
        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result;  
    }
    public function update_hit_count($data,$blog_id)
    {
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog',$data);
    }
    public function popular_blog()
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status', 1);
        $this->db->order_by('hit_count','desc');
        $this->db->limit(3);
        $query_result =$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function save_comments_info()
    {
        $data=array();
        $data['blog_id']=$this->input->post('blog_id',true);
        $data['comments_author_name']=$this->input->post('comments_author_name',true);
        $data['email_address']=$this->input->post('email_address',true);
        $data['comments']=$this->input->post('comments',true);
        $this->db->insert('tbl_comments',$data);
    }
    public function select_comments_by_blog_id($blog_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_comments');
        $this->db->where('publication_status', 1);
        $this->db->where('blog_id', $blog_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
        
    }
}
