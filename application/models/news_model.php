<?php
class News_model extends CI_Model{
    public  function  __construct(){
        $this->load->database();
    }
    public  function get_news($num=0){
        if(0 != $num){
            $this->db->limit(10);   
        }
        $data = $this->db->get('news');        
        return $data;
    }
    
    public function get_test(){
        $data = $this->db->get('news');        
        return $data;
    }
}