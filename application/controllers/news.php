<?php
class  News extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('news_model');
    }
    public function index(){
        $data['news'] = $this->news_model->get_news(2);
        $this->load->view('include/header');
        $this->load->view('news/main',$this->data);
        $this->load->view('include/footer');
    }
    public function view($sulg){
        
    }
}
